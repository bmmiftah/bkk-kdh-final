@extends('layouts.main-non')

@section('container')

<div class="container justify-align-center col-xl-10 col-xxl-8 px-4 py-5">
  <div class="row align-items-center g-lg-5">
      <div class="mb-2 brand-logo">
         <a href="/"> <img src="/img/bkk-logo.png" alt=""> </a>
      </div>

    <div class="col-lg-7 text-center text-lg-start m-0">
        <h1 class="display-4 fw-bold lh-1 mb-3">Daftar</h1>
        <p class="col-lg-10 fs-4">Silahkan untuk mendaftarkan akun dengan mengisi form yang tersedia.</p>
    </div>
    <div class="col-md-10 mx-auto col-lg-5">

      @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      @if(session()->has('registerError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('registerError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      <form class="p-4 p-md-5 border rounded-3 bg-light" action="/register" method="post">
        @csrf
      
          <div class="form-floating mb-3">
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name" autofocus required value="{{ old('name') }}">
          <label for="email">Nama Lengkap</label>
          @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
          <div class="form-floating mb-3">
          <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" autofocus required value="{{ old('username') }}">
          <label for="username">Username</label>
          @error('username')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
          <div class="form-floating mb-3">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
          <label for="email">Email address</label>
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-floating mb-5">
            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Confirm Password" required>
            <label for="floatingPassword">Confirm Password</label>
            @error('password_confirmation')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit"> <i class="bi bi-box-arrow-in-right"></i> Daftar</button>
        <hr class="my-4">
        <div class="text-center">
          <small class="text-center text-muted">Sudah Punya Akun? <a style="text-decoration: none" href="/login">Masuk</a></small>
        </div>
    </form>
    
    <div class="text-center py-3">
        <small style="margin: 0">Copyright © 2021-<?=date('Y')?> Bagus Miftah Nur Haqqi</small>
    </div>

    </div>
  </div>
</div>

@endsection