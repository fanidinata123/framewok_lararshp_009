<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Kode Tindakan Terapi</title>
     <style>
        body {font-family:'Segoe UI',Arial;background:#f2f6fc;margin:0;padding:0;}
        header{background:#007bff;color:#fff;text-align:center;padding:15px 0;font-size:22px;}
        h2{text-align:center;color:#333;margin-top:20px;}
        .nav-container{width:90%;margin:20px auto;display:flex;justify-content:space-between;align-items:center;}
        .btn{padding:10px 18px;border-radius:5px;text-decoration:none;font-weight:bold;color:#fff;transition:.2s;}
        .btn-add{background:#28a745;}.btn-add:hover{background:#218838;}
        .btn-back{background:#6c757d;}.btn-back:hover{background:#5a6268;}
        .alert{width:90%;margin:20px auto;padding:12px;border-radius:5px;background:#d4edda;color:#155724;border:1px solid #c3e6cb;}
        table{width:90%;margin:0 auto 40px;border-collapse:collapse;background:white;box-shadow:0 0 8px rgba(0,0,0,0.1);border-radius:6px;}
        th{background:#007bff;color:white;padding:10px;text-transform:uppercase;font-size:13px;}
        td{padding:10px;text-align:center;border-bottom:1px solid #ddd;font-size:14px;}
        tr:hover{background:#f1f9ff;}
        .btn-edit,.btn-delete{padding:6px 12px;border:none;border-radius:4px;color:white;font-size:14px;cursor:pointer;text-decoration:none;display:inline-block;}
        .btn-edit{background:#ffc107;}.btn-edit:hover{background:#e0a800;}
        .btn-delete{background:#dc3545;}.btn-delete:hover{background:#b02a37;}
        footer{text-align:center;color:#666;padding:10px;font-size:13px;}
    </style>
</head>
<body>
<header>Data Kode Tindakan Terapi</header>
<h2>Daftar Kode Tindakan</h2>

@if(session('success'))
<div class="alert">
    ✓ {{ session('success') }}
</div>
@endif

<div class="nav-container">
    <a href="{{ route('admin.dashboard') }}" class="btn btn-back">⬅ Kembali ke Dashboard</a>
    <a href="{{ route('admin.kode-tindakan.create') }}" class="btn btn-add">➕ Tambah Kode Tindakan</a>
</div>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Deskripsi</th>
            <th>Kategori</th>
            <th>Kategori Klinis</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($kodeTindakan as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><strong>{{ $item->kode }}</strong></td>
            <td style="text-align:left;">{{ $item->deskripsi_tindakan_terapi }}</td>
            <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
            <td>{{ $item->kategoriKlinis->nama_kategori_klinis ?? '-' }}</td>
            <td>
                <a href="{{ route('admin.kode-tindakan.edit', ['id' => $item->idkode_tindakan_terapi]) }}" class="btn-edit">✏ Edit</a>
                <form action="{{ route('admin.kode-tindakan.destroy') }}" method="POST" style="display:inline;">
                    @csrf
                    <input type="hidden" name="id" value="{{ $item->idkode_tindakan_terapi }}">
                    <button type="submit" class="btn-delete" onclick="return confirm('Yakin hapus data ini?')">🗑 Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6">Tidak ada data tindakan.</td></tr>
        @endforelse
    </tbody>
</table>

<footer>© 2025 Sistem Informasi Klinik Hewan</footer>
</body>
</html>