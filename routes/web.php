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

Route::get('/', [LandingController::class, 'index'])->name('landing-page');

// login, register, logout

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// barang
Route::resource('barang', BarangController::class);

// laporan stok
Route::resource('laporan_stok', LaporanStokController::class);

// barang masuk
Route::resource('barang_masuk', BarangMasukController::class);
Route::get('/barang-masuk/baru', [BarangMasukController::class, 'Baru'])->name('barang_masuk.baru');
Route::get('/barang-masuk/lama', [BarangMasukController::class, 'Lama'])->name('barang_masuk.lama');

// barang keluar
Route::resource('barang_keluar', BarangKeluarController::class);

// user
Route::resource('user', UserController::class);

// satuan
Route::resource('satuan', SatuanController::class);