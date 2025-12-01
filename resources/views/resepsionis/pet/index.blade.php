@extends('layouts.lte.main_resepsionis')

@section('title', 'Data Pet')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Pet</h3>
        <div class="card-tools">
            <a href="{{ route('resepsionis.pet.create') }}" class="btn btn-success btn-sm">
                <i class="bi bi-plus-circle"></i> Tambah Pet
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
                        <th>No</th>
                        <th>Nama Pet</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Warna/Tanda</th>
                        <th>Ras</th>
                        <th>Pemilik</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pets as $pet)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $pet->nama }}</strong></td>
                        <td>{{ \Carbon\Carbon::parse($pet->tanggal_lahir)->format('d/m/Y') }}</td>
                        <td>
                            @if($pet->jenis_kelamin == 'J')
                                <span class="badge bg-primary">Jantan</span>
                            @else
                                <span class="badge bg-danger">Betina</span>
                            @endif
                        </td>
                        <td>{{ $pet->warna_tanda ?? '-' }}</td>
                        <td>{{ $pet->rasHewan->nama_ras ?? '-' }}</td>
                        <td>{{ $pet->pemilik->user->nama ?? '-' }}</td>
                        <td class="text-nowrap">
                            <a href="{{ route('resepsionis.pet.edit', ['id' => $pet->idpet]) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('resepsionis.pet.destroy') }}" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $pet->idpet }}">
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus {{ $pet->nama }}?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada data pet</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection