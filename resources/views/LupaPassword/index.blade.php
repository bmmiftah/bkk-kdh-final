@extends('layouts.main-non')

@section('container')

<div class="container justify-align-center col-xl-10 col-xxl-8 px-4 py-5">
  <div class="row align-items-center g-lg-5">
      <div class="mb-5 brand-logo">
         <a href="/"> <img src="/img/bkk-logo.png" alt=""> </a>
      </div>

    <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 mb-3">Lupa Password</h1>
        <p class="col-lg-10 fs-4">Untuk melakukan rest password, silahkan untuk masukkan email yang terdaftar.</p>
    </div>
    <div class="col-md-10 mx-auto col-lg-5">

      @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      @if(session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      <form class="p-4 p-md-5 border rounded-3 bg-light" action="/storeLupaPassword" method="post">
        @csrf
      
          <div class="form-floating mb-3">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
          <label for="email">Email address</label>
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit"> <i class="bi bi-send"></i> Kirim</button>
        <hr class="my-4">
        <div class="text-center">
          <small class="text-center text-muted">Sudah punya akun?<a style="text-decoration: none" href="/login"> Login</a></small>
        </div>
    </form>
    
    <div class="text-center py-3">
          <small class="text-center text-muted">Copyright © 2021 Bagus Miftah Nur Haqqi</small>
      </div>

    </div>
  </div>
</div>

@endsection