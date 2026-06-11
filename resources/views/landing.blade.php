<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GonTicket | Pesan Tiket Kereta Mudah & Cepat</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .hero-container {
            position: relative;
            width: 100%;
            aspect-ratio: 21 / 9;
            overflow: hidden;
        }
        .hero-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(50%);
        }
        .hero-caption {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
            width: 90%;
        }

        /* Responsive Breakpoint */
        @media (max-width: 768px) {
            .hero-container { aspect-ratio: 16 / 9; }
            .hero-caption h1 { font-size: 1.75rem !important; }
            .hero-caption p { font-size: 0.9rem !important; }
            .hero-caption .btn { font-size: 0.9rem; padding: 0.5rem 1rem !important; }
            .promo-row { margin-bottom: 2rem !important; }
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">GonTicket</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="ms-auto d-flex">
                    <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
                </div>
            </div>
        </div>
    </nav>

    <header class="hero-container">
        <img src="https://images.pexels.com/photos/20547197/pexels-photo-20547197.jpeg" class="hero-img" alt="Kereta Api">
        <div class="hero-caption">
            <h1 class="display-3 fw-bold">Perjalanan Nyaman Dimulai Di Sini</h1>
            <p class="lead mb-4">Pesan tiket kereta api secara online dengan proses yang cepat dan aman.</p>
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-5">Pesan Tiket Sekarang</a>
        </div>
    </header>

    <section class="py-5 bg-light">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <i class="bi bi-lightning-charge display-4 text-primary"></i>
                    <h3 class="mt-3">Cepat</h3>
                    <p>Booking tiket hanya butuh waktu kurang dari 2 menit.</p>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <i class="bi bi-shield-check display-4 text-primary"></i>
                    <h3 class="mt-3">Aman</h3>
                    <p>Sistem pembayaran terpercaya dan data Anda terlindungi.</p>
                </div>
                <div class="col-md-4">
                    <i class="bi bi-headset display-4 text-primary"></i>
                    <h3 class="mt-3">24/7 Support</h3>
                    <p>Tim kami siap membantu Anda kapanpun dibutuhkan.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Promo Spesial Bulan Ini</h2>

            <div class="row align-items-center mb-5 promo-row">
                <div class="col-md-6 mb-3 mb-md-0">
                    <img src="https://images.pexels.com/photos/3973968/pexels-photo-3973968.jpeg" class="img-fluid rounded shadow" alt="Promo 1">
                </div>
                <div class="col-md-6">
                    <h3 class="fw-bold text-primary">Diskon Pelajar 20%</h3>
                    <p class="lead">Tunjukkan kartu pelajar Anda dan dapatkan potongan harga khusus untuk semua rute kereta api di seluruh Indonesia!</p>
                    <a href="#" class="btn btn-outline-primary">Lihat Syarat</a>
                </div>
            </div>

            <div class="row align-items-center promo-row">
                <div class="col-md-6 order-md-2 mb-3 mb-md-0">
                    <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=800" class="img-fluid rounded shadow" alt="Promo 2">
                </div>
                <div class="col-md-6 order-md-1">
                    <h3 class="fw-bold text-primary">Liburan Akhir Pekan</h3>
                    <p class="lead">Dapatkan cashback hingga Rp50.000 untuk pemesanan tiket pada hari Sabtu dan Minggu. Hemat lebih banyak untuk liburan Anda!</p>
                    <a href="#" class="btn btn-outline-primary">Pesan Sekarang</a>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-white text-center py-4 mt-auto border-top shadow-sm">
        <div class="container">
            <p class="mb-1 text-muted">&copy; 2026 GonTicket Indonesia. Semua hak dilindungi.</p>
            <small class="text-secondary">Pesan tiket kereta api dengan mudah, aman, dan nyaman.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>