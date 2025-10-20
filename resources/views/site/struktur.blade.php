<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur | RSHP</title>
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
                    <li class="nav-item"><a class="nav-link" href="{{ route('kontak') }}">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('struktur') }}">Struktur</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5 text-center">
        <h1 class="text-primary fw-bold">Struktur Organisasi RSHP</h1>
        <ul class="list-group mx-auto mt-3" style="max-width: 400px;">
            <li class="list-group-item">Direktur Utama - Dr. Ira Sari Yudaniayanti ,M.P., drh.</li>
            <li class="list-group-item">Wakil Direktur 1 - Dr. Nusdianto Triakoso ,M.P., drh.</li>
            <li class="list-group-item">Wakil Direktur 2 - Dr. Miyayu Soneta S., M.Vet., drh.</li>
        </ul>
    </div>
</body>
</html>
