<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemilik;
use App\Models\Lahan;
use App\Models\Tanah;
use App\Models\Pengairan;

class Admindashboardcontroller extends Controller
{
    

    function index(){
        $data['lahan'] = Lahan::with('pemilik')->get();
        return view('admin.dashboard', $data);
    }
}
