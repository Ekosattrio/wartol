<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request; // <--- Jangan lupa ini

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        // --- TAMBAHKAN BAGIAN INI ---
        $middleware->redirectGuestsTo(function (Request $request) {
            // Jika user mencoba akses URL yang berawalan 'penjual' atau 'admin'
            if ($request->is('penjual*', 'admin*')) {
                return route('index');
            }

            // Jika user biasa (pembeli) belum login, arahkan ke mana?
            // Karena kamu pakai OTP, mungkin ke home atau form OTP
            return route('index');
        });
        // ----------------------------

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
