@extends('layouts.frontend')
@section('title', $lowongan->judul)

@section('content')
    <div class="mb-4">
        <h2>{{ $lowongan->judul }}</h2>
        <span class="badge bg-primary">{{ $lowongan->kategori }}</span>
    </div>

    <div class="row mb-4">
        <div class="col-md-8">
            <h5>Tentang Perusahaan</h5>
            <p>{{ $lowongan->mitra->deskripsi }}</p>
        </div>
        <div class="col-md-4">
            <h5>Informasi Kontak</h5>
            <ul class="list-unstyled">
                <li><strong>Nama:</strong> {{ $lowongan->mitra->kontak_nama }}</li>
                <li><strong>Email:</strong> {{ $lowongan->mitra->kontak_email }}</li>
                <li><strong>Alamat:</strong> {{ $lowongan->mitra->alamat }}</li>
            </ul>
        </div>
    </div>

    <div>
        <h5>Deskripsi Lowongan</h5>
        <p>{{ $lowongan->deskripsi }}</p>
    </div>
@endsection
