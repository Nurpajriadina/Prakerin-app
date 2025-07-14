@extends('layouts.frontend')

@section('title', $perusahaan->nama)

@section('content')
<div class="container py-4">
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <div class="d-flex align-items-center mb-3">
                @if ($perusahaan->logo)
                    <img src="{{ asset('storage/' . $perusahaan->logo) }}" alt="{{ $perusahaan->nama }}" class="me-3" style="height: 60px;">
                @endif
                <h4 class="mb-0">{{ $perusahaan->nama }}</h4>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <h5><i class="bi bi-info-circle-fill me-2 text-primary"></i>Tentang Perusahaan</h5>
                    <p>{{ $perusahaan->tentang ?? '-' }}</p>
                </div>
                <div class="col-md-4">
                    <h5><i class="bi bi-person-lines-fill me-2 text-primary"></i>Informasi Kontak</h5>
                    <p><strong>Nama:</strong> {{ $perusahaan->kontak_nama ?? '-' }}</p>
                    <p><strong>Email:</strong>
                        @if($perusahaan->kontak_email)
                            <a href="mailto:{{ $perusahaan->kontak_email }}">{{ $perusahaan->kontak_email }}</a>
                        @else
                            -
                        @endif
                    </p>
                    <p><strong>Alamat:</strong> {{ $perusahaan->alamat ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>

    <h5 class="mb-3"><i class="bi bi-briefcase-fill text-success me-2"></i>Lowongan yang Tersedia di Mitra ini</h5>
    <div class="row">
        @forelse ($perusahaan->lowongans as $lowongan)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title">{{ $lowongan->judul }}</h6>
                        <span class="badge bg-light text-primary border">{{ $lowongan->kategori }}</span>
                        <a href="{{ route('user.lowongan.show', $lowongan->id) }}" class="btn btn-primary btn-sm mt-3 w-100">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-muted">Belum ada lowongan tersedia untuk mitra ini.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
