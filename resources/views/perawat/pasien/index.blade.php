@extends('layouts.lte.main_perawat')

@section('title', 'Data Pasien')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Pasien</h3>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pet</th>
                            <th>Jenis/Ras</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Pemilik</th>
                            <th>No. WA</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pets as $index => $pet)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $pet->nama }}</td>
                            <td>{{ $pet->nama_jenis_hewan }} - {{ $pet->nama_ras }}</td>
                            <td>{{ $pet->jenis_kelamin == 'M' ? 'Jantan' : 'Betina' }}</td>
                            <td>{{ $pet->tanggal_lahir ? \Carbon\Carbon::parse($pet->tanggal_lahir)->format('d/m/Y') : '-' }}</td>
                            <td>{{ $pet->nama_pemilik }}</td>
                            <td>{{ $pet->no_wa ?? '-' }}</td>
                            <td>
                                <a href="{{ route('perawat.pasien.show', ['id' => $pet->idpet]) }}" 
                                   class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada data pasien</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection