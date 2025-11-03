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
        .container {
            width: 100%;
            display: flex;
            justify-content: center;
            margin: 15px 0;
        }
        .btn-add {
            background-color: #28a745;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 15px;
            transition: background-color 0.2s;
        }
        .btn-add:hover {
            background-color: #218838;
        }
        table {
            width: 80%;
            margin: 0 auto 30px auto;
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

    <!-- Tombol tambah di tengah -->
    <div class="container">
        <a href="{{ route('admin.jenis-hewan.create') }}" class="btn-add">
            <span style="font-size: 18px;">➕</span> Tambah Jenis Hewan
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID JENIS</th>
                <th>NAMA JENIS HEWAN</th>
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
