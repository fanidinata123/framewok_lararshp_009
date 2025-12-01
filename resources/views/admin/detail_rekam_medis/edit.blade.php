<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8"><title>Edit Detail</title>
  <style>/* sama styling create */ body{font-family:'Segoe UI',Arial;background:#f2f6fc;} header{background:#007bff;color:#fff;padding:15px;text-align:center;} .container{width:60%;margin:18px auto;background:#fff;padding:20px;border-radius:8px;} label{display:block;margin-top:10px;} select,textarea{width:100%;padding:8px;margin-top:6px;border:1px solid #ddd;border-radius:6px;} .btn{display:inline-block;padding:9px 15px;border-radius:6px;color:#fff;text-decoration:none;margin-top:12px;} .btn-save{background:#007bff;} .btn-back{background:#6c757d;}</style>
</head>
<body>
  <header>Edit Detail</header>
  <div class="container">
    <form action="{{ route('admin.detail-rekam-medis.update') }}" method="POST">
      @csrf
      <input type="hidden" name="iddetail_rekam_medis" value="{{ $detail->iddetail_rekam_medis }}">
      <label>Pilih Kode Tindakan</label>
      <select name="idkode_tindakan_terapi" required>
        @foreach($tindakan as $t)
          <option value="{{ $t->idkode_tindakan_terapi }}" @if($detail->idkode_tindakan_terapi==$t->idkode_tindakan_terapi) selected @endif>{{ $t->kode }} - {{ $t->deskripsi_tindakan_terapi }}</option>
        @endforeach
      </select>

      <label>Detail</label>
      <textarea name="detail" rows="4">{{ $detail->detail }}</textarea>

      <div style="margin-top:12px">
        <a href="{{ route('admin.detail-rekam-medis.index', ['idrekam_medis' => $detail->idrekam_medis]) }}" class="btn btn-back">Kembali</a>
        <button type="submit" class="btn btn-save">Update</button>
      </div>
    </form>
  </div>
</body>
</html>
