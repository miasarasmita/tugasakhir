<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemilik;
use App\Models\Lahan;
use App\Models\Tanah;
use App\Models\Pengairan;
use Illuminate\Support\Facades\DB;

class Adminpersentasecontroller extends Controller
{
    
    // Lahan
    function index(){
        
        $jp = Lahan::where('kategori_lahan', 'Pertanian')->count();
        $jl = Lahan::where('kategori_lahan', 'Perkebunan')->count();
        $data['persentasePertanian'] = ($jp / 100) * 100;
        $data['persentasePerkebunan'] = ($jl / 100) * 100;
  
        return view('admin.persentase.index', $data);
    
    }
   
}
