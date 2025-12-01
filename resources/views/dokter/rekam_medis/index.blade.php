@extends('layouts.lte.main_dokter')

@section('title', 'Rekam Medis')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Rekam Medis</h3>
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
                            <td>{{ $r->pet->nama ?? '-' }}</td>
                            <td>{{ $r->pet->pemilik->user->nama ?? '-' }}</td>
                            <td>{{ $r->dokter->nama ?? '-' }}</td>
                            <td>{{ Str::limit($r->anamnesa, 30) }}</td>
                            <td>{{ Str::limit($r->temuan_klinis, 30) }}</td>
                            <td>{{ Str::limit($r->diagnosa, 40) }}</td>
                            <td>
                                <a href="{{ route('dokter.detail-rekam-medis.index', ['idrekam_medis' => $r->idrekam_medis]) }}" 
                                   class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
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