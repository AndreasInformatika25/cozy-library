<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    // Ubah parameter $role jadi ...$roles (spread operator)
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // 1. Cek apakah user udah login
        // 2. Pakai in_array untuk ngecek apakah role user ada di dalam daftar $roles yang dibolehin
        if (Auth::check() && in_array(Auth::user()->role, $roles)) {
            return $next($request); // Akses diizinkan, lanjut bos!
        }

        // Kalau role nggak cocok, lempar error 403
        abort(403, 'Maaf, kamu tidak memiliki hak akses ke halaman ini.');
    }
}