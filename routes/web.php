<?php

use Illuminate\Support\Facades\Route;

// Penjual Controllers
use App\Http\Controllers\Penjual\DashboardController;
use App\Http\Controllers\Penjual\ProductController;
use App\Http\Controllers\Penjual\TransactionController;
use App\Http\Controllers\Penjual\LaporanController;
use App\Http\Controllers\Penjual\PosController;

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

    // Route untuk melakukan checkout dari POS
    Route::post('/pos/checkout', [PosController::class, 'checkout'])
        ->name('pos.checkout');

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
