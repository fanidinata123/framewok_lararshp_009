<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8"><title>Edit Temu</title>
  <style>/* sama styling create */ body{font-family:'Segoe UI',Arial;background:#f2f6fc;} header{background:#007bff;color:#fff;padding:15px;text-align:center;} .container{width:60%;margin:18px auto;background:#fff;padding:20px;border-radius:8px;} label{display:block;margin-top:10px;} input,select{width:100%;padding:8px;margin-top:6px;border:1px solid #ddd;border-radius:6px;} .btn{display:inline-block;padding:9px 15px;border-radius:6px;color:#fff;text-decoration:none;margin-top:12px;} .btn-save{background:#007bff;} .btn-back{background:#6c757d;}</style>
</head>
<body>
  <header>Edit Temu Dokter</header>
  <div class="container">
    <form action="{{ route('admin.temu-dokter.update') }}" method="POST">
      @csrf
      <input type="hidden" name="idreservasi_dokter" value="{{ $item->idreservasi_dokter }}">

      <label>Pilih Pet</label>
      <select name="idpet" required>
        @foreach($pets as $p)
          <option value="{{ $p->idpet }}" @if($p->idpet == $item->idpet) selected @endif>{{ $p->nama ?? $p->nama_pet ?? 'Pet '.$p->idpet }}</option>
        @endforeach
      </select>

      <label>Pilih Dokter</label>
      <select name="idrole_user" required>
        @foreach($dokters as $d)
          <option value="{{ $d->idrole_user ?? $d->idrole_user }}" @if(($d->idrole_user ?? null) == $item->idrole_user) selected @endif>{{ $d->nama }}</option>
        @endforeach
      </select>

      <label>Status</label>
      <select name="status" required>
        <option value="0" @if($item->status == '0') selected @endif>Menunggu</option>
        <option value="1" @if($item->status == '1') selected @endif>Selesai</option>
        <option value="2" @if($item->status == '2') selected @endif>Batal</option>
      </select>

      <div style="margin-top:14px">
        <a href="{{ route('admin.temu-dokter.index') }}" class="btn btn-back">Kembali</a>
        <button type="submit" class="btn btn-save">Update</button>
      </div>
    </form>
  </div>
</body>
</html>
