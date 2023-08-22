<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class Adminprofilecontroller extends Controller
{
    

    function index(){
        return view('admin.profile.index');
    }

    public function edit(Admin $admin, Request $request){

       
        
        if($request->foto != null){

            if($request->password != null){
                 // Hapus file lama
                $hapusFile = $admin->handleDeleteFoto();
                if($hapusFile){
                    $admin->nama = $request->nama;
                    $admin->email = $request->email;
                    $admin->password = bcrypt($request->password);
                    $admin->handleUploadFoto();
                    $admin->update();
                    return back()->with('success', 'Profile berhasil diupdate !');
                }else{
                    return back()->with('danger', 'Terjadi kesalahan saat mengupload foto !');
                }
            }else{
                $admin->nama = $request->nama;
                $admin->email = $request->email;
                $admin->handleUploadFoto();
                $admin->update();
                return back()->with('success', 'Profile berhasil diupdate !');
                $hapusFile = $admin->handleDeleteFoto();
                if($hapusFile){
                    $admin->nama = $request->nama;
                    $admin->email = $request->email;
                    $admin->handleUploadFoto();
                    $admin->update();
                    return back()->with('success', 'Profile berhasil diupdate !');
                }else{
                    return back()->with('danger', 'Terjadi kesalahan saat mengupload foto !');
                }
            }
        }else{
            if($request->password != null){
                // Hapus file lama
                $admin->nama = $request->nama;
                $admin->email = $request->email;
                $admin->password = bcrypt($request->password);
                $admin->update();
                return back()->with('success', 'Profile berhasil diupdate !');
            }else{
                $admin->nama = $request->nama;
                $admin->email = $request->email;
                $admin->update();
                return back()->with('success', 'Profile berhasil diupdate !');
           }
           
        }


    }
    
}
