@extends('dashboard.layouts.main')

@section('container')

@if (session()->has('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-info fa-sm fa-fw mr-2 text-gray-400"></i> Data Informasi</h6>
    </div>
    <div class="card-body">
        <div class="header-informasi">

            <h1 class="section-heading text-center">{{ $informasi->title_informasi }}</h1>

        </div>

        <br> <hr> <br>

        <div class="body-informasi">
            
            <p>{!! $informasi->isi_informasi !!}</p>

        </div>
    </div>
</div>



@endsection