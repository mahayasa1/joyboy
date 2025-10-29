<?php

use Illuminate\Support\Facades\Route;   
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LaporanStokController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\DashboardController;

Route::get('/', [LandingController::class, 'index'])->name('landing-page');

// ==========================
// Auth Routes
// ==========================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================
// Dashboard (hanya untuk user login)
// ==========================
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');


    // ==========================
    // Barang
    // ==========================
    Route::resource('barang', BarangController::class);

    // ==========================
    // Laporan Stok
    // ==========================
    Route::resource('laporan_stok', LaporanStokController::class);

    // ==========================
    // Barang Masuk
    // ==========================
    Route::resource('barang_masuk', BarangMasukController::class);
    Route::get('/barang-masuk/baru', [BarangMasukController::class, 'Baru'])->name('barang_masuk.baru');
    Route::get('/barang-masuk/lama', [BarangMasukController::class, 'Lama'])->name('barang_masuk.lama');

    // ==========================
    // Barang Keluar
    // ==========================
    Route::resource('barang_keluar', BarangKeluarController::class);

    // ==========================
    // User Management
    // ==========================
    Route::resource('user', UserController::class);

    // ==========================
    // Satuan
    // ==========================
    Route::resource('satuan', SatuanController::class);

    Route::get('/laporan/laporan_stok', [LaporanStokController::class, 'index'])->name('laporan_stok');

});
