@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Dashboard Admin</h3>
        <span class="text-muted">Halo, {{ Auth::user()->name }}</span>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card bg-primary text-white p-3 shadow-sm">
                <h5>Total Pesanan</h5>
                <h2>{{ \App\Models\Pemesanan::count() }}</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-warning text-dark p-3 shadow-sm">
                <h5>Perlu Verifikasi</h5>
                <h2>{{ \App\Models\Pemesanan::where('status_pemesanan', 'menunggu_verifikasi')->count() }}</h2>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('admin.pesanan') }}" class="btn btn-success btn-lg w-100">
            Kelola Pesanan Masuk
        </a>
    </div>
</div>
@endsection