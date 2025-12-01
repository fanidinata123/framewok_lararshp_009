<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8"><title>Tambah Detail</title>
  <style>body{font-family:'Segoe UI',Arial;background:#f2f6fc;} header{background:#007bff;color:#fff;padding:15px;text-align:center;} .container{width:60%;margin:18px auto;background:#fff;padding:20px;border-radius:8px;} label{display:block;margin-top:10px;} select,textarea{width:100%;padding:8px;margin-top:6px;border:1px solid #ddd;border-radius:6px;} .btn{display:inline-block;padding:9px 15px;border-radius:6px;color:#fff;text-decoration:none;margin-top:12px;} .btn-save{background:#007bff;} .btn-back{background:#6c757d;}</style>
</head>
<body>
  <header>Tambah Detail Rekam Medis</header>
  <div class="container">
    <form action="{{ route('admin.detail-rekam-medis.store') }}" method="POST">
      @csrf
      <input type="hidden" name="idrekam_medis" value="{{ $rekam->idrekam_medis }}">
      <label>Pilih Kode Tindakan</label>
      <select name="idkode_tindakan_terapi" required>
        <option value="">-- Pilih Tindakan --</option>
        @foreach($tindakan as $t) <option value="{{ $t->idkode_tindakan_terapi }}">{{ $t->kode }} - {{ $t->deskripsi_tindakan_terapi }}</option> @endforeach
      </select>

      <label>Detail</label>
      <textarea name="detail" rows="4"></textarea>

      <div style="margin-top:12px">
        <a href="{{ route('admin.detail-rekam-medis.index', ['idrekam_medis' => $rekam->idrekam_medis]) }}" class="btn btn-back">Kembali</a>
        <button type="submit" class="btn btn-save">Simpan</button>
      </div>
    </form>
  </div>
</body>
</html>
