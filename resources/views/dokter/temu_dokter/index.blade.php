@extends('layouts.lte.main_dokter')

@section('title', 'Jadwal Temu Dokter')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Jadwal Temu Dokter</h3>
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
                            <th>No Urut</th>
                            <th>Waktu Daftar</th>
                            <th>Pet</th>
                            <th>Pemilik</th>
                            <th>Dokter</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($temu as $t)
                        <tr>
                            <td>{{ $t->no_urut }}</td>
                            <td>{{ \Carbon\Carbon::parse($t->waktu_daftar)->format('d/m/Y H:i') }}</td>
                            <td>{{ $t->pet->nama ?? '-' }}</td>
                            <td>{{ $t->pet->pemilik->user->nama ?? '-' }}</td>
                            <td>{{ $t->roleUser->user->nama ?? '-' }}</td>
                            <td>
                                @if($t->status == '0')
                                    <span class="badge bg-warning text-dark">Menunggu</span>
                                @elseif($t->status == '1')
                                    <span class="badge bg-success">Selesai</span>
                                @else
                                    <span class="badge bg-secondary">Batal</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data jadwal temu</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection