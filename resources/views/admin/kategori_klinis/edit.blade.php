<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kategori Klinis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef4ff;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 15px 0;
            font-size: 22px;
            letter-spacing: 1px;
        }
        .form-container {
            width: 50%;
            margin: 40px auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            color: #333;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #bbb;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .btn-submit {
            background-color: #ffc107;
            color: #333;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 15px;
            cursor: pointer;
            font-weight: bold;
        }
        .btn-submit:hover {
            background-color: #e0a800;
        }
        .btn-back {
            display: inline-block;
            background-color: #6c757d;
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 10px;
        }
        .btn-back:hover {
            background-color: #5a6268;
        }
        .error-message {
            color: #dc3545;
            font-size: 13px;
            margin-top: 5px;
        }
        footer {
            text-align: center;
            color: #666;
            padding: 10px;
            font-size: 13px;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <header>Edit Kategori Klinis</header>

    <div class="form-container">
        <h2>Form Edit Kategori Klinis</h2>

        <form action="{{ route('admin.kategori-klinis.update') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $kategoriKlinis->idkategori_klinis }}">
            
            <label for="nama_kategori_klinis">Nama Kategori Klinis:</label>
            <input 
                type="text" 
                id="nama_kategori_klinis" 
                name="nama_kategori_klinis" 
                value="{{ old('nama_kategori_klinis', $kategoriKlinis->nama_kategori_klinis) }}" 
                required
            >
            @error('nama_kategori_klinis')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn-submit">✏ Update</button>
        </form>

        <a href="{{ route('admin.kategori-klinis.index') }}" class="btn-back">← Kembali</a>
    </div>

    <footer>© 2025 Sistem Informasi Klinik Hewan</footer>
</body>
</html>