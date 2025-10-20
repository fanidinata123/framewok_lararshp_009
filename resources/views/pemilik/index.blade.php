<!DOCTYPE html>
<html>
<head>
    <title>Data Pemilik</title>
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
    <header>Data Pemilik</header>

    <h2>Daftar Pemilik</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pemilik</th>
                <th>No. WA</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($pemilik as $p)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $p->user->nama ?? 'Tidak Ada User' }}</td>
                <td>{{ $p->no_wa }}</td>
                <td>{{ $p->alamat }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <footer>© 2025 Sistem Informasi Klinik Hewan</footer>
</body>
</html>
