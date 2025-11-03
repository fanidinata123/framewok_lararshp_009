<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>RSHP Dashboard Administrator</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            background-color: #eef3fb;
        }

        /* Sidebar */
        .sidebar {
            width: 240px;
            background-color: #0d6efd;
            color: white;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
            padding-top: 20px;
        }

        .sidebar h2 {
            text-align: center;
            font-size: 20px;
            margin-bottom: 20px;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #0056b3;
        }

        .sidebar .logout {
            background-color: #dc3545;
            text-align: center;
            margin: 20px;
            border-radius: 5px;
            padding: 10px;
            display: block;
        }

        /* Konten utama */
        .content {
            margin-left: 240px;
            padding: 30px;
            flex: 1;
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        header {
            background-color: #007bff;
            color: white;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
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
            color: #666;
            font-size: 13px;
            margin-top: 40px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="{{ route('admin.dashboard') }}">🏠 Dashboard</a>
        <a href="{{ route('admin.user.index') }}">👤 User</a>
        <a href="{{ route('admin.role.index') }}">⚙️ Role</a>
        <a href="{{ route('admin.role-user.index') }}">🔑 Role User</a>
        <a href="{{ route('admin.jenis-hewan.index') }}">🐾 Jenis Hewan</a>
        <a href="{{ route('admin.ras-hewan.index') }}">🐕 Ras Hewan</a>
        <a href="{{ route('admin.pemilik.index') }}">👨 Pemilik</a>
        <a href="{{ route('admin.pet.index') }}">🐈 Pet</a>
        <a href="{{ route('admin.kategori.index') }}">📂 Kategori</a>
        <a href="{{ route('admin.kategori-klinis.index') }}">🧪 Kategori Klinis</a>
        <a href="{{ route('admin.kode-tindakan.index') }}">💊 Kode Tindakan</a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout">🚪 Logout</button>
        </form>
    </div>

    <!-- Konten -->
    <div class="content">
        <header>
            <h2>Selamat Datang, {{ Auth::user()->nama ?? 'Administrator' }}</h2>
        </header>

        <p style="text-align:center;">Anda login sebagai <strong>Administrator</strong></p>

        <div class="grid">
            <a href="{{ route('admin.user.index') }}" class="card">User</a>
            <a href="{{ route('admin.role-user.index') }}" class="card">Role User</a>
            <a href="{{ route('admin.jenis-hewan.index') }}" class="card">Jenis Hewan</a>
            <a href="{{ route('admin.ras-hewan.index') }}" class="card">Ras Hewan</a>
            <a href="{{ route('admin.pemilik.index') }}" class="card">Pemilik</a>
            <a href="{{ route('admin.pet.index') }}" class="card">Pet</a>
            <a href="{{ route('admin.kategori.index') }}" class="card">Kategori</a>
            <a href="{{ route('admin.kategori-klinis.index') }}" class="card">Kategori Klinis</a>
            <a href="{{ route('admin.kode-tindakan.index') }}" class="card">Kode Tindakan Terapi</a>
        </div>

        <footer>© 2025 Sistem Informasi Klinik Hewan RSHP</footer>
    </div>

</body>
</html>
