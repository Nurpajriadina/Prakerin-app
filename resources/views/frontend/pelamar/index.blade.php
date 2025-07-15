@extends('layouts.frontend')
@section('title', 'Pelamaran Saya')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Pelamaran Saya</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Lowongan</th>
                <th>Status</th>
                <th>Tanggal Daftar</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pelamars as $pelamar)
                <tr>
                    <td>{{ $pelamar->lowongan->judul ?? '-' }}</td>
                    <td>
                        @if($pelamar->status == 'pending')
                            <span class="badge bg-warning text-dark">Pending</span>
                        @elseif($pelamar->status == 'diterima')
                            <span class="badge bg-success">Diterima</span>
                        @elseif($pelamar->status == 'ditolak')
                            <span class="badge bg-danger">Ditolak</span>
                        @endif
                    </td>
                    <td>{{ $pelamar->created_at->format('d-m-Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Belum ada pelamaran.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
