@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Perusahaan</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('admin.perusahaan.update', $perusahaan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $perusahaan->nama }}" required>
        </div>
        <div class="mb-3">
            <label>Tentang Perusahaan</label>
            <input type="text" name="tentang" class="form-control" value="{{ $perusahaan->tentang }}" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ $perusahaan->alamat }}" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $perusahaan->email }}" required>
        </div>
        <div class="mb-3">
            <label>No. Telepon</label>
            <input type="text" name="no_telepon" class="form-control" value="{{ $perusahaan->no_telepon }}" required>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
