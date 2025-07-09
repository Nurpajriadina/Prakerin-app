<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PajriaPerusahaanController;
use App\Http\Controllers\PajriaLowonganController;
use App\Http\Controllers\PajriaPelamarMagangController;
use App\Http\Controllers\PajriaLaporanController;

Route::resource('/perusahaan', PajriaPerusahaanController::class);
Route::resource('/lowongan', PajriaLowonganController::class);
Route::resource('/pelamar', PajriaPelamarMagangController::class);
Route::resource('/laporan', PajriaLaporanController::class);


Route::get('/', function () {
    return view('welcome');
});
