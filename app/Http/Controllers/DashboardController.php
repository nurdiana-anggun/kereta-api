<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;

class DashboardController extends Controller
{
    /**
     * Dashboard untuk Customer
     */
    public function index(Request $request) 
    {
        $query = Jadwal::query();

        // Fitur Pencarian
        if ($request->filled('tujuan')) {
            $query->where('stasiun_tujuan', 'like', '%' . $request->tujuan . '%');
        }

        $jadwals = $query->latest()->get();

        return view('customer.dashboard', compact('jadwals'));
    }

    /**
     * Dashboard untuk Admin
     */
    public function adminIndex()
    {
        // Anda bisa menambahkan statistik di sini, misal:
        // $totalPesanan = \App\Models\Pemesanan::count();
        
        return view('admin.dashboard');
    }
}