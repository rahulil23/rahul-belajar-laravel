<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Level
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure $next
     * @param string|array $levels
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$levels)
    {
        // Periksa apakah pengguna masuk
        if (Auth::check()) {
            $userLevel = Auth::user()->level;

            view()->share('isAdmin', $userLevel == 'admin');
            view()->share('isUser', $userLevel == 'user');

            // Periksa apakah level pengguna sesuai dengan yang diizinkan
            if (in_array($userLevel, $levels)) {
                return $next($request);
            }

            // Jika pengguna adalah admin, arahkan ke dashboard admin
            if ($userLevel == 'admin') {
                return redirect('/dashboard');
            }

            // Jika pengguna adalah user, arahkan ke profil
            if ($userLevel == 'user') {
                return redirect('/list-produk');
            }
        }

        // Jika tidak ada pengguna masuk, arahkan ke halaman login
        return redirect('/login');
    }
}
