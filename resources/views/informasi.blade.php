@extends('layouts.main')

@section('container')

<div class="container justify-content-center">
    <div class="info-header">
        <h2 class=" mb-3 text-center py-3">Pusat Informasi</h2>   
    </div>

    <div class="row container main-lowongan m-0">

      <div class="contaner side-bar col-md-4">
        <div class="side-bar py-3">
  
        <form action="/informasi"> 
          @if (request('category'))
          <input type="hidden" name="category" value="{{ request('category') }}">
        @endif

          <div class="input-group mb-3"> 
            <input type="text" class="form-control" placeholder="Cari Lowongan" name="search" value="{{ request('search') }}">
            
            <button class="btn btn-primary" type="sumbit"><i class="bi bi-search"></i> Cari</button>
          </div>
        </form>
  
          <div class="card item-fluid">
            <img src="/img/informasi.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title m-0">Pusat Informasi</h5>
            </div>
            <ul class="list-group list-group-flush">
              @foreach ($categories as $category )
                
              <li class="list-group-item">
                <a style="text-decoration: none;" href="/informasi?category={{ $category->slug }}">{{ $category->title_category }}</a>
              </li>
              @endforeach
            </ul>
          </div>
  
        </div>
        
      </div>
    

  <div class="container mb-5 col-md-8 ">

    <div class="row px-3">
@if ($informasis->count())

@foreach ($informasis as $informasi )

<div class=" px-0 card mb-3 shadow-sm item-fluid mt-lg-3" data-aos="fade-up" data-aos-delay="200" data-aos-easing="ease-in-out">
  <img src="/img/img-info.jpg" class="card-img-top" style="height: 200px; object-fit:cover;" alt="...">
  <div class="card-body">
    <a style="text-decoration: none;" href="/detail_informasi/{{ $informasi->slug }}"><h4 class="card-title">{!! $informasi->title_informasi !!}</h4></a>
    <small>
      <span class="badge bg-success text-light">{{ $informasi->Category->title_category }}</span>
      {{-- <span class="badge bg-dark text-light">{{ $informasi->lowongan->title_lowongan }}</span> --}}
    </small>
    <hr>
    <p class="card-text">{!! $informasi->excerpt !!}</p>
  </div>
</div>

@endforeach
@else
<div class="card shadow-sm mt-3">

  <p class="text-center text-secondary fs-4 my-5">Informasi Yang Dicari Tidak Bisa Ditemukan</p>
  
</div>
@endif
{{ $informasis->links() }}

    </div>
    </div>

</div>
</div>

@endsection
