@extends('layouts.lte.main_perawat')

@section('title', 'Detail Rekam Medis')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail Rekam Medis</h3>
            <div class="card-tools">
                <a href="{{ route('perawat.rekam-medis.index') }}" class="btn btn-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
        <div class="card-body">
            <!-- Informasi Rekam Medis -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>Informasi Rekam Medis</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th width="200">Tanggal</th>
                            <td>{{ $rekam->created_at ? \Carbon\Carbon::parse($rekam->created_at)->format('d/m/Y H:i') : '-' }}</td>
                        </tr>
                        <tr>
                            <th>Nama Pet</th>
                            <td>{{ $rekam->nama_pet ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Pemilik</th>
                            <td>{{ $rekam->nama_pemilik ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Dokter Pemeriksa</th>
                            <td>{{ $rekam->nama_dokter ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <h5>Hasil Pemeriksaan</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th width="200">Anamnesa</th>
                            <td>{{ $rekam->anamnesa ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Temuan Klinis</th>
                            <td>{{ $rekam->temuan_klinis ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Diagnosa</th>
                            <td>{{ $rekam->diagnosa ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <hr>

            <!-- Detail Tindakan/Terapi -->
            <h5 class="mt-4">Detail Tindakan & Terapi</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Kategori</th>
                            <th>Jenis</th>
                            <th>Deskripsi</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($details as $index => $detail)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $detail->kode ?? '-' }}</td>
                            <td>{{ $detail->nama_kategori ?? '-' }}</td>
                            <td>{{ $detail->nama_kategori_klinis ?? '-' }}</td>
                            <td>{{ $detail->deskripsi_tindakan_terapi ?? '-' }}</td>
                            <td>{{ $detail->detail ?? '-' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada detail tindakan/terapi</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection