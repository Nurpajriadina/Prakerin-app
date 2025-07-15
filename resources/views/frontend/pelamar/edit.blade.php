@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Pelamar</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('admin.pelamar.update', $pelamar->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Mahasiswa</label>
            <select name="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $pelamar->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Lowongan</label>
            <select name="lowongan_id" class="form-control" required>
                @foreach($lowongans as $lowongan)
                    <option value="{{ $lowongan->id }}" {{ $pelamar->lowongan_id == $lowongan->id ? 'selected' : '' }}>
                        {{ $lowongan->judul }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Tanggal Daftar</label>
            <input type="date" name="tanggal_daftar" class="form-control" value="{{ $pelamar->tanggal_daftar }}" required>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="pending" {{ $pelamar->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="diterima" {{ $pelamar->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                <option value="ditolak" {{ $pelamar->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
