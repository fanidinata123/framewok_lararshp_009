@extends('layouts.lte.main_pemilik')

@section('title', 'Jadwal Temu Dokter')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Jadwal Temu Dokter</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No Urut</th>
                        <th>Waktu Daftar</th>
                        <th>Pet</th>
                        <th>Dokter</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($temuDokter as $temu)
                    <tr>
                        <td><strong>{{ $temu->no_urut }}</strong></td>
                        <td>{{ \Carbon\Carbon::parse($temu->waktu_daftar)->format('d/m/Y H:i') }}</td>
                        <td>{{ $temu->nama_pet }}</td>
                        <td>{{ $temu->nama_dokter }}</td>
                        <td>
                            @if($temu->status == '0')
                                <span class="badge bg-warning">Menunggu</span>
                            @elseif($temu->status == '1')
                                <span class="badge bg-success">Selesai</span>
                            @else
                                <span class="badge bg-secondary">Batal</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada jadwal temu dokter</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection