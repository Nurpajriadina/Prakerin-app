@extends('layouts.app')

@section('title', 'Register')

@section('content')
<style>
  .register-box {
    max-width: 500px;
    margin: 60px auto;
    background: linear-gradient(to bottom right, #7d3c98, #5e337a);
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    color: #fff;
  }

  .register-box h2 {
    text-align: center;
    margin-bottom: 30px;
    font-weight: bold;
  }

  .form-control {
    border: none;
    border-radius: 30px;
    padding-left: 40px;
  }

  .form-group {
    position: relative;
    margin-bottom: 20px;
  }

  .form-group i {
    position: absolute;
    top: 10px;
    left: 15px;
    color: #6f42c1;
  }

  .btn-register {
    background: #312973;
    border: none;
    width: 100%;
    border-radius: 30px;
    padding: 10px;
    color: #fff;
    font-weight: bold;
    transition: 0.3s ease;
  }

  .btn-register:hover {
    background: #251e5d;
  }

  .text-login {
    text-align: center;
    margin-top: 20px;
    color: #f9ebf3;
  }

  .text-login a {
    color: #ffffff;
    text-decoration: underline;
  }

  .text-login a:hover {
    color: #dcd1ff;
  }

  .alert {
    padding: 10px;
    border-radius: 10px;
    margin-bottom: 20px;
    text-align: center;
  }

  .alert-success {
    background-color: #28a745;
    color: #fff;
  }

  .alert-danger {
    background-color: #c0392b;
    color: #fff;
  }
</style>

<div class="register-box">
  <h2>Register</h2>

  {{-- Alert sukses atau error --}}
  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  @if($errors->any())
    <div class="alert alert-danger">
      {{ $errors->first() }}
    </div>
  @endif

  <form action="{{ route('user.register') }}" method="POST">
    @csrf

    <div class="form-group">
      <i class="fas fa-user"></i>
      <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
    </div>

    <div class="form-group">
      <i class="fas fa-envelope"></i>
      <input type="email" name="email" class="form-control" placeholder="Email ID" value="{{ old('email') }}" required>
    </div>

    <div class="form-group">
      <i class="fas fa-lock"></i>
      <input type="password" name="password" class="form-control" placeholder="Password" required>
    </div>

    <div class="form-group">
      <i class="fas fa-lock"></i>
      <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required>
    </div>

    <button type="submit" class="btn btn-register">DAFTAR</button>

    <div class="text-login">
      Sudah punya akun? <a href="{{ route('login') }}">Masuk</a>
    </div>
  </form>
</div>
@endsection
