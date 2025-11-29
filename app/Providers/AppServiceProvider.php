<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Transaction;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // if (config('app.env') === 'production' || config('app.env') === 'local') {
        //     URL::forceScheme('https');
        // }

        // Bagikan data notifikasi hanya ke view 'component.header'
        // Ini lebih efisien daripada membagikannya ke semua view penjual.
        View::composer('component.header', function ($view) {
            // Pastikan hanya berjalan jika penjual (admin) sudah login
            if (auth()->guard('admin')->check()) {
                $allPendingOrders = Transaction::where('payment_method', 'midtrans')
                    ->where('payment_status', 'success')
                    ->where('status', 'pending')
                    ->orderBy('created_at', 'asc')
                    ->get();
                $view->with('allPendingOrders', $allPendingOrders);
            } else {
                // Jika bukan penjual, berikan koleksi kosong untuk menghindari error
                $view->with('allPendingOrders', collect());
            }
        });
    }
}
