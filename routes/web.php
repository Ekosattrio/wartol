<?php

use Illuminate\Support\Facades\Route;

// Pembeli login controller
use App\Http\Controllers\Auth\OtpAuthController;

// Penjual Controllers
use App\Http\Controllers\Penjual\DashboardController;
use App\Http\Controllers\Penjual\ProductController;
use App\Http\Controllers\Penjual\TransactionController;
use App\Http\Controllers\Penjual\LaporanController;
use App\Http\Controllers\Penjual\PosController;
use App\Http\Controllers\Penjual\AdminLoginController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| Rute Publik (Bisa diakses siapa saja)
|--------------------------------------------------------------------------
*/

// =====================
// ROUTE PENJUAL
// =====================
Route::prefix('penjual')->name('penjual.')->group(function () {

    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
    Route::get('/laporan/{id}/edit', [LaporanController::class, 'edit'])->name('laporan.edit');
    Route::delete('/laporan/{id}', [LaporanController::class, 'destroy'])->name('laporan.destroy');

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
    Route::get('/laporan/export/excel', [LaporanController::class, 'exportExcel'])->name('laporan.export.excel');
    Route::get('/laporan/export/pdf', [LaporanController::class, 'exportPDF'])->name('laporan.export.pdf');
    Route::put('/laporan/{transaction}', [LaporanController::class, 'update'])->name('laporan.update');
    Route::put('/orders/{id}/complete', [DashboardController::class, 'completeOrder'])->name('order.complete');
});


// =====================
// FRONTEND
// =====================
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::post('/fillphonenumber', [FrontendController::class, 'fillphonenumber'])->name('fillphonenumber');

// Route untuk testing view
Route::get('/index', [FrontendController::class, 'index'])->name('index');

// Halaman ketika warteg / wartol ditutup
Route::get('/closed', function(){
    return view('closed');
})->name('closed');

// Checkout harus bisa diakses login maupun guest
Route::post('/createorderjs', [CheckoutController::class, 'createorderjs'])->name('checkout.create');


/*
|--------------------------------------------------------------------------
| Rute Otentikasi PEMBELI (via OTP, Guard: 'web')
|--------------------------------------------------------------------------
*/

// Untuk TAMU (belum login)
Route::middleware('guest')->group(function () {

    // Kirim OTP
    Route::post('login/send-otp', [OtpAuthController::class, 'sendOtp'])->name('auth.send.otp');

    // Halaman verif OTP
    Route::get('verif-otp', [OtpAuthController::class, 'showVerifyForm'])->name('auth.verify.form');
    Route::post('verif-otp', [OtpAuthController::class, 'verifyOtp'])->name('auth.verify.otp');
});

// Untuk pengguna YANG SUDAH login
Route::middleware('auth')->group(function () {

    // Dashboard pembeli
    Route::get('/dashboard', [FrontendController::class, 'index'])->name('dashboard');

    // Logout pembeli
    Route::post('logout', [OtpAuthController::class, 'logout'])->name('auth.logout');

    // Payment
    Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
    Route::post('/payment/store', [PaymentController::class, 'store'])->name('payment.store');
});


/*
|--------------------------------------------------------------------------
| Rute Otentikasi PENJUAL (ADMIN)
|--------------------------------------------------------------------------
*/

// TAMU Admin (belum login)
Route::middleware('guest:admin')->group(function () {

    Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])
        ->name('admin.login.form');

    Route::post('/admin/login', [AdminLoginController::class, 'store'])
        ->name('admin.login');
});

// Admin SUDAH login
// Route::middleware(['auth:admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminLoginController::class, 'index'])
        ->name('admin.dashboard');

    Route::post('/admin/logout', [AdminLoginController::class, 'destroy'])
        ->name('admin.logout');

    Route::prefix('penjual')->name('penjual.')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/toggle-wartol', [DashboardController::class, 'toggleWartol'])->name('toggle-wartol');

        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
        Route::get('/laporan/{id}/edit', [LaporanController::class, 'edit'])->name('laporan.edit');
        Route::delete('/laporan/{id}', [LaporanController::class, 'destroy'])->name('laporan.destroy');

        Route::get('/pos', [PosController::class, 'index'])->name('pos');
        Route::post('/pos/checkout', [PosController::class, 'checkout'])->name('pos.checkout');

        Route::get('/produk', [ProductController::class, 'index'])->name('produk');
        Route::post('/produk', [ProductController::class, 'store'])->name('produk.store');
        Route::put('/produk/{product}', [ProductController::class, 'update'])->name('produk.update');
        Route::delete('/produk/{product}', [ProductController::class, 'destroy'])->name('produk.destroy');
    });

// });
