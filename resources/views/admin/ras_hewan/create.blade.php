<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Ras Hewan</title>
    <style>
        body{font-family:Arial,sans-serif;background:#eef4ff;margin:0;padding:0;}
        header{background:#007bff;color:#fff;text-align:center;padding:15px 0;font-size:22px;}
        .form-container{width:50%;margin:40px auto;background:#fff;padding:25px;border-radius:8px;box-shadow:0 3px 10px rgba(0,0,0,0.1);}
        h2{text-align:center;color:#333;}
        label{display:block;margin:15px 0 5px;color:#333;font-weight:bold;}
        input,select{width:100%;padding:10px;border:1px solid #bbb;border-radius:5px;box-sizing:border-box;}
        .btn-submit{background:#007bff;color:#fff;border:none;padding:10px 15px;border-radius:5px;font-size:16px;margin-top:15px;cursor:pointer;}
        .btn-submit:hover{background:#0056b3;}
        .btn-back{display:inline-block;background:#6c757d;color:#fff;padding:8px 12px;border-radius:5px;text-decoration:none;margin-top:10px;}
        .btn-back:hover{background:#5a6268;}
        .error-message{color:#dc3545;font-size:13px;margin-top:5px;}
        footer{text-align:center;color:#666;padding:10px;font-size:13px;margin-top:40px;}
    </style>
</head>
<body>
    <header>Tambah Ras Hewan</header>
    <div class="form-container">
        <h2>Form Tambah Ras Hewan</h2>
        <form action="{{ route('admin.ras-hewan.store') }}" method="POST">
            @csrf
            
            <label>Nama Ras:</label>
            <input type="text" name="nama_ras" value="{{ old('nama_ras') }}" required>
            @error('nama_ras')<div class="error-message">{{ $message }}</div>@enderror

            <label>Jenis Hewan:</label>
            <select name="idjenis_hewan" required>
                <option value="">-- Pilih Jenis Hewan --</option>
                @foreach($jenisHewan as $jenis)
                    <option value="{{ $jenis->idjenis_hewan }}" {{ old('idjenis_hewan') == $jenis->idjenis_hewan ? 'selected' : '' }}>
                        {{ $jenis->nama_jenis_hewan }}
                    </option>
                @endforeach
            </select>
            @error('idjenis_hewan')<div class="error-message">{{ $message }}</div>@enderror

            <button type="submit" class="btn-submit">Simpan</button>
        </form>
        <a href="{{ route('admin.ras-hewan.index') }}" class="btn-back">← Kembali</a>
    </div>
    <footer>© 2025 Sistem Informasi Klinik Hewan</footer>
</body>
</html>