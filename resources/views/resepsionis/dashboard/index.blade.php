@extends('layouts.lte.main_resepsionis')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <!-- Total Pet -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $totalPet }}</h3>
                <p>Total Pet</p>
            </div>
            <div class="icon">
                <i class="bi bi-badge-vr"></i>
            </div>
            <a href="{{ route('resepsionis.pet.index') }}" class="small-box-footer">
                Lihat Detail <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <!-- Total Pemilik -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $totalPemilik }}</h3>
                <p>Total Pemilik</p>
            </div>
            <div class="icon">
                <i class="bi bi-people"></i>
            </div>
            <a href="{{ route('resepsionis.pemilik.index') }}" class="small-box-footer">
                Lihat Detail <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <!-- Temu Menunggu -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $temuMenunggu }}</h3>
                <p>Temu Menunggu</p>
            </div>
            <div class="icon">
                <i class="bi bi-hourglass-split"></i>
            </div>
            <a href="{{ route('resepsionis.temu-dokter.index') }}" class="small-box-footer">
                Lihat Detail <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <!-- Temu Hari Ini -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $temuHariIni }}</h3>
                <p>Temu Hari Ini</p>
            </div>
            <div class="icon">
                <i class="bi bi-calendar-check"></i>
            </div>
            <a href="{{ route('resepsionis.temu-dokter.index') }}" class="small-box-footer">
                Lihat Detail <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

<!-- Info Box -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="bi bi-info-circle"></i> Selamat Datang di Panel Resepsionis
                </h3>
            </div>
            <div class="card-body">
                <p>Anda dapat mengelola data pet, pemilik, dan temu dokter dari panel ini.</p>
                <ul>
                    <li><strong>Data Pet:</strong> Kelola informasi hewan peliharaan</li>
                    <li><strong>Data Pemilik:</strong> Kelola informasi pemilik hewan</li>
                    <li><strong>Temu Dokter:</strong> Kelola jadwal konsultasi dengan dokter</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection