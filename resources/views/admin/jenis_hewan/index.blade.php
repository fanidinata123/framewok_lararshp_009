<!DOCTYPE html>
<html>
<head>
    <title>Data Jenis Hewan</title>
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
            letter-spacing: 1px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
            border-radius: 6px;
            overflow: hidden;
        }
        th {
            background-color: #007bff;
            color: white;
            padding: 10px;
            text-transform: uppercase;
        }
        td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        tr:hover {
            background-color: #f1f9ff;
            transition: 0.2s;
        }
        footer {
            text-align: center;
            color: #666;
            padding: 10px;
            font-size: 13px;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <header>Data Jenis Hewan</header>

    <h2>Daftar Jenis Hewan</h2>
    <table>
        <thead>
            <tr>
                <th>ID Jenis</th>
                <th>Nama Jenis Hewan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jenisHewan as $jh)
            <tr>
                <td>{{ $jh->idjenis_hewan }}</td>
                <td>{{ $jh->nama_jenis_hewan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <footer>© 2025 Sistem Informasi Klinik Hewan</footer>
</body>
</html>
