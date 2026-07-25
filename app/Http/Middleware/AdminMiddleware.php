<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah user sudah login dan memiliki role admin
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        // Jika bukan admin, abort 403 atau redirect ke home
        abort(403, 'Akses ditolak. Hanya admin yang diizinkan.');
        // atau
        // return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}