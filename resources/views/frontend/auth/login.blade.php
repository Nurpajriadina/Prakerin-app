@extends('layouts.app')

@section('title', 'Login')

@section('content')
<style>
  .login-box {
    max-width: 400px;
    margin: 60px auto;
    background: linear-gradient(to bottom right, #7d3c98, #5e337a);
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    color: #fff;
  }

  .login-box h2 {
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

  .btn-login {
    background: #312973;
    border: none;
    width: 100%;
    border-radius: 30px;
    padding: 10px;
    color: #fff;
    font-weight: bold;
    transition: 0.3s ease;
  }

  .btn-login:hover {
    background: #251e5d;
  }

  .text-register {
    text-align: center;
    margin-top: 20px;
    color: #f9ebf3;
  }

  .text-register a {
    color: #ffffff;
    text-decoration: underline;
  }

  .text-register a:hover {
    color: #dcd1ff;
  }
</style>

<div class="login-box">
  <h2>Login</h2>
  <form action="{{ route('login') }}" method="POST">
    @csrf

    <div class="form-group">
      <i class="fas fa-envelope"></i>
      <input type="email" name="email" class="form-control" placeholder="Email ID" required>
    </div>

    <div class="form-group">
      <i class="fas fa-lock"></i>
      <input type="password" name="password" class="form-control" placeholder="Password" required>
    </div>


    <button type="submit" class="btn btn-login">LOGIN</button>

    <div class="text-register">
      Belum punya akun? <a href="{{ route('user.register') }}">Daftar</a>
    </div>
  </form>
</div>
@endsection
