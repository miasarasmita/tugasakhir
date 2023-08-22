<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Adminauthcontroller;
use App\Http\Controllers\Admindashboardcontroller;
use App\Http\Controllers\Adminpemilikcontroller;
use App\Http\Controllers\Adminlahancontroller;
use App\Http\Controllers\Adminprofilecontroller;
use App\Http\Controllers\Adminpersentasecontroller;


use App\Http\Controllers\Penggunacontroller;

Route::prefix('/pengguna')->group(function () {
    Route::controller(Penggunacontroller::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/lahan', 'lahan');
        Route::get('/lahan/detail/{lahan}', 'detail');
    });
});



// Admin Controller
Route::prefix('/')->group(function () {
    Route::controller(Adminauthcontroller::class)->group(function () {
        Route::get('/', 'login')->name('login');
        Route::post('/aksiLogin', 'aksiLogin');
    });
});

Route::prefix('admin')->group(function () {

    Route::controller(Admindashboardcontroller::class)->group(function () {
        Route::get('dashboard', 'index');
    });
    Route::controller(Adminpemilikcontroller::class)->group(function () {
        Route::get('pemilik', 'index');
        Route::post('pemilik/add', 'add');
        Route::post('pemilik/edit/{pemilik}', 'edit');
        Route::post('pemilik/hapus/{pemilik}', 'hapus');
    });
    Route::controller(Adminlahancontroller::class)->group(function () {
        // Lahan //
        Route::get('lahan', 'index');
        Route::get('lahan/add', 'add');
        Route::post('lahan/addAction', 'addAction');
        Route::get('lahan/edit/{lahan}', 'edit');
        Route::post('lahan/editAction/{lahan}', 'editAction');
        Route::get('lahan/detail/{lahan}', 'detail');
        Route::post('lahan/hapus/{lahan}', 'hapus');
    });
    Route::controller(Adminpersentasecontroller::class)->group(function () {
        
        Route::get('persentase', 'index');
    });
    Route::controller(Adminprofilecontroller::class)->group(function () {

        Route::get('profile', 'index');
        Route::post('profile/update/{admin}', 'edit');
        
    });
    
})->middleware(['admin']);