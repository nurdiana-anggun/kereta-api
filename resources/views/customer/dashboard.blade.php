@extends('layouts.app')

@section('content')
<style>
    /* CSS Responsif untuk Header */
    .dashboard-header {
        position: relative;
        width: 100%;
        aspect-ratio: 21 / 9; /* Rasio lebar/panjang */
        overflow: hidden;
        border-radius: 0.5rem;
    }
    @media (max-width: 768px) {
        .dashboard-header { aspect-ratio: 16 / 9; }
        .caption-text { display: none; } /* Sembunyikan sub-teks di HP */
    }
</style>

<div class="container">
    <div class="dashboard-header shadow-sm mb-4">
        <img src="https://images.pexels.com/photos/20547197/pexels-photo-20547197.jpeg" 
             class="w-100 h-100" 
             style="object-fit: cover; filter: brightness(60%);" 
             alt="Background">
        
        <div class="position-absolute top-50 start-0 translate-middle-y ps-4 text-white">
            <h2 class="fw-bold">Halo, {{ Auth::user()->name }} 👋</h2>
            <p class="lead caption-text">Mau bepergian ke mana hari ini? Cari dan pilih jadwal di bawah ini.</p>
        </div>
    </div>

    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <form action="{{ route('dashboard') }}" method="GET" class="row g-3">
                <div class="col-md-10">
                    <input type="text" name="tujuan" class="form-control" 
                           placeholder="Cari stasiun tujuan (Contoh: Bandung)..." 
                           value="{{ request('tujuan') }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-search"></i> Cari
                    </button>
                </div>
            </form>
        </div>
    </div>

    <h4 class="mb-3">Jadwal Keberangkatan</h4>
    <div class="row">
        @forelse($jadwals as $jadwal)
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $jadwal->stasiun_asal }} → {{ $jadwal->stasiun_tujuan }}</h5>
                        <p class="card-text mb-1">
                            <strong>Kereta:</strong> {{ $jadwal->kereta->nama_kereta ?? 'N/A' }} <br>
                            <strong>Jam:</strong> {{ $jadwal->jam_berangkat }} <br>
                            <strong>Harga:</strong> <span class="text-primary fw-bold">Rp {{ number_format($jadwal->harga_tiket) }}</span>
                        </p>
                        <a href="{{ route('pemesanan.create', ['jadwal_id' => $jadwal->jadwal_id]) }}" class="btn btn-primary w-100 mt-2">Pesan Tiket</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center p-5">
                <p class="text-muted">Belum ada jadwal keberangkatan tersedia.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-4 text-center">
        <a href="{{ route('jadwal.index') }}" class="btn btn-outline-primary">Lihat Semua Jadwal</a>
        <a href="{{ route('pemesanan.riwayat') }}" class="btn btn-outline-secondary">Riwayat Pemesanan</a>
    </div>
</div>
@endsection