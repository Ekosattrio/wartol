<?php

use Illuminate\Support\Facades\Route;

// Penjual Controllers
use App\Http\Controllers\Penjual\DashboardController;
use App\Http\Controllers\Penjual\ProductController;
use App\Http\Controllers\Penjual\TransactionController;
use App\Http\Controllers\Penjual\LaporanController;
use App\Http\Controllers\Penjual\PosController;
use App\Http\Controllers\Penjual\AdminLoginController;

// Frontend Controllers
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PaymentController;


// =====================
// ROUTE PENJUAL
// =====================
Route::prefix('penjual')->name('penjual.')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/laporan', [LaporanController::class, 'index'])
        ->name('laporan');

    Route::get('/pos', [PosController::class, 'index'])
        ->name('pos');

    Route::get('/produk', [ProductController::class, 'index'])
        ->name('produk');
    Route::post('/produk', [ProductController::class, 'store'])
        ->name('produk.store'); // Nama rutenya: penjual.produk.store
    Route::put('/produk/{product}', [ProductController::class, 'update'])
        ->name('produk.update');
    Route::delete('/produk/{product}', [ProductController::class, 'destroy'])
        ->name('produk.destroy');
});


// =====================
// FRONTEND
// =====================
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::post('/fillphonenumber', [FrontendController::class, 'fillphonenumber'])
    ->name('fillphonenumber');


// =====================
// PAYMENT
// =====================
Route::get('/payment', [PaymentController::class, 'index'])
    ->name('payment.index');

Route::post('/payment/store', [PaymentController::class, 'store'])
    ->name('payment.store');


// =====================
// TEST VIEW
// =====================
Route::get('/index', fn() => view('index'))->name('index');



// ROUTE LOGIN ADMIN
Route::post('/admin/login', [AdminLoginController::class, 'store'])->name('admin.login');
Route::post('/admin/logout', [AdminLoginController::class, 'destroy'])->name('admin.logout');

// 'auth' saja otomatis pakai guard 'web'
// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
// });

// Rute untuk PENJUAL (harus login pakai tabel 'penjual')
// Kita harus spesifik: 'auth:admin'
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminLoginController::class, 'index'])->name('admin.dashboard');
    // ...
});
