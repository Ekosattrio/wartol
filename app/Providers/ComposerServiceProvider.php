<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Transaction;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('component.header', function ($view) {
            $allPendingOrders = Transaction::where('status', 'pending')->orderBy('created_at', 'asc')->get();
            $view->with('allPendingOrders', $allPendingOrders);
        });
    }
}