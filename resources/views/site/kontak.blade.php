<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak | RSHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">RSHP</a>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('layanan') }}">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('kontak') }}">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('struktur') }}">Struktur</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center text-primary fw-bold">Hubungi Kami</h1>
        <p class="text-center">Silakan hubungi kami melalui kontak berikut:</p>
        <div class="text-center">
            <p>Email: <a href="mailto:rshp@fkh.unair.ac.id.">rshp@fkh.unair.ac.id.</a></p>
            <p>Telepon: (031) 5927832.</p>
            <p>Alamat: Kampus C Universitas Airlangga, Surabaya 60115, Jawa Timur.</p>
        </div>
    </div>
</body>
</html>
