<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class cekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $role = Session::get('role');

        if ($role === 'owner') {
            // Ambil nama route yang sedang diakses
            $currentRouteName = $request->route()->getName();
            // Daftar halaman yang dibatasi oleh role owner
            $restrictedPages = [
                'image.create', 'image.edit', 'image.destroy',
                'video.create', 'video.edit', 'video.destroy',
                'menu.create', 'menu.edit', 'menu.destroy',
                'chef.create', 'chef.edit', 'chef.destroy',
                'transaction.create', 'transaction.edit', 'transaction.destroy',
                'event.create', 'event.edit', 'event.destroy',
                'review.create', 'review.edit', 'review.destroy',
            ];
            // Jika nama route yang sedang diakses ada di dalam daftar halaman yang dibatasi, maka kembalikan ke halaman unauthorized
            if (in_array($currentRouteName, $restrictedPages)) {
                abort(403); 
            }
        }
        // Jika nama route yang sedang diakses tidak ada di dalam daftar halaman yang dibatasi, maka lanjutkan ke proses berikutnya
        return $next($request);
    }
}