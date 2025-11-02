<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Dokter RSHP</title>
<style>
    body {
        font-family: 'Segoe UI', Arial, sans-serif;
        background-color: #eef6ff;
        margin: 0;
        padding: 0;
    }
    header {
        background-color: #0d6efd;
        color: white;
        text-align: center;
        padding: 20px 0;
        font-size: 24px;
        font-weight: bold;
        letter-spacing: 1px;
    }
    nav {
        background-color: #084298;
        padding: 10px;
        text-align: center;
    }
    nav a {
        color: white;
        text-decoration: none;
        margin: 0 15px;
        font-weight: 500;
        transition: color 0.2s;
    }
    nav a:hover {
        color: #ffc107;
    }
    main {
        text-align: center;
        padding: 40px;
    }
    .card {
        display: inline-block;
        background-color: white;
        padding: 20px 40px;
        border-radius: 8px;
        box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        margin-top: 20px;
    }
    button.logout {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
    }
    button.logout:hover {
        background-color: #bb2d3b;
    }
</style>
</head>
<body>

<header>RSHP Dashboard Dokter</header>

<nav>
    <a href="{{ route('dokter.dashboard') }}">Dashboard</a>
    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="logout">Logout</button>
    </form>
</nav>

<main>
    <div class="card">
        <h2>Selamat Datang, Dokter!</h2>
        <p>Anda berhasil login sebagai <strong>Dokter</strong>.</p>
        <p>Sistem RSHP siap digunakan untuk melihat data pasien dan rekam medis.</p>
    </div>
</main>

</body>
</html>
