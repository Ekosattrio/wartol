<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )

    ->withMiddleware(function (Middleware $middleware) {

        /**
         * Redirect guest (JANGAN ganggu Midtrans & API)
         */
        $middleware->redirectGuestsTo(function (Request $request) {

            // Kalau request ke api / callback → biarin masuk
            if (
                $request->is('api/*') ||
                $request->is('midtrans/*')
            ) {
                return null;
            }

            // Sisanya baru redirect
            return route('index');
        });

        /**
         * Bypass CSRF KHUSUS Midtrans
         * (yang ini penting biar ga 419)
         */
        $middleware->validateCsrfTokens(except: [
            'api/midtrans/callback',
        ]);

    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })

    ->create();
