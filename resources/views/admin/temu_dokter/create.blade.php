<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8"><title>Tambah Temu Dokter</title>
  <style>
    body{font-family:'Segoe UI',Arial;background:#f2f6fc;padding:0;margin:0;}
    header{background:#007bff;color:#fff;padding:15px;text-align:center;}
    .container{width:60%;margin:18px auto;background:#fff;padding:20px;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,0.06);}
    label{display:block;margin-top:10px;}
    input,select,textarea{width:100%;padding:8px;margin-top:6px;border:1px solid #ddd;border-radius:6px;}
    .btn{display:inline-block;padding:9px 15px;border-radius:6px;color:#fff;text-decoration:none;margin-top:12px;}
    .btn-save{background:#007bff;}
    .btn-back{background:#6c757d;}
  </style>
</head>
<body>
  <header>Tambah Temu Dokter</header>
  <div class="container">
    <form action="{{ route('admin.temu-dokter.store') }}" method="POST">
      @csrf
      <label for="idpet">Pilih Pet</label>
      <select name="idpet" id="idpet" required>
        <option value="">-- Pilih Pet --</option>
        @foreach($pets as $p)<option value="{{ $p->idpet }}">{{ $p->nama ?? $p->nama_pet ?? 'Pet ' . $p->idpet }}</option>@endforeach
      </select>

      <label for="idrole_user">Pilih Dokter</label>
      <select name="idrole_user" id="idrole_user" required>
        <option value="">-- Pilih Dokter --</option>
        @foreach($dokters as $d)
          <option value="{{ $d->idrole_user ?? $d->idrole_user ?? $d->idrole_user ?? $d->idrole_user }}">{{ $d->nama }}</option>
        @endforeach
      </select>

      <label for="status">Status</label>
      <select name="status" id="status" required>
        <option value="0">Menunggu</option>
        <option value="1">Selesai</option>
        <option value="2">Batal</option>
      </select>

      <div style="margin-top:14px">
        <a href="{{ route('admin.temu-dokter.index') }}" class="btn btn-back">Kembali</a>
        <button type="submit" class="btn btn-save">Simpan</button>
      </div>
    </form>
  </div>
</body>
</html>
