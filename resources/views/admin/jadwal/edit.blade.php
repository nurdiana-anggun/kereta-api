@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card p-4">
        <h3>Edit Jadwal</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.jadwal.update', $jadwal->jadwal_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Kereta</label>
                <select name="kereta_id" class="form-control" required>
                    @foreach(\App\Models\Kereta::all() as $kereta)
                        <option value="{{ $kereta->kereta_id }}"
                            {{ $jadwal->kereta_id == $kereta->kereta_id ? 'selected' : '' }}>
                            {{ $kereta->nama_kereta }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Stasiun Asal</label>
                <input
                    type="text"
                    name="stasiun_asal"
                    class="form-control"
                    value="{{ $jadwal->stasiun_asal }}"
                    placeholder="Contoh: Surabaya Gubeng"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Stasiun Tujuan</label>
                <input
                    type="text"
                    name="stasiun_tujuan"
                    class="form-control"
                    value="{{ $jadwal->stasiun_tujuan }}"
                    placeholder="Contoh: Bandung"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Berangkat</label>
                <input
                    type="date"
                    name="tanggal_berangkat"
                    class="form-control"
                    value="{{ $jadwal->tanggal_berangkat }}"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Jam Berangkat</label>
                <input
                    type="time"
                    name="jam_berangkat"
                    class="form-control"
                    value="{{ $jadwal->jam_berangkat }}"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Jam Tiba</label>
                <input
                    type="time"
                    name="jam_tiba"
                    class="form-control"
                    value="{{ $jadwal->jam_tiba }}"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Harga Tiket</label>
                <input
                    type="number"
                    name="harga_tiket"
                    class="form-control"
                    value="{{ $jadwal->harga_tiket }}"
                    placeholder="Contoh: 250000"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Kuota Tersedia</label>
                <input
                    type="number"
                    name="kuota_tersedia"
                    class="form-control"
                    value="{{ $jadwal->kuota_tersedia }}"
                    placeholder="Contoh: 100"
                    required>
            </div>

            <button type="submit" class="btn btn-warning">
                Simpan Perubahan
            </button>
        </form>
    </div>
</div>
@endsection