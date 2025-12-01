@extends('layouts.lte.main_perawat')

@section('title', 'Rekam Medis')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Rekam Medis</h3>
            <div class="card-tools">
                <a href="{{ route('perawat.rekam-medis.create') }}" class="btn btn-success btn-sm">
                    <i class="bi bi-plus-circle"></i> Tambah Rekam Medis
                </a>
            </div>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Pet</th>
                            <th>Pemilik</th>
                            <th>Dokter</th>
                            <th>Anamnesa</th>
                            <th>Temuan Klinis</th>
                            <th>Diagnosa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rekams as $r)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $r->created_at ? \Carbon\Carbon::parse($r->created_at)->format('d/m/Y') : '-' }}</td>
                            <td>{{ $r->nama_pet ?? '-' }}</td>
                            <td>{{ $r->nama_pemilik ?? '-' }}</td>
                            <td>{{ $r->nama_dokter ?? '-' }}</td>
                            <td>{{ Str::limit($r->anamnesa, 30) }}</td>
                            <td>{{ Str::limit($r->temuan_klinis, 30) }}</td>
                            <td>{{ Str::limit($r->diagnosa, 40) }}</td>
                            <td class="text-nowrap">
                                {{-- Detail - Menggunakan query parameter --}}
                                <a href="{{ route('perawat.detail-rekam-medis.index', ['idrekam_medis' => $r->idrekam_medis]) }}" 
                                   class="btn btn-sm btn-info mb-1"
                                   title="Lihat Detail">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                                
                                {{-- Edit - Menggunakan query parameter --}}
                                <a href="{{ route('perawat.rekam-medis.edit', ['id' => $r->idrekam_medis]) }}" 
                                   class="btn btn-sm btn-warning mb-1"
                                   title="Edit">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                
                                {{-- Hapus --}}
                                <form action="{{ route('perawat.rekam-medis.destroy') }}" 
                                      method="POST" 
                                      style="display:inline-block;"
                                      onsubmit="return confirm('Yakin ingin menghapus rekam medis ini?')">
                                    @csrf
                                    <input type="hidden" name="idrekam_medis" value="{{ $r->idrekam_medis }}">
                                    <button type="submit" class="btn btn-sm btn-danger mb-1" title="Hapus">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center">Tidak ada data rekam medis</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection