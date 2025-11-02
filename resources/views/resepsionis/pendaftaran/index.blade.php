<!DOCTYPE html>
<html>
<head>
    <title>Daftar Antrian Temu Dokter</title>
    <style>
        body {font-family: Arial, sans-serif; background: #eef4ff; margin: 0;}
        header {background: #007bff; color: white; text-align: center; padding: 15px;}
        nav {background: #0056b3; padding: 10px; text-align: center;}
        nav a {color: white; text-decoration: none; margin: 0 15px; font-weight: bold;}
        table {width: 90%; margin: 30px auto; border-collapse: collapse; background: white;}
        th, td {border: 1px solid #ddd; padding: 10px; text-align: center;}
        th {background: #007bff; color: white;}
        tr:hover {background: #f1f9ff;}
        footer {text-align: center; color: #777; padding: 10px; margin-top: 30px;}
    </style>
</head>
<body>

<header>Daftar Antrian Temu Dokter</header>

<nav>
    <a href="{{ route('resepsionis.dashboard') }}">Dashboard</a>
    <a href="{{ route('resepsionis.pendaftaran') }}">Data Pendaftaran</a>
    <a href="{{ route('logout') }}" 
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
       Logout
    </a>
</nav>

<table>
    <thead>
        <tr>
            <th>No Urut</th>
            <th>Nama Pet</th>
            <th>Nama Dokter</th>
            <th>Waktu Daftar</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pendaftaran as $p)
        <tr>
            <td>{{ $p->no_urut }}</td>
            <td>{{ $p->pet->nama ?? '-' }}</td>
            <td>{{ $p->dokter->nama ?? '-' }}</td>
            <td>{{ $p->waktu_daftar }}</td>
            <td>{{ $p->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
    @csrf
</form>

<footer>© 2025 Sistem Informasi Klinik Hewan</footer>

</body>
</html>
