<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8"><title>Rekam Medis</title>
  <style>
    body{font-family:'Segoe UI',Arial;background:#f2f6fc;margin:0;padding:0;}
    header{background:#007bff;color:#fff;padding:15px;text-align:center;}
    .nav{width:85%;margin:18px auto;display:flex;justify-content:space-between;}
    .btn{padding:8px 14px;border-radius:6px;color:#fff;text-decoration:none;}
    .btn-add{background:#28a745;}
    .btn-back{background:#6c757d;}
    table{width:90%;margin:10px auto 40px;border-collapse:collapse;background:#fff;box-shadow:0 0 8px rgba(0,0,0,0.06);border-radius:6px;overflow:hidden;}
    th{background:#007bff;color:#fff;padding:10px;text-align:center;}
    td{padding:10px;text-align:center;border-bottom:1px solid #eee;}
    .btn-edit{background:#ffc107;padding:6px 10px;border-radius:5px;color:#000;text-decoration:none;}
    .btn-delete{background:#dc3545;padding:6px 10px;border-radius:5px;color:#fff;text-decoration:none;border:none;}
    .btn-detail{background:#0d6efd;padding:6px 10px;border-radius:5px;color:#fff;text-decoration:none;}
  </style>
</head>
<body>
  <header>Rekam Medis</header>

  <div class="nav">
    <a href="{{ route('admin.dashboard') }}" class="btn btn-back">⬅ Kembali ke Dashboard</a>
    <a href="{{ route('admin.rekam-medis.create') }}" class="btn btn-add">➕ Tambah Rekam Medis</a>
  </div>

  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Pet</th>
        <th>Dokter</th>
        <th>Anamnesa</th>
        <th>Temuan Klinis</th>
        <th>Diagnosa</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>

      @foreach($rekams as $r)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $r->created_at ? \Carbon\Carbon::parse($r->created_at)->format('d-m-Y') : '-' }}</td>
        <td>{{ $r->pet->nama ?? '-' }}</td>
        <td>{{ $r->dokter->nama ?? '-' }}</td>
        <td>{{ Str::limit($r->anamnesa, 30) }}</td>
        <td>{{ Str::limit($r->temuan_klinis, 30) }}</td>
        <td>{{ Str::limit($r->diagnosa, 40) }}</td>

        <td>
          <a href="{{ route('admin.detail-rekam-medis.index', ['idrekam_medis'=>$r->idrekam_medis]) }}" class="btn-detail">Detail</a>
          <a href="{{ route('admin.rekam-medis.edit',['id'=>$r->idrekam_medis]) }}" class="btn-edit">✏ Edit</a>

          <form action="{{ route('admin.rekam-medis.destroy') }}" method="POST" style="display:inline;">
            @csrf
            <input type="hidden" name="idrekam_medis" value="{{ $r->idrekam_medis }}">
            <button class="btn-delete" onclick="return confirm('Yakin hapus?')">🗑 Hapus</button>
          </form>
        </td>
      </tr>
      @endforeach

    </tbody>
  </table>

</body>
</html>
