@extends('layouts.frontend')

@section('title', 'Beranda')

@section('content')
<section class="hero-section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <h1 class="mb-4">Temukan kesempatan magang di berbagai perusahaan</h1>
        <p class="mb-4">Bergabung dengan kami hari ini dan temukan karir yang paling sesuai untuk Anda</p>
        <a href="{{ route('user.register') }}" class="btn btn-primary px-4 py-2">Daftar Sekarang</a>
      </div>
      <div class="col-md-6 hero-image text-center">
        <img src="{{ asset('images/desk-animation.gif') }}" alt="Magang Illustration" style="max-width: 100%; height: auto; border-radius: 12px;" />
      </div>
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="row g-4 text-center">
      <div class="col-md-4">
        <div class="stat-card">
          <div class="fs-1">📂</div>
          <h5 class="mt-3">Lowongan tersedia</h5>
          <p class="fw-bold fs-5">100+</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="stat-card">
          <div class="fs-1">🎓</div>
          <h5 class="mt-3">Alumni</h5>
          <p class="fw-bold fs-5">50rb+</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="stat-card">
          <div class="fs-1">✅</div>
          <h5 class="mt-3">Curriculum Vitae</h5>
          <p class="fw-bold fs-5">Otomatis</p>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
