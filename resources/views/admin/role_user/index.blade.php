<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Role User</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: #f2f6fc;
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
        h2 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }
        .container {
            width: 100%;
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        .btn-add {
            background-color: #28a745;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 15px;
            transition: background-color 0.2s;
        }
        .btn-add:hover {
            background-color: #218838;
        }
        table {
            width: 85%;
            margin: 0 auto 40px auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
            border-radius: 6px;
            overflow: hidden;
        }
        th {
            background-color: #007bff;
            color: white;
            padding: 10px;
            text-transform: uppercase;
        }
        td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        tr:hover {
            background-color: #f1f9ff;
            transition: 0.2s;
        }
        .status-active {
            color: #28a745;
            font-weight: bold;
        }
        .status-inactive {
            color: #dc3545;
            font-weight: bold;
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

    <header>Data Role User</header>

    <h2>Daftar Role User</h2>

    <div class="container">
        <a href="{{ route('admin.role-user.create') }}" class="btn-add">
            <span style="font-size: 18px;">➕</span> Tambah Role User
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($roleUser as $ru)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $ru->user->nama ?? '-' }}</td>
                    <td>{{ $ru->user->email ?? '-' }}</td>
                    <td>{{ $ru->role->nama_role ?? '-' }}</td>
                    <td>
                        @if($ru->status == 1)
                            <span class="status-active">Aktif</span>
                        @else
                            <span class="status-inactive">Nonaktif</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Tidak ada data role user.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <footer>© 2025 Sistem Informasi Klinik Hewan</footer>

</body>
</html>
