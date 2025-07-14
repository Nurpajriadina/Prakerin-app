@extends('layouts.app')

@section('title', 'Dashboard Admin')

@push('styles')
<style>
  body {
    background-color: #f9ebf3;
    color: #2b2e6c;
  }

  .hero-section {
    padding: 80px 0;
  }

  .hero-section h1 {
    font-size: 2.5rem;
    font-weight: bold;
    color: #2b2e6c;
  }

  .hero-section p {
    font-size: 1.1rem;
    color: #2b2e6c;
  }

  .hero-image img {
    max-width: 100%;
    max-height: 320px;
    height: auto;
    border-radius: 12px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
  }

  .btn-primary {
    background-color: #312973;
    border-color: #312973;
  }

  .btn-primary:hover {
    background-color: #251e5d;
    border-color: #251e5d;
  }

  .stat-card {
    border: 1px solid #ddd;
    border-radius: 12px;
    padding: 30px;
    background: #fff;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    transition: transform 0.3s ease;
    height: 100%; /* Pastikan tinggi kolom sama */
    }


  .stat-card:hover {
    transform: translateY(-5px);
  }

  .stat-card h5,
  .stat-card p {
    color: #312973;
  }
</style>
@endpush

@section('content')

<!-- Hero Section -->
<section class="hero-section mb-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <h1 class="mb-4">Selamat datang di Dashboard Admin</h1>
        <p class="mb-4">Kelola data magang, perusahaan, pelamar, dan laporan secara mudah dan efisien.</p>
        @auth
          @if(!auth()->user()->hasRole('admin'))

          @endif
        @endauth
      </div>
      <div class="col-md-6 hero-image text-center">
        <img src="{{ asset('images/desk-animation.gif') }}" alt="Magang Illustration">
      </div>
    </div>
  </div>
</section>

<!-- Stats Section -->
<section class="py-5">
  <div class="container">
    <div class="row g-4 text-center">
      <div class="col-md-4">
        <div class="stat-card d-flex flex-column align-items-center justify-content-center text-center h-100">
          <div class="fs-1">📂</div>
          <h5 class="mt-3 mb-1">Lowongan tersedia</h5>
          <p class="fw-bold fs-5 mb-0">100+</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="stat-card d-flex flex-column align-items-center justify-content-center text-center h-100">
          <div class="fs-1">🎓</div>
          <h5 class="mt-3 mb-1">Alumni</h5>
          <p class="fw-bold fs-5 mb-0">50rb+</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="stat-card d-flex flex-column align-items-center justify-content-center text-center h-100">
          <div class="fs-1">✅</div>
          <h5 class="mt-3 mb-1">Curriculum Vitae</h5>
          <p class="fw-bold fs-5 mb-0">Otomatis</p>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
