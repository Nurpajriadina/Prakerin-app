@extends('layouts.app')
@section('title', 'Daftar Lowongan')

@section('content')
<div class="container">
    <h2 class="">Daftar Lowongan</h2>

    <a href="{{ route('admin.lowongan.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus me-1"></i> Tambah Lowongan
    </a>

    @if(session('success'))
        <div class="alert alert-success text-center" id="success-alert">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">Judul</th>
                <th class="text-center">Perusahaan</th>
                <th class="text-center">Deskripsi Pekerjaan</th>
                <th class="text-center">Lokasi Penempatan</th>
                <th class="text-center">Rincian Penugasan</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lowongans as $lowongan)
            <tr>
                <td class="text-start">{{ $lowongan->judul }}</td>
                <td class="text-start">{{ $lowongan->perusahaan->nama }}</td>
                <td class="text-start">{{ $lowongan->deskripsi_pekerjaan }}</td>
                <td class="text-start">{{ $lowongan->lokasi_penempatan }}</td>
                <td class="text-start">{{ $lowongan->rincian_penugasan }}</td>
                <td class="text-center">
                    <div class="d-flex justify-content-center gap-1">
                        {{-- Perbaikan typo: 'ladmin.owongan.show' menjadi 'admin.lowongan.show' --}}
                        {{-- Jika show tidak dipakai di admin, bisa dihapus tombol ini --}}
                        {{-- <a href="{{ route('admin.lowongan.show', $lowongan->id) }}" class="btn btn-info btn-sm" title="Lihat">
                            <i class="fas fa-eye"></i>
                        </a> --}}
                        <a href="{{ route('admin.lowongan.edit', $lowongan->id) }}" class="btn btn-warning btn-sm" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.lowongan.destroy', $lowongan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" title="Hapus">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- Notifikasi otomatis hilang --}}
<script>
    setTimeout(function () {
        const alert = document.getElementById('success-alert');
        if (alert) {
            alert.style.transition = 'opacity 0.5s ease-out';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        }
    }, 3000);
</script>
@endsection
