@extends('layouts.lte.main_pemilik')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-4 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $totalPet }}</h3>
                <p>Total Pet Saya</p>
            </div>
            <div class="icon"><i class="bi bi-badge-vr"></i></div>
            <a href="{{ route('pemilik.pet.index') }}" class="small-box-footer">
                Lihat Detail <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-4 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $temuMenunggu }}</h3>
                <p>Temu Menunggu</p>
            </div>
            <div class="icon"><i class="bi bi-hourglass-split"></i></div>
            <a href="{{ route('pemilik.temu-dokter.index') }}" class="small-box-footer">
                Lihat Detail <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-4 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $totalRekamMedis }}</h3>
                <p>Total Rekam Medis</p>
            </div>
            <div class="icon"><i class="bi bi-file-medical"></i></div>
            <a href="{{ route('pemilik.rekam-medis.index') }}" class="small-box-footer">
                Lihat Detail <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="bi bi-info-circle"></i> Selamat Datang</h3>
    </div>
    <div class="card-body">
        <p>Anda dapat melihat informasi pet, jadwal temu dokter, dan rekam medis dari panel ini.</p>
    </div>
</div>
@endsection