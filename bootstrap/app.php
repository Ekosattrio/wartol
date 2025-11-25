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

        // Redirect semua guest
        $middleware->redirectGuestsTo(function (Request $request) {
            return route('index');
        });

        // Bypass CSRF khusus Midtrans
        $middleware->validateCsrfTokens(except: [
            'midtrans/callback',
            'midtrans/callback/*',
            'api/midtrans/callback',
            'api/midtrans/callback/*',
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
