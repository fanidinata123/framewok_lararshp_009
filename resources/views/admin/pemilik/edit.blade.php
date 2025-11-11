<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pemilik</title>
    <style>
        body{font-family:Arial,sans-serif;background:#eef4ff;margin:0;padding:0;}
        header{background:#007bff;color:white;text-align:center;padding:15px 0;font-size:22px;}
        .form-container{width:60%;margin:40px auto;background:white;padding:25px;border-radius:8px;box-shadow:0 3px 10px rgba(0,0,0,0.1);}
        h2{text-align:center;color:#333;}
        label{display:block;margin:15px 0 5px;color:#333;font-weight:bold;}
        input[type="text"],select{width:100%;padding:10px;border:1px solid #bbb;border-radius:5px;}
        .btn-submit{background:#ffc107;color:#333;border:none;padding:10px 15px;border-radius:5px;font-size:16px;margin-top:15px;cursor:pointer;font-weight:bold;}
        .btn-submit:hover{background:#e0a800;}
        .btn-back{display:inline-block;background:#6c757d;color:white;padding:8px 12px;border-radius:5px;text-decoration:none;margin-top:10px;}
        .btn-back:hover{background:#5a6268;}
        .error-message{color:#dc3545;font-size:13px;margin-top:5px;}
        footer{text-align:center;color:#666;padding:10px;font-size:13px;margin-top:40px;}
    </style>
</head>
<body>
<header>Edit Data Pemilik</header>

<div class="form-container">
    <h2>Form Edit Pemilik</h2>

    <form action="{{ route('admin.pemilik.update') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $pemilik->idpemilik }}">

        <label for="no_wa">Nomor WA:</label>
        <input type="text" name="no_wa" id="no_wa" value="{{ old('no_wa', $pemilik->no_wa) }}" required>

        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" id="alamat" value="{{ old('alamat', $pemilik->alamat) }}" required>

        <label for="iduser">Pilih User:</label>
        <select name="iduser" id="iduser" required>
            @foreach($user as $u)
                <option value="{{ $u->iduser }}" {{ old('iduser', $pemilik->iduser) == $u->iduser ? 'selected' : '' }}>
                    {{ $u->nama }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="btn-submit">✏ Update</button>
    </form>

    <a href="{{ route('admin.pemilik.index') }}" class="btn-back">← Kembali</a>
</div>

<footer>© 2025 Sistem Informasi Klinik Hewan</footer>
</body>
</html>
