<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8"><title>Edit Rekam Medis</title>

  <style>
    body{font-family:'Segoe UI',Arial;background:#f2f6fc;margin:0;padding:0;}
    header{background:#007bff;color:#fff;padding:15px;text-align:center;}
    .container{width:60%;margin:25px auto;background:#fff;padding:25px;border-radius:8px;box-shadow:0 0 10px rgba(0,0,0,0.09);}
    label{font-weight:bold;margin-top:10px;display:block;}
    input, select, textarea{
      width:100%;padding:8px;margin-top:5px;border:1px solid #ccc;border-radius:5px;
    }
    .btn{padding:10px 16px;border-radius:6px;color:#fff;text-decoration:none;border:none;cursor:pointer;margin-top:15px;}
    .btn-submit{background:#ffc107;color:#000;}
    .btn-back{background:#6c757d;}
  </style>
</head>

<body>
<header>Edit Rekam Medis</header>

<div class="container">

  <form action="{{ route('admin.rekam-medis.update') }}" method="POST">
    @csrf

    <input type="hidden" name="idrekam_medis" value="{{ $rekam->idrekam_medis }}">

    <label>Tanggal Pemeriksaan</label>
    <input type="date" name="tanggal"
      value="{{ $rekam->created_at ? \Carbon\Carbon::parse($rekam->created_at)->format('Y-m-d') : '' }}">

    <label>Pet</label>
    <select name="idpet" required>
      @foreach($pets as $p)
        <option value="{{ $p->idpet }}" {{ $p->idpet == $rekam->idpet ? 'selected' : '' }}>
          {{ $p->nama }}
        </option>
      @endforeach
    </select>

    <label>Dokter Pemeriksa</label>
    <select name="dokter_pemeriksa" required>
      @foreach($dokters as $d)
        <option value="{{ $d->iduser }}" {{ $d->iduser == $rekam->dokter_pemeriksa ? 'selected' : '' }}>
          {{ $d->nama }}
        </option>
      @endforeach
    </select>

    <label>Anamnesa</label>
    <textarea name="anamnesa">{{ $rekam->anamnesa }}</textarea>

    <label>Temuan Klinis</label>
    <textarea name="temuan_klinis">{{ $rekam->temuan_klinis }}</textarea>

    <label>Diagnosa</label>
    <textarea name="diagnosa">{{ $rekam->diagnosa }}</textarea>

    <button class="btn btn-submit">Update</button>
    <a href="{{ route('admin.rekam-medis.index') }}" class="btn btn-back">Kembali</a>
  </form>

</div>
</body>
</html>
