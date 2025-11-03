<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Penjual\AuthController;
use App\Http\Controllers\Penjual\DashboardController;
use App\Http\Controllers\Penjual\ProductController;
use App\Http\Controllers\Penjual\TransactionController;
use App\Http\Controllers\Penjual\LaporanController;

Route::prefix('penjual')->group(function () {

    // Login page
    Route::get('/', [AuthController::class, 'index'])->name('penjual.login');
    Route::post('/login', [AuthController::class, 'login'])->name('penjual.login.submit');

    // Dashboard (protected nanti pakai middleware)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('penjual.dashboard');

    // Manajemen Produk (CRUD Full)
    Route::resource('/products', ProductController::class);

    // POS (Transaksi Offline)
    Route::get('/pos', [TransactionController::class, 'pos'])->name('penjual.pos');
    Route::post('/pos/store', [TransactionController::class, 'store'])->name('penjual.pos.store');

    // Laporan (Read Only)
    Route::get('/laporan', [LaporanController::class, 'index'])->name('penjual.laporan');
});


// Halaman utama pembeli
Route::get('/', [FrontendController::class, 'index'])->name('home');
