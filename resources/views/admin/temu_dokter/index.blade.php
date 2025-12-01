<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Temu Dokter - Daftar</title>
  <style>
    body{font-family:'Segoe UI',Arial;background:#f2f6fc;margin:0;padding:0;}
    header{background:#007bff;color:#fff;padding:15px;text-align:center;}
    .nav{width:85%;margin:18px auto;display:flex;justify-content:space-between;}
    .btn{padding:8px 14px;border-radius:6px;text-decoration:none;color:#fff;}
    .btn-add{background:#28a745;}
    .btn-back{background:#6c757d;}
    table{width:85%;margin:10px auto 40px;border-collapse:collapse;background:#fff;box-shadow:0 0 8px rgba(0,0,0,0.08);border-radius:6px;overflow:hidden;}
    th{background:#007bff;color:#fff;padding:10px;text-align:center;}
    td{padding:10px;text-align:center;border-bottom:1px solid #eee;}
    .btn-edit{background:#ffc107;padding:6px 10px;border-radius:5px;color:#000;text-decoration:none;}
    .btn-delete{background:#dc3545;padding:6px 10px;border-radius:5px;color:#fff;text-decoration:none;border:none;}
    .badge-w{color:#fff;padding:4px 8px;border-radius:4px;}
    .st-0{background:#ffc107;color:#000;}
    .st-1{background:#28a745;}
    .st-2{background:#6c757d;}
  </style>
</head>
<body>
  <header>Temu Dokter</header>
  <div class="nav">
    <a href="{{ route('admin.dashboard') }}" class="btn btn-back">⬅ Kembali ke Dashboard</a>
    <a href="{{ route('admin.temu-dokter.create') }}" class="btn btn-add">➕ Tambah Temu Dokter</a>
  </div>

  <table>
    <thead>
      <tr><th>No Urut</th><th>Waktu Daftar</th><th>Pet</th><th>Dokter</th><th>Status</th><th>Aksi</th></tr>
    </thead>
    <tbody>
      @forelse($temu as $t)
        <tr>
          <td>{{ $t->no_urut }}</td>
          <td>{{ $t->waktu_daftar }}</td>
          <td>{{ $t->pet->nama ?? '-' }}</td>
          <td>{{ $t->roleUser->user->nama ?? ($t->roleUser->nama ?? '-') }}</td>
          <td>
            @if($t->status == '0') <span class="badge-w st-0">Menunggu</span>
            @elseif($t->status == '1') <span class="badge-w st-1">Selesai</span>
            @else <span class="badge-w st-2">Batal</span>
            @endif
          </td>
          <td>
            <a href="{{ route('admin.temu-dokter.edit', ['id' => $t->idreservasi_dokter]) }}" class="btn-edit">✏ Edit</a>
            <form action="{{ route('admin.temu-dokter.destroy') }}" method="POST" style="display:inline;">
              @csrf
              <input type="hidden" name="idreservasi_dokter" value="{{ $t->idreservasi_dokter }}">
              <button type="submit" class="btn-delete" onclick="return confirm('Hapus?')">🗑 Hapus</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="7">Tidak ada data.</td></tr>
      @endforelse
    </tbody>
  </table>
</body>
</html>
