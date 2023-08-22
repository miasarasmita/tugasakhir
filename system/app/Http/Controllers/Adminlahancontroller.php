<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemilik;
use App\Models\Lahan;
use App\Models\Tanah;
use App\Models\Pengairan;

class Adminlahancontroller extends Controller
{
    
    // Lahan
    function index(){
        
        $data['list'] = Lahan::with('pemilik')->get();
        $data['pemilik'] = Pemilik::get();
        return view('admin.lahan.index', $data);
    }

    function add(){
        $data['pemilik'] = Pemilik::get();
        return view('admin.lahan.add', $data);
    }

    function addAction(Request $r){


        
        // simpan lahan
        $lahan = new Lahan;
        $lahan->id_pemilik = request('id_pemilik');
        $lahan->luas = request('luas');
        $lahan->satuan_luas = request('satuan_luas');
        $lahan->lokasi = request('lokasi');
        $lahan->kategori = request('kategori');
        $lahan->kategori_lahan = request('kategori_lahan');
        $lahan->lat = request('lat');
        $lahan->lng = request('lng');
        $lahan->handleUploadFoto();
        $simpanLahan = $lahan->save();

        

        if ($simpanLahan == 1) {
            // Simpan pengairan
            $pengairan = new Pengairan;
            $pengairan->id_lahan = $lahan->id;
            $pengairan->banyak_pengairan = $r->banyak_pengairan;
            $pengairan->ph_air = 0;
            $simpanPengairan = $pengairan->save();

            if ($simpanPengairan == 1) {
                $tanah = new tanah;
                $tanah->id_lahan = $lahan->id;
                $tanah->tekstur = $r->tekstur;
                $tanah->kedalaman = 0;
                $tanah->ph_tanah = $r->ph_tanah;
                $tanah->save();
            }

            return redirect('admin/lahan')->with('success', 'Data berhasil ditambahkan !');
        } else {
            return back()->with('danger', 'Data gagal ditambahkan !');
        }
    
    }

    function edit(Lahan $lahan){
        $data['lahan'] = $lahan->with('pemilik')->with('tanah')->with('pengairan')->get();
        $data['pemilik'] = Pemilik::get();

        return view('admin.lahan.edit', $data);
    }
    

    function detail($lahan){
        
        $data['lahan'] = Lahan::where('id', $lahan)->with('pemilik')->with('tanah')->with('pengairan')->get();

        return view('admin.lahan.detail', $data);
    
    }

    function editAction(Lahan $lahan, Request $request){
        $x = $lahan::with('tanah')->with('pengairan')->get();
        $dataLahan = $x[0];
        $tanah = $dataLahan->tanah[0];
        $pengairan = $dataLahan->pengairan[0];

        if($request->gambar != null){
            $dataLahan->handleDeleteFoto();
             // Update lahan
            $dataLahan->id_pemilik = $request->id_pemilik;
            $dataLahan->luas = $request->luas;
            $dataLahan->lokasi = $request->lokasi;
            $dataLahan->kategori = $request->kategori;
            $dataLahan->lat = $request->lat;
            $dataLahan->lng = $request->lng;
            $dataLahan->handleUploadFoto();

            $updateLahan = $dataLahan->update();

            if ($updateLahan == 1) {
                // Update Tanah
                $tanah->tekstur = $request->tekstur;
                $tanah->ph_tanah = $request->ph_tanah;
                $updateTanah = $tanah->update();

                if ($updateTanah == 1) {
                    // Update Pengairan
                    $pengairan->banyak_pengairan = $request->banyak_pengairan;
                    $updatePengairan = $pengairan->update();
                }
                return redirect('admin/lahan')->with('success', 'Data berhasil diupdate !');
            }else{
                return back()->with('danger', 'Terjadi kesalahan saat mengupdate data !');
            }

        }else{
             // Update lahan
            $dataLahan->id_pemilik = $request->id_pemilik;
            $dataLahan->luas = $request->luas;
            $dataLahan->lokasi = $request->lokasi;
            $dataLahan->kategori = $request->kategori;
            $dataLahan->lat = $request->lat;
            $dataLahan->lng = $request->lng;

            $updateLahan = $dataLahan->update();

            if ($updateLahan == 1) {
                // Update Tanah
                $tanah->tekstur = $request->tekstur;
                $tanah->kedalaman = $request->kedalaman;
                $tanah->ph_tanah = $request->ph_tanah;
                $updateTanah = $tanah->update();

                if ($updateTanah == 1) {
                    // Update Pengairan
                    $pengairan->banyak_pengairan = $request->banyak_pengairan;
                    $pengairan->ph_air = $request->ph_air;
                    $updatePengairan = $pengairan->update();
                }
                return redirect('admin/lahan')->with('success', 'Data berhasil diupdate !');
            }else{
                return back()->with('danger', 'Terjadi kesalahan saat mengupdate data !');
            }
        }
        
       


        
    }
    function hapus($lahan){
        
        $x = Lahan::where('id', $lahan)->with('tanah')->with('pengairan')->get();
        
        $dataLahan = $x[0];

        $tanah = $dataLahan->tanah[0]->delete();
        $pengairan = $dataLahan->pengairan[0]->delete();
        $dataLahan->handleDeleteFoto();
        $dl = Lahan::where('id', $lahan)->delete();

        return back()->with('success', 'Data berhasil dihapus !');
    
    }

    
   
}
