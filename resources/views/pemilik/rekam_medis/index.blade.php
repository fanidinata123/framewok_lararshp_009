@extends('layouts.lte.main_pemilik')

@section('title', 'Rekam Medis')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Riwayat Rekam Medis</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Pet</th>
                        <th>Dokter</th>
                        <th>Anamnesa</th>
                        <th>Temuan Klinis</th>
                        <th>Diagnosa</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rekamMedis as $rm)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($rm->created_at)->format('d/m/Y') }}</td>
                        <td><strong>{{ $rm->nama_pet }}</strong></td>
                        <td>{{ $rm->nama_dokter }}</td>
                        <td>{{ Str::limit($rm->anamnesa, 50) ?? '-' }}</td>
                        <td>{{ Str::limit($rm->temuan_klinis, 50) ?? '-' }}</td>
                        <td>{{ Str::limit($rm->diagnosa, 50) ?? '-' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada rekam medis</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection