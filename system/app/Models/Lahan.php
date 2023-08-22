<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class Lahan extends Authenticatable{
    
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "lahan";

    public function pemilik(){
        return $this->belongsTo(Pemilik::class, 'id_pemilik', 'id');
    }
    public function tanah(){
        return $this->hasMany(Tanah::class, 'id_lahan', 'id');
    }
    public function pengairan(){
        return $this->hasMany(Pengairan::class, 'id_lahan', 'id');
    }

    function handleUploadFoto(){
        if(request()->hasFile('gambar')){
            $gambar = request()->file('gambar');
            $destination = "/lahan";
            $randomStr = Str::random(3);
            $filename = $this->id."-".time()."-".$randomStr.".".$gambar->extension();
            $url = $gambar->storeAs($destination, $filename);
            $this->gambar = 'app/'.$url;
            $this->save;
        }
    }
    function handleDeleteFoto(){
        $gambar = $this->gambar;
        if($gambar){
            $path = public_path($gambar);
            if(file_exists($path)){
                unlink($path);

            }
            return true;
        }
    }

    

}
