@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Laporan Magang</h2>

    <p><strong>Nama Mahasiswa:</strong> {{ $laporan->pelamar->user->name }}</p>
    <p><strong>Lowongan:</strong> {{ $laporan->pelamar->lowongan->judul }}</p>
    <p><strong>Tanggal:</strong> {{ $laporan->tanggal }}</p>
    <p><strong>Isi Laporan:</strong><br>{{ $laporan->isi_laporan }}</p>

    <a href="{{ route('admin.laporan.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
