<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Admin | GonTicket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow p-4 border-danger">
                <h3 class="text-center mb-4 text-danger">Daftar Akun Admin</h3>
                
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form action="{{ route('register.admin') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" placeholder="Nama Admin" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="admin@gonticket.com" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Minimal 6 karakter" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-danger">Admin Secret Key</label>
                        <input type="password" name="admin_key" class="form-control border-danger" placeholder="Masukkan kunci rahasia" required>
                    </div>

                    <button type="submit" class="btn btn-danger w-100 mt-2">Daftar Sebagai Admin</button>
                </form>

                <div class="text-center mt-3">
                    <small><a href="{{ route('login') }}" class="text-secondary">Kembali ke Login</a></small>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>