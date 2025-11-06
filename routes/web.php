<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Penjual\AuthController;
// use App\Http\Controllers\Penjual\DashboardController;
// use App\Http\Controllers\Penjual\ProductController;
// use App\Http\Controllers\Penjual\TransactionController;
// use App\Http\Controllers\Penjual\LaporanController;

//general
// use App\Http\Controllers\FrontendController;
// use App\Http\Controllers\PaymentController;

// Route::prefix('penjual')->group(function () {

//     // Login page

//     Route::post('/login', [AuthController::class, 'login']);
//     Route::get('/', [DashboardController::class, 'index']);

//     // Manajemen Produk (CRUD Full)
//     Route::resource('/products', ProductController::class);

//     // POS (Transaksi Offline)
//     Route::get('/pos', [TransactionController::class, 'pos'])->name('penjual.pos');
//     Route::post('/pos/store', [TransactionController::class, 'store'])->name('penjual.pos.store');

//     // Laporan (Read Only)
//     Route::get('/laporan', [LaporanController::class, 'index'])->name('penjual.laporan');
// });

// Route::get('/', [FrontendController::class, 'index']);
// Route::post('/fillphonenumber', [FrontendController::class, 'fillphonenumber']);


// Route::get('/payment', [PaymentController::class, 'index']);
// Route::post('/payment/store', [PaymentController::class, 'store']);
// ✅ Ubah route utama ke dashboard
Route::get('/', function () {
    return view('dashboard');
});
