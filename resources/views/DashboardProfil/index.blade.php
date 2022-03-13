@extends('dashboardprofil.layouts.main')

@section('container')

@if (session()->has('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="card shadow mb-4">
    <div class="card-body">

        <div class="body">
            
            <h5>Hallo, <br> {{ $user->name }}</h5>

        </div>
    </div>
</div>

@endsection