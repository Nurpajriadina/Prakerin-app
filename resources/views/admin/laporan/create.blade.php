@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Laporan Magang</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('admin.laporan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Pelamar</label>
            <select name="pelamar_id" class="form-control" required>
                <option value="">Pilih Pelamar</option>
                @foreach($pelamars as $pelamar)
                    <option value="{{ $pelamar->id }}">
                        {{ $pelamar->user->name }} - {{ $pelamar->lowongan->judul }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Isi Laporan</label>
            <textarea name="isi_laporan" class="form-control" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
