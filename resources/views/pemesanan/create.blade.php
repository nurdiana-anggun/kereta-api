@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm p-4">
                <h3 class="mb-4">Form Pemesanan</h3>

                <div class="alert alert-primary">
                    <h5 class="mb-1">{{ $jadwal->stasiun_asal }} → {{ $jadwal->stasiun_tujuan }}</h5>
                    <p class="mb-0">
                        <strong>Kereta:</strong> {{ $jadwal->kereta->nama_kereta ?? 'N/A' }}<br>
                        <strong>Jadwal:</strong> {{ $jadwal->jam_berangkat }}<br>
                        <strong>Harga per Tiket:</strong> Rp {{ number_format($jadwal->harga_tiket) }}
                    </p>
                </div>

                <form action="{{ route('pemesanan.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="jadwal_id" value="{{ $jadwal->jadwal_id }}">
                    
                    <div class="mb-3">
                        <label class="form-label">Jumlah Tiket</label>
                        <input type="number" name="jumlah_tiket" class="form-control" 
                               min="1" max="{{ $jadwal->kuota_tersedia }}" 
                               placeholder="Maksimal tersedia: {{ $jadwal->kuota_tersedia }}" 
                               required>
                    </div>

                    <div class="mb-3 p-3 bg-light rounded">
                        <strong>Total Bayar:</strong> Rp <span id="total-harga">0</span>
                    </div>

                    <button type="submit" class="btn btn-success w-100">
                        <i class="bi bi-wallet2"></i> Bayar Sekarang
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const hargaPerTiket = {{ $jadwal->harga_tiket }};
    const inputJumlah = document.querySelector('input[name="jumlah_tiket"]');
    const displayTotal = document.getElementById('total-harga');

    inputJumlah.addEventListener('input', function() {
        const total = this.value * hargaPerTiket;
        displayTotal.innerText = total.toLocaleString('id-ID');
    });
</script>
@endsection