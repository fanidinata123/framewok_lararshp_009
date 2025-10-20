<!DOCTYPE html>
<html>
<head>
    <title>Data Kategori Klinis</title>
    <style>
        body { font-family: Arial; background-color: #f2f6fc; margin: 0; padding: 0; }
        header { background-color: #007bff; color: white; text-align: center; padding: 15px 0; font-size: 22px; }
        table { width: 85%; margin: 20px auto; border-collapse: collapse; background: white; border-radius: 6px; box-shadow: 0 0 8px rgba(0,0,0,0.1); }
        th { background-color: #007bff; color: white; padding: 10px; }
        td { padding: 10px; text-align: center; border-bottom: 1px solid #ddd; }
        tr:hover { background-color: #f1f9ff; }
    </style>
</head>
<body>
<header>Data Kategori Klinis</header>
<h2>Daftar Kategori Klinis</h2>
<table>
    <thead><tr><th>No</th><th>Nama Kategori Klinis</th></tr></thead>
    <tbody>
        @foreach ($kategoriKlinis as $kk)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $kk->nama_kategori_klinis }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<footer>© 2025 Sistem Informasi Klinik Hewan</footer>
</body>
</html>
