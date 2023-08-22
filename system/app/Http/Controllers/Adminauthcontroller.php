<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Adminauthcontroller extends Controller
{
    
    
    function login(){
        return view('admin.login');
    }

    function aksiLogin(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::guard('admin')->attempt($credentials) ) {
     
            return redirect('admin/dashboard')->with('success', 'Selamat datang admin!');
        }else{
            return back()->with('danger', 'Login gagal !');
        }
    }

   
}
