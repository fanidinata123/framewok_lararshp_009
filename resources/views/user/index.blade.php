<!DOCTYPE html>
<html>
<head>
    <title>Data User</title>
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
            width: 85%;
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
    <header>Data User</header>

    <h2>Daftar User</h2>
    <table>
        <thead>
            <tr>
                <th>ID User</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No. WA Pemilik</th>
                <th>Alamat Pemilik</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $u)
            <tr>
                <td>{{ $u->iduser }}</td>
                <td>{{ $u->nama }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->pemilik->no_wa ?? '-' }}</td>
                <td>{{ $u->pemilik->alamat ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <footer>© 2025 Sistem Informasi Klinik Hewan</footer>
</body>
</html>
