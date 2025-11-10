<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data User</title>
    <style>
        body { font-family: 'Segoe UI', Arial; background:#f2f6fc; margin:0; padding:0; }
        header { background:#007bff; color:white; text-align:center; padding:15px 0; font-size:22px; }
        h2 { text-align:center; color:#333; margin-top:20px; }
        .nav-container { width:85%; margin:20px auto; display:flex; justify-content:space-between; align-items:center; }
        .btn-add, .btn-back { padding:10px 18px; border-radius:5px; text-decoration:none; font-weight:bold; color:white; transition:.2s; }
        .btn-add{background:#28a745;} .btn-add:hover{background:#218838;}
        .btn-back{background:#6c757d;} .btn-back:hover{background:#5a6268;}
        table{width:85%; margin:0 auto 40px; border-collapse:collapse; background:white; box-shadow:0 0 8px rgba(0,0,0,0.1); border-radius:6px;}
        th{background:#007bff; color:white; padding:10px; text-transform:uppercase;}
        td{padding:10px; text-align:center; border-bottom:1px solid #ddd;}
        tr:hover{background:#f1f9ff;}
        .btn-edit,.btn-delete{padding:5px 10px;border:none;border-radius:4px;color:white;font-size:14px;cursor:pointer;}
        .btn-edit{background:#ffc107;} .btn-edit:hover{background:#e0a800;}
        .btn-delete{background:#dc3545;} .btn-delete:hover{background:#b02a37;}
        footer{text-align:center;color:#666;padding:10px;font-size:13px;}
    </style>
</head>
<body>
    <header>Data User</header>
    <h2>Daftar User</h2>

    <div class="nav-container">
        <a href="{{ route('admin.dashboard') }}" class="btn-back">⬅ Kembali ke Dashboard</a>
        <a href="{{ route('admin.user.create') }}" class="btn-add">➕ Tambah User</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th><th>Nama</th><th>Email</th><th>No. WA</th><th>Alamat</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
       @forelse ($user as $u)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $u->nama }}</td>
        <td>{{ $u->email }}</td>
        <td>{{ $u->pemilik->no_wa ?? '-' }}</td>
        <td>{{ $u->pemilik->alamat ?? '-' }}</td>
        <td>
            <a href="{{ route('admin.user.edit',$u->iduser) }}" class="btn-edit">✏ Edit</a>
            <form action="{{ route('admin.user.destroy',$u->iduser) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button type="submit" class="btn-delete" onclick="return confirm('Yakin hapus data ini?')">🗑 Hapus</button>
            </form>
        </td>
    </tr>
    @empty
    <tr><td colspan="6">Tidak ada data.</td></tr>
    @endforelse
</tbody>

    </table>

    <footer>© 2025 Sistem Informasi Klinik Hewan</footer>
</body>
</html>
