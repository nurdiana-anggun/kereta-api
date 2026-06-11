@extends('layouts.app')

@section('content')

<div class="container">

```
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">🚆 Jadwal Kereta</h2>
        <p class="text-muted mb-0">Pilih perjalanan yang tersedia</p>
    </div>

    @if(Auth::user() && Auth::user()->role === 'admin')
        <a href="{{ route('admin.jadwal.create') }}" class="btn btn-dark">
            + Tambah Jadwal
        </a>
    @endif
</div>

<div class="row g-4">

    @forelse($jadwals as $jadwal)
        <div class="col-md-6 col-lg-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold mb-0">
                            {{ $jadwal->kereta->nama_kereta ?? 'Kereta Tidak Ditemukan' }}
                        </h5>

                        <span class="badge bg-primary">
                            Rp {{ number_format($jadwal->harga_tiket,0,',','.') }}
                        </span>
                    </div>

                    <hr>

                    <div class="mb-2">
                        <small class="text-muted">Rute</small>
                        <h6 class="mb-0">
                            {{ $jadwal->stasiun_asal }}
                            →
                            {{ $jadwal->stasiun_tujuan }}
                        </h6>
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <small class="text-muted">Berangkat</small>
                            <div class="fw-semibold">
                                {{ $jadwal->jam_berangkat }}
                            </div>
                        </div>

                        <div class="col-6">
                            <small class="text-muted">Tiba</small>
                            <div class="fw-semibold">
                                {{ $jadwal->jam_tiba }}
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <small class="text-muted">Tanggal</small>
                        <div class="fw-semibold">
                            {{ \Carbon\Carbon::parse($jadwal->tanggal_berangkat)->format('d M Y') }}
                        </div>
                    </div>

                    <div class="mt-3">
                        <small class="text-muted">Kuota Tersedia</small>
                        <div class="fw-semibold text-success">
                            {{ $jadwal->kuota_tersedia }} Kursi
                        </div>
                    </div>

                </div>

                <div class="card-footer bg-white border-0">

                    @if(Auth::user() && Auth::user()->role === 'admin')

                        <div class="d-grid gap-2">

                            <a href="{{ route('admin.jadwal.edit', $jadwal->jadwal_id) }}"
                               class="btn btn-warning">
                                ✏️ Edit Jadwal
                            </a>

                            <form action="{{ route('admin.jadwal.destroy', $jadwal->jadwal_id) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger w-100"
                                        onclick="return confirm('Yakin ingin menghapus jadwal ini?')">
                                    🗑 Hapus
                                </button>
                            </form>

                        </div>

                    @else

                        <a href="{{ route('pemesanan.create', $jadwal->jadwal_id) }}"
                           class="btn btn-primary w-100">
                            🎫 Pesan Tiket
                        </a>

                    @endif

                </div>

            </div>

        </div>
    @empty

        <div class="col-12">
            <div class="alert alert-info text-center">
                Belum ada jadwal kereta tersedia.
            </div>
        </div>

    @endforelse

</div>
```

</div>
@endsection
