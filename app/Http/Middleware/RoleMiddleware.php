<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // Wajib ditambahin

class RoleMiddleware
{
    // Tambahin parameter $role di sini
    public function handle(Request $request, Closure $next, $role): Response
    {
        // 1. Cek apakah user udah login
        // 2. Cek apakah role user sama dengan $role yang diminta (misal: 'admin')
        if (Auth::check() && Auth::user()->role == $role) {
            return $next($request); // Boleh lewat
        }

        // Kalau bukan admin, lempar error 403 (Forbidden / Dilarang Akses)
        abort(403, 'Maaf, cuma Admin yang boleh ngakses halaman ini.');
    }
}