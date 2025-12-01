<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8"><title>Detail Rekam Medis</title>
  <style>
    body{font-family:'Segoe UI',Arial;background:#f2f6fc;margin:0;padding:0;}
    header{background:#007bff;color:#fff;padding:15px;text-align:center;}
    .nav{width:85%;margin:18px auto;display:flex;justify-content:space-between;}
    .btn{padding:8px 14px;border-radius:6px;color:#fff;text-decoration:none;}
    .btn-add{background:#28a745;}
    .btn-back{background:#6c757d;}
    table{width:85%;margin:10px auto 40px;border-collapse:collapse;background:#fff;box-shadow:0 0 8px rgba(0,0,0,0.06);border-radius:6px;}
    th{background:#007bff;color:#fff;padding:10px;text-align:center;}
    td{padding:10px;text-align:center;border-bottom:1px solid #eee;}
    .btn-edit{background:#ffc107;padding:6px 10px;border-radius:5px;color:#000;text-decoration:none;}
    .btn-delete{background:#dc3545;padding:6px 10px;border-radius:5px;color:#fff;text-decoration:none;border:none;}
  </style> 
</head>
<body>
  <header>Detail Rekam Medis untuk: {{ $rekam->pet->nama ?? 'Pet' }}</header>
  <div class="nav">
    <a href="{{ route('admin.rekam-medis.index') }}" class="btn btn-back">⬅ Kembali ke Rekam Medis</a>
    <a href="{{ route('admin.detail-rekam-medis.create', ['idrekam_medis' => $rekam->idrekam_medis]) }}" class="btn btn-add">➕ Tambah Detail</a>
  </div>

  <table>
    <thead>
      <tr><th>No</th><th>Kode Tindakan</th><th>Deskripsi Tindakan</th><th>Detail</th><th>Aksi</th></tr>
    </thead>
    <tbody>
      @forelse($details as $d)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $d->kodeTindakan->kode ?? '-' }}</td>
          <td>{{ $d->kodeTindakan->deskripsi_tindakan_terapi ?? '-' }}</td>
          <td>{{ $d->detail }}</td>
          <td>
            <a href="{{ route('admin.detail-rekam-medis.edit', ['id' => $d->iddetail_rekam_medis]) }}" class="btn-edit">✏ Edit</a>
            <form action="{{ route('admin.detail-rekam-medis.destroy') }}" method="POST" style="display:inline;">
              @csrf
              <input type="hidden" name="iddetail_rekam_medis" value="{{ $d->iddetail_rekam_medis }}">
              <button type="submit" class="btn-delete" onclick="return confirm('Hapus detail?')">🗑 Hapus</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="4">Belum ada detail.</td></tr>
      @endforelse
    </tbody>
  </table>
</body>
</html>
