@extends('layouts.lte.main_resepsionis')

@section('title', 'Tambah Pemilik')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Form Tambah Pemilik</h3>
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

        <form action="{{ route('resepsionis.pemilik.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="iduser" class="form-label">Pilih User <span class="text-danger">*</span></label>
                <select class="form-select @error('iduser') is-invalid @enderror" id="iduser" name="iduser" required>
                    <option value="">-- Pilih User --</option>
                    @foreach($user as $u)
                        <option value="{{ $u->iduser }}" {{ old('iduser') == $u->iduser ? 'selected' : '' }}>
                            {{ $u->nama }} ({{ $u->email }})
                        </option>
                    @endforeach
                </select>
                @error('iduser')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="no_wa" class="form-label">Nomor WhatsApp <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('no_wa') is-invalid @enderror" id="no_wa" name="no_wa" value="{{ old('no_wa') }}" placeholder="Contoh: 081234567890" required>
                @error('no_wa')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap" required>{{ old('alamat') }}</textarea>
                @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('resepsionis.pemilik.index') }}" class="btn btn-secondary">
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