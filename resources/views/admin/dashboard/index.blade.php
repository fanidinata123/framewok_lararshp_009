@extends('layouts.lte.main')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container-fluid">
  <h3 class="mb-4">Dashboard Admin</h3>

  <div class="row">
    <div class="col-md-3 col-sm-6 mb-3">
      <div class="small-box text-bg-info">
        <div class="inner">
          <h3>6</h3>
          <p>Jenis Hewan</p>
        </div>
        <a href="{{ route('admin.jenis-hewan.index') }}" class="small-box-footer">
          Lihat Data <i class="bi bi-arrow-right-circle"></i>
        </a>
      </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-3">
      <div class="small-box text-bg-success">
        <div class="inner">
          <h3>8</h3>
          <p>Kategori</p>
        </div>
        <a href="{{ route('admin.kategori.index') }}" class="small-box-footer">
          Lihat Data <i class="bi bi-arrow-right-circle"></i>
        </a>
      </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-3">
      <div class="small-box text-bg-warning">
        <div class="inner">
          <h3>2</h3>
          <p>Kategori Klinis</p>
        </div>
        <a href="{{ route('admin.kategori-klinis.index') }}" class="small-box-footer">
          Lihat Data <i class="bi bi-arrow-right-circle"></i>
        </a>
      </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-3">
      <div class="small-box text-bg-danger">
        <div class="inner">
          <h3>26</h3>
          <p>Kode Tindakan</p>
        </div>
        <a href="{{ route('admin.kode-tindakan.index') }}" class="small-box-footer">
          Lihat Data <i class="bi bi-arrow-right-circle"></i>
        </a>
      </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-3">
      <div class="small-box text-bg-primary">
        <div class="inner">
          <h3>2</h3>
          <p>Pemilik</p>
        </div>
        <a href="{{ route('admin.pemilik.index') }}" class="small-box-footer">
          Lihat Data <i class="bi bi-arrow-right-circle"></i>
        </a>
      </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-3">
      <div class="small-box text-bg-secondary">
        <div class="inner">
          <h3>1</h3>
          <p>Pet</p>
        </div>
        <a href="{{ route('admin.pet.index') }}" class="small-box-footer">
          Lihat Data <i class="bi bi-arrow-right-circle"></i>
        </a>
      </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-3">
      <div class="small-box text-bg-dark">
        <div class="inner">
          <h3>45</h3>
          <p>Ras Hewan</p>
        </div>
        <a href="{{ route('admin.ras-hewan.index') }}" class="small-box-footer">
          Lihat Data <i class="bi bi-arrow-right-circle"></i>
        </a>
      </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-3">
      <div class="small-box text-bg-success">
        <div class="inner">
          <h3>5</h3>
          <p>Role</p>
        </div>
        <a href="{{ route('admin.role.index') }}" class="small-box-footer">
          Lihat Data <i class="bi bi-arrow-right-circle"></i>
        </a>
      </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-3">
      <div class="small-box text-bg-danger">
        <div class="inner">
          <h3>13</h3>
          <p>Role User</p>
        </div>
        <a href="{{ route('admin.role-user.index') }}" class="small-box-footer">
          Lihat Data <i class="bi bi-arrow-right-circle"></i>
        </a>
      </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-3">
      <div class="small-box text-bg-primary">
        <div class="inner">
          <h3>10</h3>
          <p>User</p>
        </div>
        <a href="{{ route('admin.user.index') }}" class="small-box-footer">
          Lihat Data <i class="bi bi-arrow-right-circle"></i>
        </a>
      </div>
    </div>
  </div>
</div>
@endsection
