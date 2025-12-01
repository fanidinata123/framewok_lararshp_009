@extends('layouts.lte.main_dokter')

@section('title', 'Dashboard Dokter')

@section('content')
<div class="container-fluid">

  <h3 class="mb-4">Dashboard Dokter</h3>

  <!-- STATISTIK -->
  <h5 class="mb-3">Statistik</h5>
  <div class="row">

    <div class="col-md-3 col-sm-6 mb-3">
      <div class="small-box text-bg-primary">
        <div class="inner">
          <h3>{{ $countPasien ?? 2 }}</h3>
          <p>Total Pasien</p>
        </div>
        <a href="{{ route('dokter.pasien.index') }}" class="small-box-footer">
          Lihat Data <i class="bi bi-arrow-right-circle"></i>
        </a>
      </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-3">
      <div class="small-box text-bg-info">
        <div class="inner">
          <h3>{{ $countTemuDokter ?? 2 }}</h3>
          <p>Total Temu Dokter</p>
        </div>
        <a href="{{ route('dokter.temu-dokter.index') }}" class="small-box-footer">
          Lihat Data <i class="bi bi-arrow-right-circle"></i>
        </a>
      </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-3">
      <div class="small-box text-bg-warning">
        <div class="inner">
          <h3>{{ $countRekamMedis ?? 1 }}</h3>
          <p>Rekam Medis</p>
        </div>
        <a href="{{ route('dokter.rekam-medis.index') }}" class="small-box-footer">
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
          <p class="text-muted">Anda login sebagai Dokter</p>
          <hr>
          <p>Sistem Informasi Klinik Hewan membantu Anda mengelola:</p>
          <ul>
            <li>Data pasien (hewan peliharaan)</li>
            <li>Jadwal temu dokter</li>
            <li>Rekam medis lengkap</li>
            <li>Detail tindakan dan terapi</li>
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
            <a href="{{ route('dokter.pasien.index') }}" class="list-group-item list-group-item-action">
              <i class="bi bi-bug"></i> Data Pasien
            </a>
            <a href="{{ route('dokter.temu-dokter.index') }}" class="list-group-item list-group-item-action">
              <i class="bi bi-calendar-check"></i> Jadwal Temu Dokter
            </a>
            <a href="{{ route('dokter.rekam-medis.index') }}" class="list-group-item list-group-item-action">
              <i class="bi bi-file-earmark-medical"></i> Rekam Medis
            </a>
            <a href="{{ route('dokter.profil') }}" class="list-group-item list-group-item-action">
              <i class="bi bi-person-circle"></i> Profil Saya
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- JADWAL TERBARU (Opsional - bisa diaktifkan jika ada data) -->
  @if(isset($temuTerbaru) && $temuTerbaru->count() > 0)
  <h5 class="mb-3 mt-4">Jadwal Temu Terbaru</h5>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>No Urut</th>
                  <th>Waktu Daftar</th>
                  <th>Nama Pet</th>
                  <th>Pemilik</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach($temuTerbaru as $temu)
                <tr>
                  <td>{{ $temu->no_urut }}</td>
                  <td>{{ \Carbon\Carbon::parse($temu->waktu_daftar)->format('d/m/Y H:i') }}</td>
                  <td>{{ $temu->nama_pet }}</td>
                  <td>{{ $temu->nama_pemilik }}</td>
                  <td>
                    @if($temu->status == 'Selesai')
                      <span class="badge bg-success">{{ $temu->status }}</span>
                    @elseif($temu->status == 'Menunggu')
                      <span class="badge bg-warning">{{ $temu->status }}</span>
                    @else
                      <span class="badge bg-info">{{ $temu->status }}</span>
                    @endif
                  </td>
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