@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Pelamar</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('admin.pelamar.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Mahasiswa</label>
            <select name="user_id" class="form-control" required>
                <option value="">Pilih Mahasiswa</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Lowongan</label>
            <select name="lowongan_id" class="form-control" required>
                <option value="">Pilih Lowongan</option>
                @foreach($lowongans as $lowongan)
                    <option value="{{ $lowongan->id }}">{{ $lowongan->judul }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Tanggal Daftar</label>
            <input type="date" name="tanggal_daftar" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="pending">Pending</option>
                <option value="diterima">Diterima</option>
                <option value="ditolak">Ditolak</option>
            </select>
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
