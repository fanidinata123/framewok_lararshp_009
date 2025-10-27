<!DOCTYPE html>
<html>
<head>
    <title>Data Ras Hewan</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f2f6fc; margin: 0; padding: 0; }
        header { background-color: #007bff; color: white; text-align: center; padding: 15px 0; font-size: 22px; }
        h2 { text-align: center; color: #333; margin-top: 20px; }
        table { width: 85%; margin: 20px auto; border-collapse: collapse; background: white; border-radius: 6px; overflow: hidden; box-shadow: 0 0 8px rgba(0,0,0,0.1); }
        th { background-color: #007bff; color: white; padding: 10px; }
        td { padding: 10px; text-align: center; border-bottom: 1px solid #ddd; }
        tr:hover { background-color: #f1f9ff; }
        footer { text-align: center; color: #666; padding: 10px; margin-top: 40px; }
    </style>
</head>
<body>
<header>Data Ras Hewan</header>
<h2>Daftar Ras Hewan</h2>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Ras</th>
            <th>Jenis Hewan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ras as $r)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $r->nama_ras }}</td>
            <td>{{ $r->jenisHewan->nama_jenis_hewan ?? '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<footer>© 2025 Sistem Informasi Klinik Hewan</footer>
</body>
</html>
