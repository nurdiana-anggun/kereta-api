@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Kelola Pesanan</h3>
    </div>
    
    <table class="table table-bordered bg-white shadow-sm">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Kereta</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pesanans as $p)
            <tr>
                <td>#{{ $p->pemesanan_id }}</td>
                <td>{{ $p->user->name ?? 'User Dihapus' }}</td>
                <td>{{ $p->jadwal->kereta->nama_kereta ?? 'N/A' }}</td>
                <td class="fw-bold text-primary">Rp {{ number_format($p->total_harga, 0, ',', '.') }}</td>
                <td>
                    {{-- Badge Status --}}
                    <span class="badge {{ $p->status_pemesanan == 'paid' ? 'bg-success' : 'bg-warning text-dark' }}">
                        {{ ucfirst($p->status_pemesanan) }}
                    </span>
                </td>
                <td>
                    {{-- Logika Tombol Aksi: Hanya muncul jika statusnya 'pending' --}}
                    @if($p->status_pemesanan == 'pending')
                        <form action="{{ route('admin.konfirmasi', $p->pemesanan_id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">
                                <i class="bi bi-check-circle"></i> Konfirmasi Bayar
                            </button>
                        </form>
                    @else
                        <span class="text-muted italic small">Selesai</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection