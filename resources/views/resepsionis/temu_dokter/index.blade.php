@extends('layouts.lte.main_resepsionis')

@section('title', 'Temu Dokter')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Temu Dokter</h3>
        <div class="card-tools">
            <a href="{{ route('resepsionis.temu-dokter.create') }}" class="btn btn-success btn-sm">
                <i class="bi bi-plus-circle"></i> Tambah Temu Dokter
            </a>
        </div>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No Urut</th>
                        <th>Waktu Daftar</th>
                        <th>Pet</th>
                        <th>Pemilik</th>
                        <th>Dokter</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($temu as $t)
                    <tr>
                        <td><strong>{{ $t->no_urut }}</strong></td>
                        <td>{{ \Carbon\Carbon::parse($t->waktu_daftar)->format('d/m/Y H:i') }}</td>
                        <td>{{ $t->pet->nama ?? '-' }}</td>
                        <td>{{ $t->pet->pemilik->user->nama ?? '-' }}</td>
                        <td>{{ $t->roleUser->user->nama ?? '-' }}</td>
                        <td>
                            @if($t->status == '0')
                                <span class="badge bg-warning">Menunggu</span>
                            @elseif($t->status == '1')
                                <span class="badge bg-success">Selesai</span>
                            @else
                                <span class="badge bg-secondary">Batal</span>
                            @endif
                        </td>
                        <td class="text-nowrap">
                            <a href="{{ route('resepsionis.temu-dokter.edit', ['id' => $t->idreservasi_dokter]) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('resepsionis.temu-dokter.destroy') }}" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="idreservasi_dokter" value="{{ $t->idreservasi_dokter }}">
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data temu dokter</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection