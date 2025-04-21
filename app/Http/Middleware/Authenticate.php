<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna sudah login
        if (!Auth::check()) {
            // Redirect ke halaman login jika belum login
            return redirect()->route('login');
        }

        return $next($request);
    }
}