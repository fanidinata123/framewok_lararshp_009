<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | RSHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Hero section */
        .hero {
            background: linear-gradient(to bottom, #007bff, #0056b3);
            color: white;
            text-align: center;
            padding: 100px 20px;
        }

        .btn-orange {
            background-color: #ff4d4d;
            color: white;
            border: none;
        }

        .btn-orange:hover {
            background-color: #ff3333;
        }

        /* Layanan section */
        .layanan {
            background-color: #f8f9fa;
            padding: 60px 0;
        }

        .layanan h2 {
            font-weight: 700;
            margin-bottom: 40px;
            color: #0d6efd;
        }

        .card-layanan {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .card-layanan:hover {
            transform: translateY(-5px);
        }

        .icon {
            font-size: 48px;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">RSHP</a>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('layanan') }}">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('kontak') }}">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('struktur') }}">Struktur</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="hero">
        <div class="container">
            <h1 class="fw-bold display-5">Selamat Datang di RSHP</h1>
            <p class="lead mt-3">
                Rumah Sakit Hewan Pendidikan – Memberikan pelayanan kesehatan terbaik dengan teknologi modern 
                dan tenaga medis profesional untuk kesembuhan dan kenyamanan Anda.
            </p>
            <a href="{{ route('layanan') }}" class="btn btn-orange mt-3">Lihat Layanan Kami</a>
        </div>
    </section>

    <!-- Layanan Section -->
    <section class="layanan text-center">
        <div class="container">
            <h2 class="mb-5">Layanan Kami</h2>
            <div class="row justify-content-center">
                <div class="col-md-4 mb-4">
                    <div class="card card-layanan p-4">
                        <div class="icon">🏥</div>
                        <h5 class="mt-3 fw-bold">Rawat Inap</h5>
                        <p class="text-muted">Perawatan intensif untuk hewan kesayangan Anda dengan pengawasan 24 jam.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card card-layanan p-4">
                        <div class="icon">🚑</div>
                        <h5 class="mt-3 fw-bold">Unit Gawat Darurat</h5>
                        <p class="text-muted">Penanganan cepat dan tepat untuk kondisi darurat hewan Anda.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card card-layanan p-4">
                        <div class="icon">👩‍⚕️</div>
                        <h5 class="mt-3 fw-bold">Rawat Jalan</h5>
                        <p class="text-muted">Pemeriksaan umum dan perawatan rutin oleh dokter profesional.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
