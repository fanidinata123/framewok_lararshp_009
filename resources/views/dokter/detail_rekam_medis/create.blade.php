@extends('layouts.lte.main_dokter')

@section('title', 'Tambah Detail Rekam Medis')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Detail Tindakan & Terapi</h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('dokter.detail-rekam-medis.store', ['idrekam_medis' => $rekam->idrekam_medis]) }}" 
                  method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Pet</label>
                            <input type="text" class="form-control" value="{{ $rekamMedis->pet->nama ?? '-' }}" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Pilih Kode Tindakan <span class="text-danger">*</span></label>
                            <select name="idkode_tindakan_terapi" class="form-control" required>
                                <option value="">-- Pilih Tindakan --</option>
                                @foreach($tindakan as $t)
                                    <option value="{{ $t->idkode_tindakan_terapi }}" {{ old('idkode_tindakan_terapi') == $t->idkode_tindakan_terapi ? 'selected' : '' }}>
                                        {{ $t->kode }} - {{ $t->deskripsi_tindakan_terapi }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Detail Tindakan</label>
                            <textarea name="detail" class="form-control" rows="4" placeholder="Masukkan detail tindakan atau catatan...">{{ old('detail') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <a href="{{ route('dokter.detail-rekam-medis.index', ['idrekam_medis' => $rekam->idrekam_medis]) }}" 
                       class="btn btn-secondary">
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