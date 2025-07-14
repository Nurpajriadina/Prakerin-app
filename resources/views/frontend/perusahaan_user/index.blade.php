@extends('layouts.frontend')

@section('title', 'Daftar Mitra Perusahaan')

@section('content')
<div class="container py-4">
    <h4 class="mb-3">Menampilkan {{ $perusahaans->count() }} mitra yang terdaftar</h4>

    <div class="row">
        @forelse ($perusahaans as $perusahaan)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        @if ($perusahaan->logo)
                            <img src="{{ asset('storage/' . $perusahaan->logo) }}" alt="{{ $perusahaan->nama }}" class="img-fluid mb-3" style="max-height: 60px;">
                        @endif
                        <h5 class="card-title">{{ $perusahaan->nama }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($perusahaan->tentang, 80) }}</p>
                        <a href="{{ route('frontend.perusahaan.show', $perusahaan->id) }}" class="btn btn-primary btn-sm w-100">
                            Lihat Profil
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-muted">Belum ada perusahaan terdaftar.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
