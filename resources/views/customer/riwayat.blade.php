@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Riwayat Pesanan</h2>
    
    <table class="table table-striped table-hover bg-white shadow-sm rounded">
        <thead class="table-dark">
            <tr>
                <th>Kereta</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Status</th>
                <th>Aksi</th> </tr>
        </thead>
        <tbody>
            @foreach($pesanans as $p)
            <tr>
                <td>{{ $p->jadwal->kereta->nama_kereta ?? 'N/A' }}</td>
                <td>{{ \Carbon\Carbon::parse($p->tanggal_pemesanan)->format('d-m-Y') }}</td>
                <td>{{ $p->jumlah_tiket }}</td>
                <td>Rp {{ number_format($p->total_harga) }}</td>
                <td>
                    <span class="badge {{ 
                        $p->status_pemesanan == 'paid' ? 'bg-success' : 
                        ($p->status_pemesanan == 'menunggu_verifikasi' ? 'bg-info' : 'bg-warning') 
                    }}">
                        {{ ucfirst($p->status_pemesanan) }}
                    </span>
                </td>
                <td>
                    @if($p->status_pemesanan == 'pending')
                        <a href="{{ route('pemesanan.pembayaran', $p->pemesanan_id) }}" class="btn btn-sm btn-primary">
                            Bayar Sekarang
                        </a>
                    @else
                        <span class="text-muted small">Tidak ada aksi</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection