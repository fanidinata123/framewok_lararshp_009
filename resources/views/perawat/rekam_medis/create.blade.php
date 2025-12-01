@extends('layouts.lte.main_perawat')

@section('title', 'Tambah Rekam Medis')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Rekam Medis</h3>
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

            <form action="{{ route('perawat.rekam-medis.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" 
                           class="form-control @error('tanggal') is-invalid @enderror" 
                           id="tanggal" 
                           name="tanggal" 
                           value="{{ old('tanggal', date('Y-m-d')) }}">
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="idpet" class="form-label">Pilih Pet <span class="text-danger">*</span></label>
                    <select class="form-select @error('idpet') is-invalid @enderror" 
                            id="idpet" 
                            name="idpet" 
                            required>
                        <option value="">-- Pilih Pet --</option>
                        @foreach($pets as $pet)
                            <option value="{{ $pet->idpet }}" {{ old('idpet') == $pet->idpet ? 'selected' : '' }}>
                                {{ $pet->nama }} 
                                @if($pet->pemilik && $pet->pemilik->user)
                                    ({{ $pet->pemilik->user->nama }})
                                @endif
                            </option>
                        @endforeach
                    </select>
                    @error('idpet')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="dokter_pemeriksa" class="form-label">Dokter Pemeriksa <span class="text-danger">*</span></label>
                    <select class="form-select @error('dokter_pemeriksa') is-invalid @enderror" 
                            id="dokter_pemeriksa" 
                            name="dokter_pemeriksa" 
                            required>
                        <option value="">-- Pilih Dokter --</option>
                        @foreach($dokters as $dokter)
                            {{-- PERBAIKAN: Cek apakah idrole_user ada atau gunakan iduser --}}
                            @php
                                $dokter_id = $dokter->idrole_user ?? $dokter->iduser;
                            @endphp
                            <option value="{{ $dokter_id }}" {{ old('dokter_pemeriksa') == $dokter_id ? 'selected' : '' }}>
                                {{ $dokter->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('dokter_pemeriksa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="idreservasi_dokter" class="form-label">Temu Dokter (Opsional)</label>
                    <select class="form-select @error('idreservasi_dokter') is-invalid @enderror" 
                            id="idreservasi_dokter" 
                            name="idreservasi_dokter">
                        <option value="">-- Pilih Temu Dokter --</option>
                        @foreach($temus as $temu)
                            <option value="{{ $temu->idreservasi_dokter }}" {{ old('idreservasi_dokter') == $temu->idreservasi_dokter ? 'selected' : '' }}>
                                No. {{ $temu->no_urut ?? '-' }} - {{ $temu->pet->nama ?? '-' }}
                            </option>
                        @endforeach
                    </select>
                    @error('idreservasi_dokter')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="anamnesa" class="form-label">Anamnesa</label>
                    <textarea class="form-control @error('anamnesa') is-invalid @enderror" 
                              id="anamnesa" 
                              name="anamnesa" 
                              rows="3"
                              placeholder="Keluhan atau gejala yang dialami">{{ old('anamnesa') }}</textarea>
                    @error('anamnesa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="temuan_klinis" class="form-label">Temuan Klinis</label>
                    <textarea class="form-control @error('temuan_klinis') is-invalid @enderror" 
                              id="temuan_klinis" 
                              name="temuan_klinis" 
                              rows="3"
                              placeholder="Hasil pemeriksaan klinis">{{ old('temuan_klinis') }}</textarea>
                    @error('temuan_klinis')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="diagnosa" class="form-label">Diagnosa</label>
                    <textarea class="form-control @error('diagnosa') is-invalid @enderror" 
                              id="diagnosa" 
                              name="diagnosa" 
                              rows="3"
                              placeholder="Diagnosa penyakit">{{ old('diagnosa') }}</textarea>
                    @error('diagnosa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('perawat.rekam-medis.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection