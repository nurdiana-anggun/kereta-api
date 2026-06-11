@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h3>Kelola Pesanan</h3>
    <table class="table table-bordered bg-white">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Kereta</th>
                <th>Total (Wajib Sama!)</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pesanans as $p)
            <tr>
                <td>#{{ $p->pemesanan_id }}</td>
                <td>{{ $p->user->name }}</td>
                <td>{{ $p->jadwal->kereta->nama_kereta ?? 'N/A' }}</td>
                <td class="fw-bold text-primary">Rp {{ number_format($p->total_harga) }}</td>
                <td>
                    <span class="badge {{ $p->status_pemesanan == 'paid' ? 'bg-success' : 'bg-warning' }}">
                        {{ ucfirst($p->status_pemesanan) }}
                    </span>
                </td>
                <td>
                    @if($p->status_pemesanan == 'menunggu_verifikasi')
                        <form action="{{ route('admin.konfirmasi', $p->pemesanan_id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">Konfirmasi Bayar</button>
                        </form>
                    @else
                        -
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection