<!DOCTYPE html>
<html>
<head>
    <title>Data Pet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f6fc;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 15px 0;
            font-size: 22px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        }
        th {
            background-color: #007bff;
            color: white;
            padding: 10px;
        }
        td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        tr:hover {
            background-color: #f1f9ff;
        }
        footer {
            text-align: center;
            color: #666;
            padding: 10px;
            margin-top: 40px;
        }
    </style>
</head>
<body>
<header>Data Pet</header>

<h2>Daftar Pet</h2>
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
        @foreach ($pet as $p)
        <tr>
            <td>{{ $loop->iteration }}</td>
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

<footer>© 2025 Sistem Informasi Klinik Hewan</footer>
</body>
</html>
