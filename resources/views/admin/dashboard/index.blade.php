@extends('layouts.app')

@section('content')
<style>
    .btn-outline-purple {
        color: #6f42c1;
        border: 1px solid #6f42c1;
        background-color: transparent;
    }

    .btn-outline-purple:hover {
        color: #fff;
        background-color: #6f42c1;
        border-color: #6f42c1;
    }
</style>

<div class="container mt-5 text-center">
    <h2 class="mb-4">Kelola Data</h2>

    <div class="d-grid gap-3 col-6 mx-auto">
        <a href="{{ route('admin.dashboard.semua') }}" class="btn btn-outline-purple btn-lg">📋 Semua Pendaftar</a>
        <a href="{{ route('admin.dashboard.diterima') }}" class="btn btn-outline-success btn-lg">✅ Pendaftar Diterima</a>
    </div>
</div>
@endsection
