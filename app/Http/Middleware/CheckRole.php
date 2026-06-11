<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // 1. Pastikan user sudah login
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // 2. Refresh data user agar mengambil nilai terbaru dari DB
        $user = auth()->user();
        $user->refresh();

        // 3. Debugging (Hapus/comment baris ini jika sudah normal)
        // dd($user->role, $roles); 

        // 4. Cek apakah role diizinkan
        if (!in_array(trim($user->role), $roles)) {
            return redirect('/dashboard')->with('error', 'Anda tidak memiliki izin akses.');
        }
        
        return $next($request);
    }
}