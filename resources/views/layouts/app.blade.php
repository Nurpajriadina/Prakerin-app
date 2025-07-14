<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'PrakerinApp')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    body {
      background-color: #f9ebf3;
      color: #2b2e6c;
    }
    .btn-primary {
      background-color: #312973;
      border-color: #312973;
    }
    .btn-primary:hover {
      background-color: #251e5d;
      border-color: #251e5d;
    }
    .navbar-nav .nav-link:hover {
      color: #e0d6ff !important;
    }
    .btn-login-custom {
      background: linear-gradient(to bottom, #7d3c98, #5e337a);
      color: #e6d5f7;
      padding: 6px 18px;
      border: none;
      border-radius: 30px;
      font-size: 14px;
      font-weight: 500;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      box-shadow: inset 0 2px 4px rgba(255,255,255,0.2),
                  0 4px 8px rgba(0,0,0,0.2);
      transition: all 0.3s ease;
    }
    .btn-login-custom:hover {
      background: linear-gradient(to bottom, #6b2d85, #4e2567);
      color: #fff;
      text-decoration: none;
    }
  </style>
</head>
<body>

  {{-- Navbar --}}
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #312973;">
    <div class="container">
      <a class="navbar-brand fw-bold" href="{{ route('admin.kelola.index') }}">PrakerinApp</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">

          {{-- Menu dashboard & laporan berdasarkan role --}}
          @auth
            @if(auth()->user()->role === 'admin')
              <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/lowongan*') ? 'active' : '' }}" href="{{ route('admin.lowongan.index') }}">Lowongan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/perusahaan*') ? 'active' : '' }}" href="{{ route('admin.perusahaan.index') }}">Perusahaan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/laporan*') ? 'active' : '' }}" href="{{ route('admin.laporan.index') }}">Laporan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/dashboard*') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">Kelola</a>
              </li>
            @elseif(auth()->user()->role === 'user')
              <li class="nav-item">
                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('frontend.lowongan') }}">Beranda</a>
              </li>
            @endif
          @endauth

          {{-- Tombol Login/Logout --}}
          <li class="nav-item">
            @auth
              <form method="POST" action="{{ route('logout') }}" class="ms-3">
                @csrf
                <button type="submit" class="btn btn-login-custom">
                  <i class="fas fa-sign-out-alt"></i> Keluar
                </button>
              </form>
            @else
              <a class="btn btn-login-custom ms-3" href="{{ route('login') }}">
                <i class="fas fa-sign-in-alt"></i> Masuk
              </a>
            @endauth
          </li>
        </ul>
      </div>
    </div>
  </nav>

  {{-- Main Content --}}
  <div class="container py-4">
    @yield('content')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
