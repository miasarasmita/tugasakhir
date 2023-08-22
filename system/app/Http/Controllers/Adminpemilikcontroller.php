<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemilik;
use App\Models\Lahan;

class Adminpemilikcontroller extends Controller
{
    

    function index(){
        $data['list'] = Pemilik::get();
        return view('admin.pemilik.index', $data);
    }
    function add(){
        
        $pemilik = new Pemilik;
        $pemilik->nama = request('nama');
        $pemilik->tlp = request('tlp');
        $pemilik->alamat = request('alamat');

        $simpan = $pemilik->save();

        if ($simpan == 1) {
            return back()->with('success', 'Data berhasil ditambahkan !');
        } else {
            return back()->with('danger', 'Data gagal ditambahkan !');
        }
    
    }
    function edit(Pemilik $pemilik){
        

        $pemilik->nama = request('nama');
        $pemilik->tlp = request('tlp');
        $pemilik->alamat = request('alamat');

        $update = $pemilik->update();

        if ($update == 1) {
            return back()->with('success', 'Data berhasil diupdate !');
        } else {
            return back()->with('danger', 'Data gagal diupdate !');
        }
    
    }
    function hapus(Pemilik $pemilik){
        $id = $pemilik->id;

        $lahan = Lahan::where('id_pemilik', $id)->delete();
        $pemilik = Pemilik::where('id', $id)->delete();
    
        return back()->with('success', 'Data berhasil dihapus !');
    
    
    }
}
