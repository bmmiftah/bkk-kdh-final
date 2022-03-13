@extends('dashboardProfil.layouts.main')

@if (session()->has('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif

@section('container')
<div class="justify-content-center">

  @foreach ($pendaftaran as $pendaftaran ) 
    <div class="card shadow-sm mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-clock fa-sm fa-fw mr-2 text-gray-400"></i>Status Pendaftaran</h6>
            </div>
            <div class="card-body mx-10">
                <div class="row">
                    <div class="col-md-9">
                        <p>Nomor Tes : {{ $pendaftaran->no_tes }}</p>
                        <h5>{{ $pendaftaran->lowongan->title_lowongan }}</h5>
                        <p>{{ $pendaftaran->lowongan->perusahaan->nama_perusahaan }}</p>
                    </div>

                    <div class="col-md-3 text-right">
                        <h5 class="text-primary my-md-5 my-lg-5">{{ $pendaftaran->status }}</h5>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>


@endsection