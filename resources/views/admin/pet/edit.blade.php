<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pet</title>
    <style>
        body{font-family:Arial,sans-serif;background:#eef4ff;margin:0;padding:0;}
        header{background:#007bff;color:#fff;text-align:center;padding:15px 0;font-size:22px;}
        .form-container{width:60%;margin:40px auto;background:#fff;padding:25px;border-radius:8px;box-shadow:0 3px 10px rgba(0,0,0,0.1);}
        h2{text-align:center;color:#333;}
        label{display:block;margin:15px 0 5px;color:#333;font-weight:bold;}
        input,select{width:100%;padding:10px;border:1px solid #bbb;border-radius:5px;box-sizing:border-box;}
        .btn-submit{background:#ffc107;color:#333;border:none;padding:10px 15px;border-radius:5px;font-size:16px;margin-top:15px;cursor:pointer;font-weight:bold;}
        .btn-submit:hover{background:#e0a800;}
        .btn-back{display:inline-block;background:#6c757d;color:#fff;padding:8px 12px;border-radius:5px;text-decoration:none;margin-top:10px;}
        .btn-back:hover{background:#5a6268;}
        .error-message{color:#dc3545;font-size:13px;margin-top:5px;}
        footer{text-align:center;color:#666;padding:10px;font-size:13px;margin-top:40px;}
    </style>
</head>
<body>
    <header>Edit Pet</header>
    <div class="form-container">
        <h2>Form Edit Pet</h2>
        <form action="{{ route('admin.pet.update') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $pet->idpet }}">
            
            <label>Nama Pet:</label>
            <input type="text" name="nama" value="{{ old('nama', $pet->nama) }}" required>
            @error('nama')<div class="error-message">{{ $message }}</div>@enderror

            <label>Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pet->tanggal_lahir) }}" required>
            @error('tanggal_lahir')<div class="error-message">{{ $message }}</div>@enderror

            <label>Warna/Tanda:</label>
            <input type="text" name="warna_tanda" value="{{ old('warna_tanda', $pet->warna_tanda) }}">
            @error('warna_tanda')<div class="error-message">{{ $message }}</div>@enderror

            <label>Jenis Kelamin:</label>
            <select name="jenis_kelamin" required>
                <option value="">-- Pilih --</option>
                <option value="J" {{ old('jenis_kelamin', $pet->jenis_kelamin) == 'J' ? 'selected' : '' }}>Jantan</option>
                <option value="L" {{ old('jenis_kelamin', $pet->jenis_kelamin) == 'L' ? 'selected' : '' }}>Betina</option>
            </select>
            @error('jenis_kelamin')<div class="error-message">{{ $message }}</div>@enderror

            <label>Pemilik:</label>
            <select name="idpemilik" required>
                <option value="">-- Pilih Pemilik --</option>
                @foreach($pemilik as $p)
                    <option value="{{ $p->idpemilik }}" {{ old('idpemilik', $pet->idpemilik) == $p->idpemilik ? 'selected' : '' }}>
                        {{ $p->user->nama ?? 'Nama tidak tersedia' }} ({{ $p->no_wa ?? '-' }})
                    </option>
                @endforeach
            </select>
            @error('idpemilik')<div class="error-message">{{ $message }}</div>@enderror

            <label>Ras Hewan:</label>
            <select name="idras_hewan" required>
                <option value="">-- Pilih Ras --</option>
                @foreach($rasHewan as $ras)
                    <option value="{{ $ras->idras_hewan }}" {{ old('idras_hewan', $pet->idras_hewan) == $ras->idras_hewan ? 'selected' : '' }}>
                        {{ $ras->nama_ras }} ({{ $ras->jenisHewan->nama_jenis_hewan ?? '-' }})
                    </option>
                @endforeach
            </select>
            @error('idras_hewan')<div class="error-message">{{ $message }}</div>@enderror

            <button type="submit" class="btn-submit">✏ Update</button>
        </form>
        <a href="{{ route('admin.pet.index') }}" class="btn-back">← Kembali</a>
    </div>
    <footer>© 2025 Sistem Informasi Klinik Hewan</footer>
</body>
</html>