@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Lowongan</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('admin.lowongan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Perusahaan</label>
            <select name="perusahaan_id" class="form-control" required>
                <option value="">Pilih Perusahaan</option>
                @foreach($perusahaans as $perusahaan)
                    <option value="{{ $perusahaan->id }}">{{ $perusahaan->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi Pekerjaan</label>
            <textarea name="deskripsi_pekerjaan" class="form-control" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label>Lokasi Penempatan</label>
            <textarea name="lokasi_penempatan" class="form-control" rows="2" required></textarea>
        </div>
        <div class="mb-3">
            <label>Rincian Penugasan</label>
            <textarea name="rincian_penugasan" class="form-control" rows="3" required></textarea>
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
