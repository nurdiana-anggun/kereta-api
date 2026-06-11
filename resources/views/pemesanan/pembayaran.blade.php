@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="card p-4 shadow-sm border-0">
        <h3 class="text-primary mb-3">Instruksi Pembayaran</h3>
        <p>Silakan transfer ke rekening berikut:</p>
        <div class="alert alert-info">
            <strong>Bank BCA</strong><br>
            <strong>1234567890</strong><br>
            a.n PT KAI TIKET INDONESIA
        </div>
        
        <p>Total tagihan yang harus dibayar:</p>
        <div class="alert alert-warning text-center">
            <h2 class="display-6 fw-bold">Rp {{ number_format($pesanan->total_harga) }}</h2>
        </div>
        
        <small class="text-danger">
            <i>*Penting: Transfer harus <strong>tepat sampai 3 digit terakhir</strong> agar sistem kami otomatis mengenali pembayaran Anda.</i>
        </small>

        <form action="{{ route('pemesanan.konfirmasi', $pesanan->pemesanan_id) }}" method="POST" class="mt-4">
            @csrf
            <button type="submit" class="btn btn-success btn-lg w-100">Saya Sudah Transfer</button>
        </form>
    </div>
</div>
@endsection