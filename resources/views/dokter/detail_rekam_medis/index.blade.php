@extends('layouts.lte.main_dokter')

@section('title', 'Detail Rekam Medis')

@section('content')
<div class="container-fluid">
    <!-- Info Rekam Medis -->
    <div class="card mb-3">
        <div class="card-header bg-info text-white">
            <h3 class="card-title">Informasi Rekam Medis</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Pet:</strong> {{ $rekam->pet->nama ?? '-' }}</p>
                    <p><strong>Tanggal:</strong> {{ $rekam->created_at ? \Carbon\Carbon::parse($rekam->created_at)->format('d/m/Y H:i') : '-' }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Anamnesa:</strong> {{ $rekam->anamnesa ?? '-' }}</p>
                    <p><strong>Diagnosa:</strong> {{ $rekam->diagnosa ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Rekam Medis -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail Tindakan & Terapi</h3>
            <div class="card-tools">
                <a href="{{ route('dokter.detail-rekam-medis.create', ['idrekam_medis' => $rekam->idrekam_medis]) }}" 
                   class="btn btn-success btn-sm">
                    <i class="bi bi-plus-circle"></i> Tambah Detail
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

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Tindakan</th>
                            <th>Deskripsi Tindakan</th>
                            <th>Detail</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($details as $d)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $d->kodeTindakan->kode ?? '-' }}</td>
                            <td>{{ $d->kodeTindakan->deskripsi_tindakan_terapi ?? '-' }}</td>
                            <td>{{ $d->detail ?? '-' }}</td>
                            <td>
                                <a href="{{ route('dokter.detail-rekam-medis.edit', ['id' => $d->iddetail_rekam_medis]) }}" 
                                   class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                
                                <form action="{{ route('dokter.detail-rekam-medis.destroy') }}" 
                                      method="POST" 
                                      style="display:inline-block;"
                                      onsubmit="return confirm('Yakin ingin menghapus detail ini?')">
                                    @csrf
                                    <input type="hidden" name="iddetail_rekam_medis" value="{{ $d->iddetail_rekam_medis }}">
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada detail tindakan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('dokter.rekam-medis.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali ke Rekam Medis
            </a>
        </div>
    </div>
</div>
@endsection