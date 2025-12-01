@extends('layouts.lte.main_resepsionis')

@section('title', 'Data Pemilik')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Pemilik</h3>
        <div class="card-tools">
            <a href="{{ route('resepsionis.pemilik.create') }}" class="btn btn-success btn-sm">
                <i class="bi bi-plus-circle"></i> Tambah Pemilik
            </a>
        </div>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>No. WhatsApp</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pemilik as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $p->user->nama ?? '-' }}</strong></td>
                        <td>
                            @if($p->no_wa)
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $p->no_wa) }}" target="_blank" class="text-success">
                                    <i class="bi bi-whatsapp"></i> {{ $p->no_wa }}
                                </a>
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $p->alamat ?? '-' }}</td>
                        <td class="text-nowrap">
                            <a href="{{ route('resepsionis.pemilik.edit', ['id' => $p->idpemilik]) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('resepsionis.pemilik.destroy') }}" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $p->idpemilik }}">
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data pemilik</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection