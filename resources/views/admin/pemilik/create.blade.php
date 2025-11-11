<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pemilik</title>
    <style>
        body{font-family:Arial,sans-serif;background:#eef4ff;margin:0;padding:0;}
        header{background:#007bff;color:white;text-align:center;padding:15px 0;font-size:22px;}
        .form-container{width:60%;margin:40px auto;background:white;padding:25px;border-radius:8px;box-shadow:0 3px 10px rgba(0,0,0,0.1);}
        h2{text-align:center;color:#333;}
        label{display:block;margin:15px 0 5px;color:#333;font-weight:bold;}
        input[type="text"],select{width:100%;padding:10px;border:1px solid #bbb;border-radius:5px;}
        .btn-submit{background:#007bff;color:white;border:none;padding:10px 15px;border-radius:5px;font-size:16px;margin-top:15px;cursor:pointer;}
        .btn-submit:hover{background:#0056b3;}
        .btn-back{display:inline-block;background:#6c757d;color:white;padding:8px 12px;border-radius:5px;text-decoration:none;margin-top:10px;}
        .btn-back:hover{background:#5a6268;}
        .error-message{color:#dc3545;font-size:13px;margin-top:5px;}
        footer{text-align:center;color:#666;padding:10px;font-size:13px;margin-top:40px;}
    </style>
</head>
<body>
<header>Tambah Data Pemilik</header>

<div class="form-container">
    <h2>Form Tambah Pemilik</h2>

    <form action="{{ route('admin.pemilik.store') }}" method="POST">
        @csrf
        <label for="no_wa">Nomor WA:</label>
        <input type="text" name="no_wa" id="no_wa" value="{{ old('no_wa') }}" required>
        @error('no_wa') <div class="error-message">{{ $message }}</div> @enderror

        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" id="alamat" value="{{ old('alamat') }}" required>
        @error('alamat') <div class="error-message">{{ $message }}</div> @enderror

        <label for="iduser">Pilih User:</label>
        <select name="iduser" id="iduser" required>
            <option value="">-- Pilih User --</option>
            @foreach($user as $u)
                <option value="{{ $u->iduser }}">{{ $u->nama }}</option>
            @endforeach
        </select>
        @error('iduser') <div class="error-message">{{ $message }}</div> @enderror

        <button type="submit" class="btn-submit">Simpan</button>
    </form>

    <a href="{{ route('admin.pemilik.index') }}" class="btn-back">← Kembali</a>
</div>

<footer>© 2025 Sistem Informasi Klinik Hewan</footer>
</body>
</html>
