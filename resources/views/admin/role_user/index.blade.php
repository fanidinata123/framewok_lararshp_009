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

        .nav-container {
            width: 85%;
            margin: 20px auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-add, .btn-back {
            padding: 10px 18px;
            border-radius: 5px;
            font-weight: bold;
            text-decoration: none;
            transition: 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 15px;
        }

        .btn-add {
            background-color: #28a745;
            color: white;
        }
        .btn-add:hover { background-color: #218838; }

        .btn-back {
            background-color: #6c757d;
            color: white;
        }
        .btn-back:hover { background-color: #5a6268; }

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

        .btn-edit, .btn-delete {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: white;
            font-size: 14px;
            font-weight: bold;
        }

        .btn-edit {
            background-color: #ffc107;
        }
        .btn-edit:hover {
            background-color: #e0a800;
        }

        .btn-delete {
            background-color: #dc3545;
        }
        .btn-delete:hover {
            background-color: #b02a37;
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

    <div class="nav-container">
        <a href="{{ route('admin.dashboard') }}" class="btn-back">⬅ Kembali ke Dashboard</a>
        <a href="{{ route('admin.role-user.create') }}" class="btn-add">➕ Tambah Role User</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Aksi</th>
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
                    <td>
                        <a href="{{ route('admin.role-user.edit', $ru->idrole_user) }}" class="btn-edit">✏ Edit</a>
                        <form action="{{ route('admin.role-user.destroy', $ru->idrole_user) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Yakin ingin menghapus data ini?')">🗑 Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Tidak ada data role user.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <footer>© 2025 Sistem Informasi Klinik Hewan</footer>

</body>
</html>
