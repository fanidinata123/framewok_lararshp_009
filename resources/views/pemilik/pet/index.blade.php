@extends('layouts.lte.main_pemilik')

@section('title', 'Pet Saya')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Pet yang Saya Miliki</h3>
    </div>
    <div class="card-body">
        <div class="row">
            @forelse($pets as $pet)
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="bi bi-badge-vr text-primary"></i> {{ $pet->nama }}
                        </h5>
                        <hr>
                        <p class="card-text">
                            <strong>Jenis:</strong> {{ $pet->nama_jenis_hewan }}<br>
                            <strong>Ras:</strong> {{ $pet->nama_ras }}<br>
                            <strong>Jenis Kelamin:</strong> 
                            @if($pet->jenis_kelamin == 'J')
                                <span class="badge bg-primary">Jantan</span>
                            @else
                                <span class="badge bg-danger">Betina</span>
                            @endif
                            <br>
                            <strong>Tanggal Lahir:</strong> {{ \Carbon\Carbon::parse($pet->tanggal_lahir)->format('d/m/Y') }}<br>
                            <strong>Umur:</strong> {{ \Carbon\Carbon::parse($pet->tanggal_lahir)->age }} tahun<br>
                            @if($pet->warna_tanda)
                                <strong>Warna/Tanda:</strong> {{ $pet->warna_tanda }}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    <i class="bi bi-info-circle"></i> Anda belum memiliki pet yang terdaftar
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection