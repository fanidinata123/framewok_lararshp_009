@extends('layouts.lte.main_dokter')

@section('title', 'Edit Detail Tindakan & Terapi')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Detail Tindakan & Terapi</h3>
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

            <form action="{{ route('dokter.detail-rekam-medis.update') }}" method="POST">
                @csrf
                <input type="hidden" name="iddetail_rekam_medis" value="{{ $detail->iddetail_rekam_medis }}">
                <input type="hidden" name="idrekam_medis" value="{{ $detail->idrekam_medis }}">

                <div class="mb-3">
                    <label class="form-label">Pet</label>
                    <input type="text" class="form-control" value="{{ $detail->rekamMedis->pet->nama ?? '-' }}" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pilih Kode Tindakan <span class="text-danger">*</span></label>
                    <select name="idkode_tindakan_terapi" class="form-select" required>
                        <option value="">-- Pilih Tindakan --</option>
                        @foreach($tindakan as $t)
                            <option value="{{ $t->idkode_tindakan_terapi }}" 
                                    @if($detail->idkode_tindakan_terapi == $t->idkode_tindakan_terapi) selected @endif>
                                {{ $t->kode }} - {{ $t->deskripsi_tindakan_terapi }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Detail Tindakan</label>
                    <textarea name="detail" class="form-control" rows="4">{{ old('detail', $detail->detail) }}</textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('dokter.detail-rekam-medis.index', ['idrekam_medis' => $detail->idrekam_medis]) }}" 
                       class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection