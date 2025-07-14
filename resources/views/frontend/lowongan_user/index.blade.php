@extends('layouts.frontend')

@section('title', 'Daftar Lowongan')

@section('content')
    <div class="container py-5">
        <h3 class="mb-4">Daftar Lowongan Magang</h3>

        @if($lowongans->isEmpty())
            <div class="alert alert-info">
                Belum ada lowongan tersedia saat ini.
            </div>
        @else
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($lowongans as $lowongan)
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">{{ $lowongan->judul }}</h5>
                                <p class="text-muted mb-1">Perusahaan: {{ $lowongan->perusahaan->nama }}</p>
                                <p class="text-muted mb-2">Lokasi: {{ $lowongan->lokasi_penempatan }}</p>
                                <a href="{{ route('user.lowongan.show', $lowongan->id) }}" class="btn btn-primary">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
