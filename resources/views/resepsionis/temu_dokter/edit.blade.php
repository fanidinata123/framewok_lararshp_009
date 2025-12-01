@extends('layouts.lte.main_resepsionis')

@section('title', 'Edit Temu Dokter')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Form Edit Temu Dokter</h3>
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

        <form action="{{ route('resepsionis.temu-dokter.update') }}" method="POST">
            @csrf
            <input type="hidden" name="idreservasi_dokter" value="{{ $item->idreservasi_dokter }}">
            
            <div class="mb-3">
                <label for="idpet" class="form-label">Pilih Pet <span class="text-danger">*</span></label>
                <select class="form-select @error('idpet') is-invalid @enderror" id="idpet" name="idpet" required>
                    <option value="">-- Pilih Pet --</option>
                    @foreach($pets as $p)
                        <option value="{{ $p->idpet }}" {{ old('idpet', $item->idpet) == $p->idpet ? 'selected' : '' }}>
                            {{ $p->nama }} - {{ $p->pemilik->user->nama ?? '-' }}
                        </option>
                    @endforeach
                </select>
                @error('idpet')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="idrole_user" class="form-label">Pilih Dokter <span class="text-danger">*</span></label>
                <select class="form-select @error('idrole_user') is-invalid @enderror" id="idrole_user" name="idrole_user" required>
                    <option value="">-- Pilih Dokter --</option>
                    @foreach($dokters as $d)
                        <option value="{{ $d->idrole_user }}" {{ old('idrole_user', $item->idrole_user) == $d->idrole_user ? 'selected' : '' }}>
                            {{ $d->nama }}
                        </option>
                    @endforeach
                </select>
                @error('idrole_user')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                    <option value="0" {{ old('status', $item->status) == '0' ? 'selected' : '' }}>Menunggu</option>
                    <option value="1" {{ old('status', $item->status) == '1' ? 'selected' : '' }}>Selesai</option>
                    <option value="2" {{ old('status', $item->status) == '2' ? 'selected' : '' }}>Batal</option>
                </select>
                @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('resepsionis.temu-dokter.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-warning">
                    <i class="bi bi-save"></i> Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection