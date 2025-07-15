@extends('layouts.app')

@section('title', 'Detail Lowongan')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">{{ $lowongan->judul }}</h4>
        </div>
        <div class="card-body">
            <h5 class="mb-3">Deskripsi Pekerjaan</h5>
            <p>{{ $lowongan->deskripsi_pekerjaan }}</p>

            <h5 class="mt-4">Lokasi Penempatan</h5>
            <p>{{ $lowongan->lokasi_penempatan }}</p>

            <h5 class="mt-4">Rincian Penugasan</h5>
            <p>{{ $lowongan->rincian_penugasan }}</p>

            <hr>

            <h5 class="mt-4">Informasi Perusahaan</h5>
            <p><strong>Nama:</strong> {{ $lowongan->perusahaan->nama }}</p>
            <p><strong>Alamat:</strong> {{ $lowongan->perusahaan->alamat }}</p>
            <p><strong>Email:</strong> {{ $lowongan->perusahaan->email }}</p>
            <p><strong>No Telepon:</strong> {{ $lowongan->perusahaan->no_telepon }}</p>
            @if($lowongan->perusahaan->tentang)
                <p><strong>Tentang Perusahaan:</strong> {{ $lowongan->perusahaan->tentang }}</p>
            @endif
        </div>
    </div>

    <div class="mt-4">
    </div>
</div>
@endsection
