@extends('layouts.app')
@section('title', 'Laporan Magang')

@section('content')
<div class="container">
    <h2 class="">Laporan Magang</h2>

    <a href="{{ route('admin.laporan.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus me-1"></i> Tambah Laporan
    </a>

    @if(session('success'))
        <div class="alert alert-success text-center" id="success-alert">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">Nama Pelamar</th>
                <th class="text-center">Isi</th>
                <th class="text-center">Tanggal</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporans as $laporan)
            <tr>
                <td class="text-start">{{ $laporan->pelamar && $laporan->pelamar->user ? $laporan->pelamar->user->name : '-' }}</td>
                <td class="text-start">{{ Str::limit($laporan->isi_laporan, 50) }}</td>
                <td class="text-center">{{ $laporan->tanggal }}</td>
                <td class="text-center">
                    <div class="d-flex justify-content-center gap-1">
                        <a href="{{ route('admin.laporan.show', $laporan->id) }}" class="btn btn-info btn-sm" title="Lihat">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.laporan.edit', $laporan->id) }}" class="btn btn-warning btn-sm" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.laporan.destroy', $laporan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
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
