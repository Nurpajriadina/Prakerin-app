@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Laporan</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('admin.laporan.update', $laporan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Pelamar</label>
            <select name="pelamar_id" class="form-control" required>
                @foreach($pelamars as $pelamar)
                    <option value="{{ $pelamar->id }}" {{ $laporan->pelamar_id == $pelamar->id ? 'selected' : '' }}>
                        {{ $pelamar->user->name }} - {{ $pelamar->lowongan->judul }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Isi Laporan</label>
            <textarea name="isi_laporan" class="form-control" rows="4" required>{{ $laporan->isi_laporan }}</textarea>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $laporan->tanggal }}" required>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
