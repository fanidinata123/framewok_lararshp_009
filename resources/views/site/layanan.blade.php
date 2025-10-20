<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan | RSHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">RSHP</a>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('layanan') }}">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('kontak') }}">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('struktur') }}">Struktur</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center text-primary fw-bold">Layanan Kami</h1>
        <p class="text-center">Berikut beberapa layanan unggulan di RSHP:</p>
        <ul class="list-group mx-auto" style="max-width: 500px;">
            <li class="list-group-item">Poliklinik</li>
            <li class="list-group-item">Rawat Inap</li>
            <li class="list-group-item">Bedah</li>
            <li class="list-group-item">Pemeriksaan</li>
        </ul>
    </div>
</body>
</html>
