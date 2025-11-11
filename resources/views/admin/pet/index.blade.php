<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pet</title>
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
        .btn-edit,.btn-delete{padding:6px 12px;border:none;border-radius:4px;color:white;font-size:13px;cursor:pointer;text-decoration:none;display:inline-block;}
        .btn-edit{background:#ffc107;}.btn-edit:hover{background:#e0a800;}
        .btn-delete{background:#dc3545;}.btn-delete:hover{background:#b02a37;}
        footer{text-align:center;color:#666;padding:10px;font-size:13px;}
    </style>
</head>
<body>
<header>Data Pet</header>
<h2>Daftar Pet</h2>

@if(session('success'))
<div class="alert">✓ {{ session('success') }}</div>
@endif

<div class="nav-container">
    <a href="{{ route('admin.dashboard') }}" class="btn btn-back">⬅ Kembali ke Dashboard</a>
    <a href="{{ route('admin.pet.create') }}" class="btn btn-add">➕ Tambah Pet</a>
</div>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pet</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Warna / Tanda</th>  {{-- 🔹 Kolom baru --}}
            <th>Ras</th>
            <th>Pemilik</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($pets as $pet)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><strong>{{ $pet->nama }}</strong></td>
            <td>{{ date('d/m/Y', strtotime($pet->tanggal_lahir)) }}</td>
            <td>{{ $pet->jenis_kelamin == 'J' ? 'Jantan' : 'Betina' }}</td>

            {{-- 🔹 tampilkan warna_tanda --}}
            <td>{{ $pet->warna_tanda ?? '-' }}</td>

            <td>{{ $pet->rasHewan->nama_ras ?? '-' }} ({{ $pet->rasHewan->jenisHewan->nama_jenis_hewan ?? '-' }})</td>
            <td>
                @if($pet->pemilik && $pet->pemilik->user)
                    {{ $pet->pemilik->user->nama }}
                @else
                    <span style="color:#999;">-</span>
                @endif
            </td>
            <td>
                <a href="{{ route('admin.pet.edit', ['id' => $pet->idpet]) }}" class="btn-edit">✏ Edit</a>

                <form action="{{ route('admin.pet.destroy') }}" method="POST" style="display:inline;">
                    @csrf
                    <input type="hidden" name="id" value="{{ $pet->idpet }}">
                    <button type="submit" class="btn-delete" onclick="return confirm('Yakin hapus {{ $pet->nama }}?')">🗑 Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="8">Tidak ada data pet.</td></tr>
        @endforelse
    </tbody>
</table>

<footer>© 2025 Sistem Informasi Klinik Hewan</footer>
</body>
</html>
