<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>PRAKERIN - Sistem Magang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #f9ebf3; color: #2b2e6c; }
    .hero-section { padding: 80px 0; }
    .hero-section h1 { font-size: 2.5rem; font-weight: bold; color: #2b2e6c; }
    .hero-section p { font-size: 1.1rem; color: #2b2e6c; }
    .hero-image img { max-width: 100%; height: auto; }
    .btn-primary { background-color: #312973; border-color: #312973; }
    .btn-primary:hover { background-color: #251e5d; border-color: #251e5d; }
    .btn-login-custom {
      background-color: #6f42c1;
      color: #fff !important;
      padding: 6px 16px;
      font-size: 14px;
      font-weight: 500;
      border: none;
      border-radius: 8px;
      text-decoration: none !important;
      transition: background-color 0.3s ease;
    }
    .btn-login-custom:hover {
      background-color: #5a359d;
      color: #fff !important;
    }
    .navbar-dark .navbar-nav .nav-link { color: #e5e5f5; transition: color 0.3s ease; }
    .navbar-dark .navbar-nav .nav-link:hover { color: #ffffff; }
    .stat-card {
      border: 1px solid #ddd;
      border-radius: 10px;
      padding: 20px;
      background: #fff;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }
    .stat-card h5, .stat-card p { color: #312973; }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #312973;">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ url('/') }}">PrakerinApp</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
        @auth
          @if(Auth::user()->level === 'user')
            <li class="nav-item"><a class="nav-link" href="{{ route('user.lowongan.index') }}">Lowongan</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('user.perusahaan.index') }}">Perusahaan</a></li>
          @elseif(Auth::user()->level === 'admin')
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.lowongan.index') }}">Lowongan</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.perusahaan.index') }}">Perusahaan</a></li>
          @endif

          <li class="nav-item dropdown ms-3">
            <a class="nav-link dropdown-toggle btn-login-custom" href="#" role="button" data-bs-toggle="dropdown">
              {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <form method="POST" action="{{ route('logout') }}" class="ms-3">
                  @csrf
                  <button class="dropdown-item" type="submit">Logout</button>
                </form>
              </li>
            </ul>
          </li>
        @else
          <li class="nav-item"><a class="nav-link" href="{{ route('frontend.lowongan') }}">Lowongan</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('frontend.perusahaan') }}">Perusahaan</a></li>
          <li class="nav-item">
            <a href="{{ route('login') }}" class="btn-login-custom ms-3">Masuk</a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>

<!-- Konten dari halaman akan ditampilkan di sini -->
@yield('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
