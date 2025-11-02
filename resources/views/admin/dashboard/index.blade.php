<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>RSHP Dashboard Administrator</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: #eef3fb;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 25px 0;
            font-size: 26px;
            font-weight: bold;
            letter-spacing: 1px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        nav {
            background-color: #0d6efd;
            padding: 12px 0;
            text-align: center;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            padding: 10px 18px;
            transition: 0.2s;
            border-radius: 6px;
            margin: 0 3px;
        }

        nav a:hover {
            background-color: #0056b3;
        }

        nav .logout {
            background-color: #dc3545;
            color: white;
        }

        nav .logout:hover {
            background-color: #b02a37;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 30px auto;
            background: white;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #007bff;
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            text-align: center;
            font-size: 16px;
            color: #333;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
            margin-top: 25px;
        }

        .card {
            background-color: #007bff;
            color: white;
            padding: 25px 15px;
            text-align: center;
            border-radius: 10px;
            transition: all 0.3s;
            font-weight: bold;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }

        .card:hover {
            background-color: #0056b3;
            transform: translateY(-5px);
        }

        footer {
            text-align: center;
            padding: 20px;
            color: #666;
            font-size: 14px;
            margin-top: 40px;
        }
    </style>
</head>
<body>

    <header>RSHP Dashboard Administrator</header>

    <nav>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('user') }}">User</a>
        <a href="{{ route('role') }}">Role</a>
        <a href="{{ route('role-user') }}">Role User</a>
        <a href="{{ route('jenis-hewan') }}">Jenis Hewan</a>
        <a href="{{ route('ras-hewan') }}">Ras Hewan</a>
        <a href="{{ route('pemilik') }}">Pemilik</a>
        <a href="{{ route('pet') }}">Pet</a>
        <a href="{{ route('kategori') }}">Kategori</a>
        <a href="{{ route('kategori-klinis') }}">Kategori Klinis</a>
        <a href="{{ route('kode-tindakan') }}">Kode Tindakan Terapi</a>

        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit" class="logout" style="
                border:none;
                cursor:pointer;
                font-weight:bold;
                padding:8px 15px;
                border-radius:6px;
            ">Logout</button>
        </form>
    </nav>

    <div class="container">
        <h2>Selamat Datang, {{ Auth::user()->nama ?? 'Admin' }}</h2>
        <p>Anda login sebagai <strong>Administrator</strong></p>

        <div class="grid">
            <a href="{{ route('user') }}" class="card">User</a>
            <a href="{{ route('role-user') }}" class="card">Role User</a>
            <a href="{{ route('jenis-hewan') }}" class="card">Jenis Hewan</a>
            <a href="{{ route('ras-hewan') }}" class="card">Ras Hewan</a>
            <a href="{{ route('pemilik') }}" class="card">Pemilik</a>
            <a href="{{ route('pet') }}" class="card">Pet</a>
            <a href="{{ route('kategori') }}" class="card">Kategori</a>
            <a href="{{ route('kategori-klinis') }}" class="card">Kategori Klinis</a>
            <a href="{{ route('kode-tindakan') }}" class="card">Kode Tindakan Terapi</a>
        </div>
    </div>

    <footer>© 2025 Sistem Informasi Klinik Hewan RSHP</footer>
</body>
</html>
