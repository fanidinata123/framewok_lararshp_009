@extends('layouts.lte.main_perawat')

@section('title', 'Profil Saya')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Informasi Profil -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Informasi Profil</h3>
                </div>
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="bi bi-person-circle" style="font-size: 100px; color: #007bff;"></i>
                    </div>
                    <h4>{{ $user->nama }}</h4>
                    <p class="text-muted">{{ $roleUser->nama_role ?? 'Perawat' }}</p>
                    <hr>
                    <div class="text-start">
                        <p><strong>Email:</strong><br>{{ $user->email }}</p>
                        @if($perawat)
                            <p><strong>No. HP:</strong><br>{{ $perawat->no_hp ?? '-' }}</p>
                            <p><strong>Pendidikan:</strong><br>{{ $perawat->pendidikan ?? '-' }}</p>
                            <p><strong>Jenis Kelamin:</strong><br>
                                @if($perawat->jenis_kelamin == 'L')
                                    Laki-laki
                                @elseif($perawat->jenis_kelamin == 'P')
                                    Perempuan
                                @else
                                    -
                                @endif
                            </p>
                        @endif
                        <p><strong>Status:</strong><br>
                            <span class="badge bg-success">Aktif</span>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Statistik -->
            <div class="card mt-3">
                <div class="card-header bg-info text-white">
                    <h3 class="card-title">Statistik</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 text-center">
                            <h3 class="text-primary">{{ $countRekamMedis }}</h3>
                            <p class="text-muted">Rekam Medis</p>
                        </div>
                        <div class="col-6 text-center">
                            <h3 class="text-success">{{ $countDetailRekamMedis }}</h3>
                            <p class="text-muted">Detail Tindakan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Edit Profil -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Profil</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('perawat.profil.update') }}" method="POST">
                        @csrf
                        
                        <h5 class="mb-3">Informasi Akun</h5>
                        
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('nama') is-invalid @enderror" 
                                   id="nama" 
                                   name="nama" 
                                   value="{{ old('nama', $user->nama) }}" 
                                   required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email', $user->email) }}" 
                                   required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr>
                        <h5 class="mb-3">Informasi Perawat</h5>

                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No. HP</label>
                            <input type="text" 
                                   class="form-control @error('no_hp') is-invalid @enderror" 
                                   id="no_hp" 
                                   name="no_hp" 
                                   value="{{ old('no_hp', $perawat->no_hp ?? '') }}"
                                   placeholder="Contoh: 081234567890">
                            @error('no_hp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="pendidikan" class="form-label">Pendidikan</label>
                            <input type="text" 
                                   class="form-control @error('pendidikan') is-invalid @enderror" 
                                   id="pendidikan" 
                                   name="pendidikan" 
                                   value="{{ old('pendidikan', $perawat->pendidikan ?? '') }}"
                                   placeholder="Contoh: D3 Keperawatan, S1 Kesehatan Hewan">
                            @error('pendidikan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select @error('jenis_kelamin') is-invalid @enderror" 
                                    id="jenis_kelamin" 
                                    name="jenis_kelamin">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="L" {{ old('jenis_kelamin', $perawat->jenis_kelamin ?? '') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ old('jenis_kelamin', $perawat->jenis_kelamin ?? '') == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" 
                                      id="alamat" 
                                      name="alamat" 
                                      rows="3"
                                      placeholder="Alamat lengkap">{{ old('alamat', $perawat->alamat ?? '') }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr>
                        <h5 class="mb-3">Ubah Password</h5>
                        <p class="text-muted">Kosongkan jika tidak ingin mengubah password</p>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password Baru</label>
                            <input type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   id="password" 
                                   name="password"
                                   placeholder="Minimal 6 karakter">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" 
                                   class="form-control" 
                                   id="password_confirmation" 
                                   name="password_confirmation"
                                   placeholder="Ulangi password baru">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('perawat.dashboard') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection