<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PajriaPerusahaanController;
use App\Http\Controllers\PajriaLowonganController;
use App\Http\Controllers\PajriaPelamarMagangController;
use App\Http\Controllers\PajriaLaporanController;
use App\Http\Controllers\Frontend\AuthController;

/*
|--------------------------------------------------------------------------
| Root Redirect Based on Role
|--------------------------------------------------------------------------
*/
Route::get('/', function () {


    return view('frontend.beranda');
})->name('frontend.beranda');


/*
|--------------------------------------------------------------------------
| Public Routes (Frontend)
|--------------------------------------------------------------------------
*/

Route::get('/lowongan', [PajriaLowonganController::class, 'indexFrontend'])->name('frontend.lowongan');
Route::get('/lowongan/{id}', [PajriaLowonganController::class, 'showFrontend'])->name('frontend.lowongan.show');
Route::get('/lowongan/{id}', [PajriaLowonganController::class, 'showFrontend'])->name('frontend.lowongan.show');

Route::get('/perusahaan', [PajriaPerusahaanController::class, 'indexFrontend'])->name('frontend.perusahaan');
Route::get('/perusahaan/{id}', [PajriaPerusahaanController::class, 'showFrontend'])
    ->middleware('auth')
    ->name('frontend.perusahaan.show');

// Auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('user.register');
Route::post('/register', [AuthController::class, 'register']);

// Pelamar
Route::get('/daftar', [PajriaPelamarMagangController::class, 'daftar'])->name('pelamar.daftar');
Route::post('/daftar', [PajriaPelamarMagangController::class, 'daftarSimpan'])->name('pelamar.daftar.simpan');
Route::get('/lowongan/{id}/daftar', [PajriaPelamarMagangController::class, 'daftar'])->name('frontend.lowongan.daftar');


/*
|--------------------------------------------------------------------------
| Protected Routes - USER
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/pelamar', [PajriaPelamarMagangController::class, 'pelamarUser'])->name('frontend.pelamar.index');
    Route::get('/lowongan', [PajriaLowonganController::class, 'indexFrontend'])->name('lowongan.index');
    Route::get('/lowongan/{id}', [PajriaLowonganController::class, 'showFrontend'])->name('lowongan.show');

    Route::get('/perusahaan', [PajriaPerusahaanController::class, 'indexFrontend'])->name('perusahaan.index');
    Route::get('/perusahaan/{id}', [PajriaPerusahaanController::class, 'showFrontend'])->name('perusahaan.show');
});

/*
|--------------------------------------------------------------------------
| Protected Routes - ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/kelola', function () {
        return view('admin.kelola.index');
    })->name('kelola.index');

    Route::get('/dashboard', [PajriaPelamarMagangController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/semua', [PajriaPelamarMagangController::class, 'semua'])->name('dashboard.semua');
    Route::get('/dashboard/diterima', [PajriaPelamarMagangController::class, 'diterima'])->name('dashboard.diterima');

    Route::resource('perusahaan', PajriaPerusahaanController::class)->names('perusahaan');
    Route::resource('pelamar', PajriaPelamarMagangController::class)->names('pelamar');
    Route::resource('laporan', PajriaLaporanController::class)->names('laporan');

    // Lowongan manual
    Route::get('/lowongan', [PajriaLowonganController::class, 'indexAdmin'])->name('lowongan.index');
    Route::get('/lowongan/create', [PajriaLowonganController::class, 'create'])->name('lowongan.create');
    Route::post('/lowongan', [PajriaLowonganController::class, 'store'])->name('lowongan.store');
    Route::get('/lowongan/{lowongan}/edit', [PajriaLowonganController::class, 'edit'])->name('lowongan.edit');
    Route::put('/lowongan/{lowongan}', [PajriaLowonganController::class, 'update'])->name('lowongan.update');
    Route::delete('/lowongan/{lowongan}', [PajriaLowonganController::class, 'destroy'])->name('lowongan.destroy');
});

/*
|--------------------------------------------------------------------------
| Logout Route
|--------------------------------------------------------------------------
*/
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
