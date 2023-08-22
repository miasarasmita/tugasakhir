<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Penggunacontroller;


Route::prefix('/pengguna')->group(function () {
    Route::controller(Penggunacontroller::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/lahan', 'lahan');
        Route::get('/lahan/detail{lahan}', 'detail');
    });
});
