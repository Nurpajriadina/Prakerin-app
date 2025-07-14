@extends('layouts.app')
@section('title', 'Daftar Perusahaan')

@section('content')
<div class="container">
    <h2 class="">Daftar Perusahaan</h2>

    <a href="{{ route('admin.perusahaan.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus me-1"></i> Tambah Perusahaan
    </a>

    @if(session('success'))
        <div class="alert alert-success text-center" id="success-alert">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">Nama</th>
                <th class="text-center">Tentang</th>
                <th class="text-center">Alamat</th>
                <th class="text-center">Telepon</th>
                <th class="text-center">Email</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($perusahaans as $perusahaan)
            <tr>
                <td class="text-start">{{ $perusahaan->nama }}</td>
                <td class="text-start">{{ $perusahaan->tentang }}</td>
                <td class="text-start">{{ $perusahaan->alamat }}</td>
                <td class="text-start">{{ $perusahaan->no_telepon }}</td>
                <td class="text-start">{{ $perusahaan->email }}</td>
                <td class="text-center">
                    <div class="d-flex justify-content-center gap-1">
                        <a href="{{ route('admin.perusahaan.show', $perusahaan->id) }}" class="btn btn-info btn-sm" title="Lihat">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.perusahaan.edit', $perusahaan->id) }}" class="btn btn-warning btn-sm" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.perusahaan.destroy', $perusahaan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
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
    }, 1000); // 1 detik
</script>
@endsection
