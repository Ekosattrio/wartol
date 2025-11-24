<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }

    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // Jika mau ke halaman penjual, lempar ke login admin
            if ($request->is('penjual*') || $request->is('admin*')) {
                return route('admin.login.form');
            }

            // Default lempar ke route OTP/Home
            return route('auth.send.otp');
        }
    }
}
