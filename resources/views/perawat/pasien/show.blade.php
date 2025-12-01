@extends('layouts.lte.main_perawat')

@section('title', 'Detail Pasien')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail Pasien</h3>
            <div class="card-tools">
                <a href="{{ route('perawat.pasien.index') }}" class="btn btn-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>Informasi Pet</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th width="200">Nama Pet</th>
                            <td>{{ $pet->nama }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Hewan</th>
                            <td>{{ $pet->nama_jenis_hewan }}</td>
                        </tr>
                        <tr>
                            <th>Ras</th>
                            <td>{{ $pet->nama_ras }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>{{ $pet->jenis_kelamin == 'M' ? 'Jantan' : 'Betina' }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <td>{{ $pet->tanggal_lahir ? \Carbon\Carbon::parse($pet->tanggal_lahir)->format('d/m/Y') : '-' }}</td>
                        </tr>
                        <tr>
                            <th>Warna/Tanda</th>
                            <td>{{ $pet->warna_tanda ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <h5>Informasi Pemilik</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th width="200">Nama Pemilik</th>
                            <td>{{ $pet->nama_pemilik }}</td>
                        </tr>
                        <tr>
                            <th>No. WhatsApp</th>
                            <td>{{ $pet->no_wa ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $pet->alamat ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <hr>

            <h5 class="mt-4">Riwayat Rekam Medis</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Anamnesa</th>
                            <th>Diagnosa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($riwayatRekamMedis as $index => $rm)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ \Carbon\Carbon::parse($rm->created_at)->format('d/m/Y H:i') }}</td>
                            <td>{{ Str::limit($rm->anamnesa, 50) }}</td>
                            <td>{{ Str::limit($rm->diagnosa, 50) }}</td>
                            <td>
                                <!-- PERBAIKAN DI SINI: Arahkan ke index dengan parameter idrekam_medis -->
                                <a href="{{ route('perawat.detail-rekam-medis.index', ['idrekam_medis' => $rm->idrekam_medis]) }}" 
                                   class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada riwayat rekam medis</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection