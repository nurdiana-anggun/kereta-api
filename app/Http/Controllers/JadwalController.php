<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    // Menampilkan daftar jadwal
    public function index() {

        $jadwals = Jadwal::all();
        return view('jadwal.index', compact('jadwals'));
    }

    // Menampilkan form tambah
    public function create() {
        return view('admin.jadwal.create');
    }

    // Menyimpan jadwal baru
   public function store(Request $request)
{
    $request->validate([
        'kereta_id' => 'required|exists:keretas,kereta_id',
        'stasiun_asal' => 'required',
        'stasiun_tujuan' => 'required',
        'tanggal_berangkat' => 'required|date',
        'jam_berangkat' => 'required',
        'jam_tiba' => 'required',
        'harga_tiket' => 'required|numeric',
        'kuota_tersedia' => 'required|integer',
    ]);

    Jadwal::create([
        'kereta_id' => $request->kereta_id,
        'nama_perjalanan' => $request->stasiun_asal . ' - ' . $request->stasiun_tujuan,
        'stasiun_asal' => $request->stasiun_asal,
        'stasiun_tujuan' => $request->stasiun_tujuan,
        'tanggal_berangkat' => $request->tanggal_berangkat,
        'jam_berangkat' => $request->jam_berangkat,
        'jam_tiba' => $request->jam_tiba,
        'harga_tiket' => $request->harga_tiket,
        'kuota_tersedia' => $request->kuota_tersedia,
    ]);

    return redirect()->route('jadwal.index')
        ->with('success', 'Jadwal berhasil ditambahkan!');
}

    // Menampilkan form edit
    public function edit($id) {
        $jadwal = Jadwal::findOrFail($id);
        return view('admin.jadwal.edit', compact('jadwal'));
    }

    // Memperbarui data yang ada
   public function update(Request $request, $id)
{
    $request->validate([
        'kereta_id' => 'required|exists:keretas,kereta_id',
        'stasiun_asal' => 'required|string|max:255',
        'stasiun_tujuan' => 'required|string|max:255',
        'tanggal_berangkat' => 'required|date',
        'jam_berangkat' => 'required',
        'jam_tiba' => 'required',
        'harga_tiket' => 'required|numeric',
        'kuota_tersedia' => 'required|integer',
    ]);

    $jadwal = Jadwal::findOrFail($id);

    $jadwal->update([
        'kereta_id' => $request->kereta_id,
        'nama_perjalanan' => $request->stasiun_asal . ' - ' . $request->stasiun_tujuan,
        'stasiun_asal' => $request->stasiun_asal,
        'stasiun_tujuan' => $request->stasiun_tujuan,
        'tanggal_berangkat' => $request->tanggal_berangkat,
        'jam_berangkat' => $request->jam_berangkat,
        'jam_tiba' => $request->jam_tiba,
        'harga_tiket' => $request->harga_tiket,
        'kuota_tersedia' => $request->kuota_tersedia,
    ]);

    return redirect()
        ->route('jadwal.index')
        ->with('success', 'Jadwal berhasil diperbarui!');
}

    // Menghapus data
    public function destroy($id) {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus!');
    }
}