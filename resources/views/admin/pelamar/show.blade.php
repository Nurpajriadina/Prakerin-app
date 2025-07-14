@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Pelamar</h2>

    <p><strong>Nama Mahasiswa:</strong> {{ $pelamar->user->name }}</p>
    <p><strong>Email Mahasiswa:</strong> {{ $pelamar->user->email }}</p>
    <p><strong>Lowongan:</strong> {{ $pelamar->lowongan->judul }}</p>
    <p><strong>Tanggal Daftar:</strong> {{ $pelamar->tanggal_daftar }}</p>
    <p><strong>Status:</strong> {{ ucfirst($pelamar->status) }}</p>

    <a href="{{ route('admin.pelamar.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
