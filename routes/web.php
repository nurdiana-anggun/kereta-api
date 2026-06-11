<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PemesananController;

// 1. Landing Page
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return view('landing');
})->name('landing');

// 2. Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 3. Admin Secret Registration
Route::get('/register/admin', [AuthController::class, 'showAdminRegister'])->name('register.admin');
Route::post('/register/admin', [AuthController::class, 'registerAdmin']);

// 4. Protected Routes
Route::middleware(['auth'])->group(function () {
    
    // Dashboard & Jadwal Umum
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');

    // Alur Pemesanan (Customer)
    Route::get('/pemesanan/create/{jadwal_id}', [PemesananController::class, 'create'])->name('pemesanan.create');
    Route::post('/pemesanan/store', [PemesananController::class, 'store'])->name('pemesanan.store');
    Route::get('/pembayaran/{id}', [PemesananController::class, 'pembayaran'])->name('pemesanan.pembayaran');
    Route::post('/pembayaran/{id}/konfirmasi', [PemesananController::class, 'konfirmasiPembayaran'])->name('pemesanan.konfirmasi');
    Route::get('/riwayat', [PemesananController::class, 'riwayat'])->name('pemesanan.riwayat');

    // 5. Admin Routes
    Route::middleware(['role:admin'])->prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'adminIndex'])->name('admin.dashboard');
        
        Route::get('/pesanan', [PemesananController::class, 'adminIndex'])->name('admin.pesanan');
        Route::post('/pesanan/konfirmasi/{id}', [PemesananController::class, 'konfirmasi'])->name('admin.konfirmasi');
        
        Route::get('/jadwal/create', [JadwalController::class, 'create'])->name('admin.jadwal.create');
        Route::post('/jadwal/store', [JadwalController::class, 'store'])->name('admin.jadwal.store');
        Route::get('/jadwal/{id}/edit', [JadwalController::class, 'edit'])->name('admin.jadwal.edit');
        Route::put('/jadwal/{id}', [JadwalController::class, 'update'])->name('admin.jadwal.update');
        Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('admin.jadwal.destroy');
    });
});