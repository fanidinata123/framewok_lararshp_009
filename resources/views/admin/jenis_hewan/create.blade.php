<!DOCTYPE html>
<html>
<head>
    <title>Tambah Jenis Hewan</title>
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
        }
        .btn-submit {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 15px;
            cursor: pointer;
        }
        .btn-submit:hover {
            background-color: #0056b3;
        }
        .btn-back {
            display: inline-block;
            background-color: #6c757d;
            color: white;
            padding: 8px 12px;
            order-radius: 5px;
            matext-decoration: none;
            brgin-top: 10px;
        }
        .btn-back:hover {
            background-color: #5a6268;
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
    <header>Tambah Jenis Hewan</header>

    <div class="form-container">
        <h2>Form Tambah Jenis Hewan</h2>

        <form action="{{ route('admin.jenis-hewan.store') }}" method="POST">
            @csrf
            <label for="nama_jenis_hewan">Nama Jenis Hewan:</label>
            <input type="text" id="nama_jenis_hewan" name="nama_jenis_hewan" required>

            <button type="submit" class="btn-submit">Simpan</button>
        </form>

        <a href="{{ route('admin.jenis-hewan.index') }}" class="btn-back">← Kembali</a>
    </div>

    <footer>© 2025 Sistem Informasi Klinik Hewan</footer>
</body>
</html>
