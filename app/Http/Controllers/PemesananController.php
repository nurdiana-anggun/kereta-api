<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemesananController extends Controller
{
    // --- FUNGSI CUSTOMER ---

    public function create($jadwal_id) {
        $jadwal = Jadwal::findOrFail($jadwal_id);
        return view('pemesanan.create', compact('jadwal'));
    }

    public function store(Request $request) 
    {
        $request->validate(['jumlah_tiket' => 'required|numeric|min:1']);
        $jadwal = Jadwal::findOrFail($request->jadwal_id);
        
        if ($jadwal->kuota_tersedia < $request->jumlah_tiket) {
            return back()->with('error', 'Tiket tidak cukup!');
        }
        
        // 1. Simpan pesanan untuk mendapatkan pemesanan_id
        $pesanan = Pemesanan::create([
            'user_id' => auth()->id(),
            'jadwal_id' => $request->jadwal_id,
            'jumlah_tiket' => $request->jumlah_tiket,
            'total_harga' => 0, 
            'status_pemesanan' => 'pending',
            'tanggal_pemesanan' => now(),
        ]);
        
        // 2. Terapkan Kode Unik
        $hargaAsli = $jadwal->harga_tiket * $request->jumlah_tiket;
        $totalTagihan = $hargaAsli + $pesanan->pemesanan_id;
        
        $pesanan->update(['total_harga' => $totalTagihan]);
        
        // 3. Update Kuota
        $jadwal->decrement('kuota_tersedia', $request->jumlah_tiket);
        
        return redirect()->route('pemesanan.pembayaran', $pesanan->pemesanan_id);
    }

    public function pembayaran($id) 
    {
        $pesanan = Pemesanan::findOrFail($id);
        return view('pemesanan.pembayaran', compact('pesanan'));
    }

    // Dipanggil saat Customer menekan tombol "Saya Sudah Transfer"
    public function konfirmasiPembayaran($id)
    {
        $pesanan = Pemesanan::findOrFail($id);
        $pesanan->update(['status_pemesanan' => 'menunggu_verifikasi']);

        return redirect()->route('pemesanan.riwayat')
                         ->with('success', 'Pembayaran sedang diproses, tunggu verifikasi admin!');
    }

    public function riwayat() {
        $pesanans = Pemesanan::where('user_id', Auth::id())->with('jadwal')->latest()->get();
        return view('customer.riwayat', compact('pesanans'));
    }

    // --- FUNGSI ADMIN ---

    public function adminIndex() {
        $pesanans = Pemesanan::with(['user', 'jadwal'])->latest()->get();
        return view('admin.pemesanan', compact('pesanans'));
    }

    // Dipanggil saat Admin menekan tombol "Konfirmasi Bayar"
    public function konfirmasi($id) {
        $pesanan = Pemesanan::findOrFail($id);
        $pesanan->update(['status_pemesanan' => 'paid']);
        
        return back()->with('success', 'Pembayaran ID #' . $id . ' telah dikonfirmasi menjadi Lunas.');
    }
}