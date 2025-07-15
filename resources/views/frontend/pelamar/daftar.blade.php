@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Form Pendaftaran Magang</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.pelamar.daftar.simpan') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Aktif</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}" required>
        </div>

        <div class="mb-3">
            <label for="sekolah" class="form-label">Pendidikan Terakhir</label>
            <input type="text" name="sekolah" class="form-control" value="{{ old('sekolah') }}" required>
        </div>

        <div class="mb-3">
            <label for="lowongan_id" class="form-label">Pilih Lowongan</label>
            <select name="lowongan_id" class="form-control" required>
                <option value="">-- Pilih Lowongan --</option>
                @foreach($lowongans as $lowongan)
                    <option value="{{ $lowongan->id }}" {{ old('lowongan_id') == $lowongan->id ? 'selected' : '' }}>
                        {{ $lowongan->judul }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Kirim Pendaftaran</button>
    </form>
</div>
@endsection
