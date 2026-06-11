<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // --- REGISTRASI CUSTOMER ---
    public function showRegister() { return view('auth.register'); }

    public function register(Request $request) 
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'customer', 
        ]);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat!');
    }

    // --- REGISTRASI ADMIN (Halaman Tersembunyi) ---
    public function showAdminRegister() { return view('auth.admin_register'); }

    public function registerAdmin(Request $request) 
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:6',
            'admin_key' => 'required'
        ]);

        // Cek kunci rahasia
        if ($request->admin_key !== 'admin') {
            return back()->withErrors(['admin_key' => 'Kunci akses salah!']);
        }

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'admin', // Role diset paksa jadi admin
        ]);

        return redirect()->route('login')->with('success', 'Admin berhasil didaftarkan!');
    }

    // --- LOGIN & LOGOUT ---
    public function showLogin() { return view('auth.login'); }

    public function login(Request $request) 
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Redirect berdasarkan role
            if (Auth::user()->role === 'admin') {
                // Ubah menjadi route yang diinginkan untuk dashboard admin
                return redirect()->route('admin.dashboard'); 
            }
            
            // Redirect untuk customer
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    public function logout(Request $request) 
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}