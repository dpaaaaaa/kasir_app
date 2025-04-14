<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DetailPenjualanController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardPetugasController;

// 🔹 Halaman utama (redirect ke login)
Route::get('/', function () {
    return redirect()->route('login');
});

// 🔹 Authentication Routes dari Laravel Breeze
require __DIR__.'/auth.php';

// 🔹 Middleware autentikasi untuk memastikan user sudah login
Route::middleware(['auth'])->group(function () {

    // 🔹 Dashboard Admin
    Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');

    // 🔹 Dashboard Petugas
    Route::get('/userdashboard', [DashboardPetugasController::class, 'index'])->name('userdashboard');
    

    // 🔹 CRUD untuk Admin (tidak pakai prefix)
    Route::resource('admin/user', UserController::class);
    Route::resource('admin/pelanggan', PelangganController::class);
    Route::resource('admin/penjualan', PenjualanController::class);
    Route::resource('admin/produk', ProdukController::class);
    Route::resource('admin/detailpenjualan', DetailPenjualanController::class);

    // 🔹 Profile (untuk semua role)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

