@extends('layouts.app')

@section('content')
<div class="card shadow-sm col-md-8 mx-auto">
    <div class="card-header bg-primary text-white">Konfirmasi Pembayaran</div>
    <div class="card-body">
        <h4>Total yang harus dibayar: <b>Rp {{ number_format($pesanan->total_harga) }}</b></h4>
        <hr>
        <p>Silahkan lakukan transfer ke rekening berikut:</p>
        <div class="alert alert-info">
            <strong>Bank BCA: 1234567890</strong><br>
            <strong>Atas Nama: PT Kereta Api Indonesia</strong>
        </div>
        
        <form action="{{ route('pemesanan.konfirmasi_pembayaran', $pesanan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-success w-100">Saya Sudah Transfer</button>
        </form>
    </div>
</div>
@endsection