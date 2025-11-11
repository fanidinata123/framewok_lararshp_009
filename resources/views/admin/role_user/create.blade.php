<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Role User</title>
    <style>
        body{font-family:Arial,sans-serif;background:#eef4ff;margin:0;padding:0;}
        header{background:#007bff;color:#fff;text-align:center;padding:15px 0;font-size:22px;}
        .form-container{width:50%;margin:40px auto;background:#fff;padding:25px;border-radius:8px;box-shadow:0 3px 10px rgba(0,0,0,0.1);}
        h2{text-align:center;color:#333;}
        label{display:block;margin:15px 0 5px;color:#333;font-weight:bold;}
        select{width:100%;padding:10px;border:1px solid #bbb;border-radius:5px;box-sizing:border-box;}
        .btn-submit{background:#007bff;color:#fff;border:none;padding:10px 15px;border-radius:5px;font-size:16px;margin-top:15px;cursor:pointer;}
        .btn-submit:hover{background:#0056b3;}
        .btn-back{display:inline-block;background:#6c757d;color:#fff;padding:8px 12px;border-radius:5px;text-decoration:none;margin-top:10px;}
        .btn-back:hover{background:#5a6268;}
        .error-message{color:#dc3545;font-size:13px;margin-top:5px;}
        footer{text-align:center;color:#666;padding:10px;font-size:13px;margin-top:40px;}
    </style>
</head>
<body>
    <header>Tambah Role User</header>
    <div class="form-container">
        <h2>Form Tambah Role User</h2>
        <form action="{{ route('admin.role-user.store') }}" method="POST">
            @csrf
            
            <label>User:</label>
            <select name="iduser" required>
                <option value="">-- Pilih User --</option>
                @foreach($users as $user)
                    <option value="{{ $user->iduser }}" {{ old('iduser') == $user->iduser ? 'selected' : '' }}>
                        {{ $user->nama }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
            @error('iduser')<div class="error-message">{{ $message }}</div>@enderror

            <label>Role:</label>
            <select name="idrole" required>
                <option value="">-- Pilih Role --</option>
                @foreach($roles as $role)
                    <option value="{{ $role->idrole }}" {{ old('idrole') == $role->idrole ? 'selected' : '' }}>
                        {{ $role->nama_role }}
                    </option>
                @endforeach
            </select>
            @error('idrole')<div class="error-message">{{ $message }}</div>@enderror

            <label>Status:</label>
            <select name="status" required>
                <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Nonaktif</option>
            </select>

            <button type="submit" class="btn-submit">Simpan</button>
        </form>
        <a href="{{ route('admin.role-user.index') }}" class="btn-back">← Kembali</a>
    </div>
    <footer>© 2025 Sistem Informasi Klinik Hewan</footer>
</body>
</html>