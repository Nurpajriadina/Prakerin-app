@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Lowongan</h2>

    <p><strong>Perusahaan:</strong> {{ $lowongan->perusahaan->nama }}</p>
    <p><strong>Judul:</strong> {{ $lowongan->judul }}</p>
    <p><strong>Deskripsi Pekerjaan:</strong><br>{{ $lowongan->deskripsi_pekerjaan}}</p>
    <p><strong>Lokasi Penempatan:</strong> {{ $lowongan->lokasi_penempatan}}</p>
    <p><strong>Rincian Penugasan:</strong> {{ $lowongan->rincian_penugasan}}</p>

    <a href="{{ route('admin.lowongan.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
