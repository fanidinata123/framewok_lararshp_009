<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data User</title>
    <style>
        body{font-family:'Segoe UI',Arial;background:#f2f6fc;margin:0;padding:0;}
        header{background:#007bff;color:#fff;text-align:center;padding:15px 0;font-size:22px;}
        h2{text-align:center;color:#333;margin-top:20px;}
        .nav-container{width:85%;margin:20px auto;display:flex;justify-content:space-between;align-items:center;}
        .btn{padding:10px 18px;border-radius:5px;text-decoration:none;font-weight:bold;color:#fff;transition:.2s;}
        .btn-add{background:#28a745;}.btn-add:hover{background:#218838;}
        .btn-back{background:#6c757d;}.btn-back:hover{background:#5a6268;}
        .alert{width:85%;margin:20px auto;padding:12px;border-radius:5px;background:#d4edda;color:#155724;border:1px solid #c3e6cb;}
        table{width:85%;margin:0 auto 40px;border-collapse:collapse;background:white;box-shadow:0 0 8px rgba(0,0,0,0.1);border-radius:6px;}
        th{background:#007bff;color:white;padding:10px;text-transform:uppercase;}
        td{padding:10px;text-align:center;border-bottom:1px solid #ddd;}
        tr:hover{background:#f1f9ff;}
        .btn-edit,.btn-delete{padding:6px 12px;border:none;border-radius:4px;color:white;font-size:14px;cursor:pointer;text-decoration:none;display:inline-block;}
        .btn-edit{background:#ffc107;}.btn-edit:hover{background:#e0a800;}
        .btn-delete{background:#dc3545;}.btn-delete:hover{background:#b02a37;}
        footer{text-align:center;color:#666;padding:10px;font-size:13px;}
    </style>
</head>
<body>
<header>Data User</header>
<h2>Daftar User</h2>

@if(session('success'))
<div class="alert">✓ {{ session('success') }}</div>
@endif

<div class="nav-container">
    <a href="{{ route('admin.dashboard') }}" class="btn btn-back">⬅ Kembali ke Dashboard</a>
    <a href="{{ route('admin.user.create') }}" class="btn btn-add">➕ Tambah User</a>
</div>

<table>
    <thead>
        <tr><th>No</th><th>Nama</th><th>Email</th><th>Aksi</th></tr>
    </thead>
    <tbody>
        @forelse($user as $u)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $u->nama }}</td>
            <td>{{ $u->email }}</td>
            <td>
                <a href="{{ route('admin.user.edit', ['id' => $u->iduser]) }}" class="btn-edit">✏ Edit</a>
                <form action="{{ route('admin.user.destroy') }}" method="POST" style="display:inline;">
                    @csrf
                    <input type="hidden" name="id" value="{{ $u->iduser }}">
                    <button type="submit" class="btn-delete" onclick="return confirm('Yakin hapus {{ $u->nama }}?')">🗑 Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="4">Tidak ada data user.</td></tr>
        @endforelse
    </tbody>
</table>

<footer>© 2025 Sistem Informasi Klinik Hewan</footer>
</body>
</html>