@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Perusahaan</h2>

    <p><strong>Nama:</strong> {{ $perusahaan->nama }}</p>
    <p><strong>Tentang Perusahaan:</strong> {{ $perusahaan->tentang }}</p>
    <p><strong>Alamat:</strong> {{ $perusahaan->alamat }}</p>
    <p><strong>Email:</strong> {{ $perusahaan->email }}</p>
    <p><strong>No. Telepon:</strong> {{ $perusahaan->no_telepon }}</p>

    <a href="{{ route('admin.perusahaan.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
