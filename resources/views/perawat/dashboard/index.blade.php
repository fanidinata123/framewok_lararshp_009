@extends('layouts.lte.main_perawat')

@section('title', 'Dashboard Perawat')

@section('content')
<div class="container-fluid">

  <h3 class="mb-4">Dashboard Perawat</h3>

  <!-- STATISTIK -->
  <h5 class="mb-3">Statistik</h5>
  <div class="row">

    <div class="col-md-3 col-sm-6 mb-3">
      <div class="small-box text-bg-primary">
        <div class="inner">
          <h3>{{ $countPasien ?? 0 }}</h3>
          <p>Total Pasien</p>
        </div>
        <a href="{{ route('perawat.pasien.index') }}" class="small-box-footer">
          Lihat Data <i class="bi bi-arrow-right-circle"></i>
        </a>
      </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-3">
      <div class="small-box text-bg-warning">
        <div class="inner">
          <h3>{{ $countRekamMedis ?? 0 }}</h3>
          <p>Rekam Medis</p>
        </div>
        <a href="{{ route('perawat.rekam-medis.index') }}" class="small-box-footer">
          Lihat Data <i class="bi bi-arrow-right-circle"></i>
        </a>
      </div>
    </div>

  </div>

  <!-- INFORMASI TAMBAHAN -->
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header bg-primary text-white">
          <h3 class="card-title">Selamat Datang</h3>
        </div>
        <div class="card-body">
          <h5>Halo, {{ Auth::user()->nama }}!</h5>
          <p class="text-muted">Anda login sebagai Perawat</p>
          <hr>
          <p>Sistem Informasi Klinik Hewan membantu Anda mengelola:</p>
          <ul>
            <li>Data pasien (hewan peliharaan)</li>
            <li>Rekam medis lengkap (CRUD)</li>
            <li>Detail tindakan dan terapi (View)</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card">
        <div class="card-header bg-info text-white">
          <h3 class="card-title">Quick Links</h3>
        </div>
        <div class="card-body">
          <div class="list-group">
            <a href="{{ route('perawat.pasien.index') }}" class="list-group-item list-group-item-action">
              <i class="bi bi-bug"></i> Data Pasien
            </a>
            <a href="{{ route('perawat.rekam-medis.index') }}" class="list-group-item list-group-item-action">
              <i class="bi bi-file-earmark-medical"></i> Rekam Medis
            </a>
            <a href="{{ route('perawat.profil') }}" class="list-group-item list-group-item-action">
              <i class="bi bi-person-circle"></i> Profil Saya
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- REKAM MEDIS TERBARU -->
  @if(isset($rekamTerbaru) && $rekamTerbaru->count() > 0)
  <h5 class="mb-3 mt-4">Rekam Medis Terbaru</h5>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Tanggal</th>
                  <th>Nama Pet</th>
                  <th>Pemilik</th>
                  <th>Diagnosa</th>
                </tr>
              </thead>
              <tbody>
                @foreach($rekamTerbaru as $rekam)
                <tr>
                  <td>{{ \Carbon\Carbon::parse($rekam->created_at)->format('d/m/Y') }}</td>
                  <td>{{ $rekam->nama_pet }}</td>
                  <td>{{ $rekam->nama_pemilik }}</td>
                  <td>{{ Str::limit($rekam->diagnosa, 50) }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif

</div>
@endsection