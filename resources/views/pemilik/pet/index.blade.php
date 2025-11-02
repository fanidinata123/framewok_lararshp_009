<!DOCTYPE html>
<html>
<head>
    <title>Data Pet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef4ff;
            margin: 0;
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 22px;
        }
        nav {
            background: #0056b3;
            padding: 10px;
            text-align: center;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 20px;
            font-weight: bold;
        }
        table {
            width: 85%;
            margin: 30px auto;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        th {
            background-color: #007bff;
            color: white;
            padding: 10px;
        }
        td {
            padding: 8px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        tr:hover {
            background-color: #f1f9ff;
        }
        footer {
            text-align: center;
            color: #777;
            padding: 10px;
            margin-top: 40px;
        }
    </style>
</head>
<body>
<header>Data Pet</header>

<nav>
    <a href="{{ route('pemilik.dashboard') }}">Dashboard</a>
    <a href="{{ route('logout') }}" 
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
       Logout
    </a>
</nav>

<h2 style="text-align:center;">Daftar Pet</h2>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pet</th>
            <th>Tanggal Lahir</th>
            <th>Warna/Tanda</th>
            <th>Jenis Kelamin</th>
            <th>Ras Hewan</th>
            <th>Pemilik</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pets as $index => $p)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->tanggal_lahir }}</td>
            <td>{{ $p->warna_tanda }}</td>
            <td>
                @if($p->jenis_kelamin == 'L') Jantan
                @elseif($p->jenis_kelamin == 'P') Betina
                @else -
                @endif
            </td>
            <td>{{ $p->rasHewan->nama_ras ?? '-' }}</td>
            <td>{{ $p->pemilik->user->nama ?? '-' }}</td>
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
