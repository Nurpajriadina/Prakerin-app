<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>PRAKERIN - Sistem Magang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .hero-section {
      padding: 80px 0;
    }
    .hero-section h1 {
      font-size: 2.5rem;
      font-weight: bold;
    }
    .hero-section p {
      font-size: 1.1rem;
    }
    .hero-image img {
      max-width: 100%;
      height: auto;
    }
    .stat-card {
      border: 1px solid #ddd;
      border-radius: 10px;
      padding: 20px;
      background: #fff;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">PrakerinApp</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="{{ route('public.lowongan.index') }}">Lowongan</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('public.perusahaan.index') }}">Perusahaan</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard.index')}}">Dashboard</a></li>
        <li class="nav-item">
          <a href="{{ route('login') }}" class="btn btn-light text-primary ms-3">Masuk</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<section class="hero-section bg-light">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <h1 class="mb-4">Temukan kesempatan magang di berbagai perusahaan</h1>
        <p class="mb-4">Bergabung dengan kami hari ini dan temukan karir yang paling sesuai untuk Anda</p>
        <a href="#" class="btn btn-primary px-4 py-2">Daftar Sekarang</a>
      </div>
      <div class="col-md-6 hero-image text-center">
        <img src="https://pin.it/2raOfQFzp" alt="Magang Illustration">
      </div>
    </div>
  </div>
</section>

<!-- Stats Section -->
<section class="py-5">
  <div class="container">
    <div class="row g-4 text-center">
      <div class="col-md-4">
        <div class="stat-card">
          <div class="fs-1">📂</div>
          <h5 class="mt-3">Lowongan tersedia</h5>
          <p class="text-primary fw-bold fs-5">100+</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="stat-card">
          <div class="fs-1">🎓</div>
          <h5 class="mt-3">Alumni</h5>
          <p class="text-primary fw-bold fs-5">50rb+</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="stat-card">
          <div class="fs-1">✅</div>
          <h5 class="mt-3">Curriculum Vitae</h5>
          <p class="text-danger fw-bold fs-5">Otomatis</p>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
