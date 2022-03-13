@extends('layouts.main')

@section('container')

<div class="container smk justify-content-center">

  <h2 class="text-center py-3">Tentang</h2>

    <div class="container px-4 py-lg-3 mx-0">
        <div class="row flex-lg-row-reverse d-flex align-item-center ">
          <div class="col-lg" data-aos="zoom-out-up" data-aos-offset="200" data-aos-easing="ease-in-out">
              <img class="d-block img-fluid rounded shadow" src="/img/smk-full.jpg" alt="">
            {{-- <img src="https://source.unsplash.com/600x400" class="d-flex img-fluid h-600" alt="Bootstrap Themes" loading="lazy"> --}}
          </div>
          <div class="col-lg" data-aos="fade-up" data-aos-offset="200" data-aos-easing="ease-in-out">
            <h3 class="display-6 fw-bold lh-1 mb-3">SMK Muhammadiyah Kandanghaur</h3>
            <p>Merupakan sekolah menengah kerjuruan swasta berakreditasi A, yang berada di wilayah kecamatan Kandanghaur, Indramayu. Dengan berbagai macam jurusan keahlian yang tersedia.</p>
            <p class="fw-normal"> <i class="bi bi-geo-alt-fill"></i>
               Jl. Raya Kandanghaur No.28 A, Karanganyar, Kec. Kandanghaur,
              Kabupaten Indramayu, Jawa Barat 45254
            </p>
            <p class="fw-normal">
              <i class="bi bi-telephone-fill"></i>
              (0234) 507239
            </p>
            <p class="fw-normal">
              <i class="bi bi-envelope-fill"> </i>
              smkmuhkdh@gmail.com 
            </p>
          </div>
        </div>
      </div>

</div>

<div class="container smk justify-content-center py-3">
    
    <hr>

    <div class="container px-4 py-4 mx-0">
        <div class="row d-flex align-item-center ">
          <div class="col-lg mt-2" data-aos="zoom-out-up" data-aos-offset="200" data-aos-easing="ease-in-out">
              <img class="d-block img-fluid rounded shadow" src="/img/Pengurus_bkk.jpeg" alt="">
            {{-- <img src="https://source.unsplash.com/600x400" class="d-flex img-fluid h-600" alt="Bootstrap Themes" loading="lazy"> --}}
          </div>
          <div class="col-lg text-justify-end" data-aos="fade-up" data-aos-offset="200" data-aos-easing="ease-in-out">
            <h1 class="display-6 fw-bold lh-1 mb-3">BKK <br> SMK Muhammadiyah Kandanghaur</h1>
            <p>Merupakan wadah bagi siswa dan lulusan dalam menjebatani industri dan sekolah, yang memberikan informasi lowongan pekerjaan dan melakukan kerja sama dengan berbagai perusahaan untuk melaksanakan pendaftaran sampai memfasilitasi perusahaan melaksanakan tes seleksi.</p>
            <p class="fw-normal"> <i class="bi bi-geo-alt-fill"></i>
               Jl. Raya Kandanghaur No.28 A, Karanganyar, Kec. Kandanghaur,
              Kabupaten Indramayu, Jawa Barat 45254
            </p>
            <p class="fw-normal">
              <i class="bi bi-phone-fill"></i>
               +628312341233 (Wawan Wicaksono)
            </p>
            <p class="fw-normal">
              <i class="bi bi-envelope-fill"> </i>
              bkkmuh_kdh@gmail.com
            </p>
            </div>
          </div>
        </div>
      </div>


      <div class="container justify-content-center py-3">
        <hr>
        <div class="container py-5">
            
            <h3 class="text-center mb-5">Pengurus BKK SMK Muhammadiyah Kandanghaur</h3>
        
            <!-- Three columns of text below the carousel -->
            <div class="row d-flex align-item-center">
              @foreach ($pengurus as $penguruses )
              
              <div class="col-lg-3" data-aos="zoom-out-up" data-aos-offset="200" data-aos-easing="ease-in-out">
                <img src="{{ asset('storage/' . $penguruses->img_pengurus) }}" alt="" class="bd-placeholder-img rounded-circle mb-3 mx-auto d-block" width="140" height="140">
                {{-- <svg class="bd-placeholder-img rounded-circle mb-3 mx-auto d-block" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg> --}}
                <h5 class="text-center">{{ $penguruses->nama }}</h5>
                <p class="text-center">{{ $penguruses->jabatan }}</p>
              </div>
              @endforeach
            </div><!-- /.row -->
        </div>
        
    </div>

</div>

@endsection