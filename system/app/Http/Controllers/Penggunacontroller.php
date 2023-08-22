<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemilik;
use App\Models\Lahan;
use App\Models\Tanah;
use App\Models\Pengairan;

class Penggunacontroller extends Controller
{
    

    function index(){
        $result = Lahan::with('tanah')
                ->with('pemilik')
                ->with('pengairan')
                ->get();
    
       
        
        return response()->json([
            'status' => 200,
            'message' => 'Data berhasil di load',
            'data' => $result,
        ]);


    }
    function lahan(){
        $data['lahan'] = Lahan::with('pemilik')->get();
        $jp = Lahan::where('kategori_lahan', 'Pertanian')->count();
        $jl = Lahan::where('kategori_lahan', 'Perkebunan')->count();
        $data['persentasePertanian'] = ($jp / 100) * 100;
        $data['persentasePerkebunan'] = ($jl / 100) * 100;
      
        return view('lahan', $data);
    }

    function detail($lahan){
        $data['lahan'] = Lahan::where('id', $lahan)->with('pemilik')->with('tanah')->with('pengairan')->get();

        return view('detaillahan', $data);
    }

    
}
