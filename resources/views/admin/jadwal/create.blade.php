@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card p-4">
        <h3>Tambah Jadwal Baru</h3>
        
        <form action="{{ route('admin.jadwal.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Pilih Kereta</label>
        <select name="kereta_id" class="form-control" required>
            <option value="">Pilih Kereta</option>
            @foreach(\App\Models\Kereta::all() as $kereta)
                <option value="{{ $kereta->kereta_id }}">
                    {{ $kereta->nama_kereta }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Tanggal Berangkat</label>
        <input
            type="date"
            name="tanggal_berangkat"
            class="form-control"
            required>
    </div>

    <div class="mb-3">
        <label>Stasiun Asal</label>
        <input
            type="text"
            name="stasiun_asal"
            class="form-control"
            placeholder=""
            required>
    </div>

    <div class="mb-3">
        <label>Stasiun Tujuan</label>
        <input
            type="text"
            name="stasiun_tujuan"
            class="form-control"
            placeholder=""
            required>
    </div>

    <div class="mb-3">
        <label>Jam Berangkat</label>
        <input
            type="time"
            name="jam_berangkat"
            class="form-control"
            required>
    </div>

    <div class="mb-3">
        <label>Jam Tiba</label>
        <input
            type="time"
            name="jam_tiba"
            class="form-control"
            required>
    </div>

    <div class="mb-3">
        <label>Harga Tiket</label>
        <input
            type="number"
            name="harga_tiket"
            class="form-control"
            placeholder=""
            required>
    </div>

    <div class="mb-3">
        <label>Kuota Tersedia</label>
        <input
            type="number"
            name="kuota_tersedia"
            class="form-control"
            placeholder=""
            required>
    </div>

    <button type="submit" class="btn btn-primary">
        Simpan Sekarang
    </button>
</form>
    </div>
</div>
@endsection