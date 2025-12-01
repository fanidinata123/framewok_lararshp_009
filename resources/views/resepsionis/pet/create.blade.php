@extends('layouts.lte.main_resepsionis')

@section('title', 'Tambah Pet')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Form Tambah Pet</h3>
    </div>
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('resepsionis.pet.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Pet <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>
                @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                @error('tanggal_lahir')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="warna_tanda" class="form-label">Warna/Tanda</label>
                <input type="text" class="form-control @error('warna_tanda') is-invalid @enderror" id="warna_tanda" name="warna_tanda" value="{{ old('warna_tanda') }}">
                @error('warna_tanda')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="">-- Pilih --</option>
                    <option value="J" {{ old('jenis_kelamin') == 'J' ? 'selected' : '' }}>Jantan</option>
                    <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Betina</option>
                </select>
                @error('jenis_kelamin')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="idpemilik" class="form-label">Pemilik <span class="text-danger">*</span></label>
                <select class="form-select @error('idpemilik') is-invalid @enderror" id="idpemilik" name="idpemilik" required>
                    <option value="">-- Pilih Pemilik --</option>
                    @foreach($pemilik as $p)
                        <option value="{{ $p->idpemilik }}" {{ old('idpemilik') == $p->idpemilik ? 'selected' : '' }}>
                            {{ $p->user->nama ?? '-' }} ({{ $p->no_wa ?? '-' }})
                        </option>
                    @endforeach
                </select>
                @error('idpemilik')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="idras_hewan" class="form-label">Ras Hewan <span class="text-danger">*</span></label>
                <select class="form-select @error('idras_hewan') is-invalid @enderror" id="idras_hewan" name="idras_hewan" required>
                    <option value="">-- Pilih Ras --</option>
                    @foreach($rasHewan as $ras)
                        <option value="{{ $ras->idras_hewan }}" {{ old('idras_hewan') == $ras->idras_hewan ? 'selected' : '' }}>
                            {{ $ras->nama_ras }} ({{ $ras->jenisHewan->nama_jenis_hewan ?? '-' }})
                        </option>
                    @endforeach
                </select>
                @error('idras_hewan')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('resepsionis.pet.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection