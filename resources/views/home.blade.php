@extends('layouts.main')

@section('container')


<div class="header text-center px-0 mx-0">
    <div class="row content px-0 mx-0">
      <div class="col-12 px-0">
        <div class="headline" data-aos="zoom-in" data-aos-offset="400">
          Cari Lowongan Pekerjaan <br class="d-none d-md-block" />
          {{-- Di Perusahaan Besar Yang Ada Di Indonesia --}}
        </div>
        <div class="mt-3 subheadline" data-aos="zoom-in" data-aos-offset="400" data-aos-delay="300" >
          Bersama Bursa Kerja Khusus (BKK) SMK Muhammadiyah Kandanghaur
        </div>
        <div class="button-header item-fluid">
          <a href="/lowongan" class="btn btn-listing py-3">
            <i class="bi bi-search"></i>
              Cari Sekarang
          </a>
        </div>
      </div>
    </div>
    <div class="row px-0 mx-0">
      <div class="col-12 img-brand px-0">
        <img
         src="/img/logo/daihatsu.png"
          alt="Daihatsu"
          class="px-4 mt-5 img-fluid mr-60 mt-md-0 px-md-0"
        />
        <img
          src="/img/logo/honda.png"
          alt="Honda"
          class="px-4 mt-5 img-fluid mr-60 mt-md-0 px-md-0"
        />
        <img
          src="/img/logo/toyota.png"
          alt="Toyota"
          class="px-5 mt-5 img-fluid mr-60 mt-md-0 px-md-0"
        />
        <img
          src="/img/logo/astrainter.png"
          alt="Shayna"
          class="px-4 mt-5 img-fluid mt-md-0 px-md-0"
        />
        <br> <br>
        <img
          src="/img/logo/epson.png"
          alt="epson"
          class="px-4 mt-5 img-fluid mr-60 mt-md-0 px-md-0"
        />
        <img
          src="/img/logo/samsung.png"
          alt="samsung"
          class="px-4 mt-5 img-fluid mr-60 mt-md-0 px-md-0"
        />
        <img
          src="/img/logo/jvc.png"
          alt="jvc"
          class="px-4 mt-5 img-fluid mr-60 mt-md-0 px-md-0"
        />
        
      </div>
    </div>
  </div>

  {{-- tahapan --}}

  <div class="content-3-2 container-xxl mx-auto  position-relative" style="font-family: 'Poppins', sans-serif">
    <div class="d-flex flex-lg-row flex-column align-items-center">
      <!-- Left Column -->
      <div class="img-hero text-center justify-content-center d-flex" data-aos="zoom-out-up" data-aos-offset="400" data-aos-easing="ease-in-out">
        <img id="hero" class="img-fluid"
          src="http://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content3/Content-3-1.png"
          alt="" />
      </div>

      <!-- Right Column -->
      <div class="right-column d-flex flex-column align-items-lg-start align-items-center text-lg-start text-center" data-aos="fade-up" data-aos-offset="400" data-aos-easing="ease-in-out">
        <h4 class="title-text">3 Keuntungan Menggunakan Website BKK Muhammadiyah Kandanghaur</h4>
        <ul style="padding: 0; margin: 0">
          <li class="list-unstyled" style="margin-bottom: 2rem">
            <h4
              class="title-caption d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
              <span class="circle text-white d-flex align-items-center justify-content-center">
                1
              </span>
              Informasi Yang Cepat
            </h4>
            <p class="text-caption">
              Mendapatkan Informasi Lowongan Pekerjaan Yang Tersedia Dengan Cepat, Tanpa Harus Datang Ke Sekolah.
            </p>
          </li>
          <li class="list-unstyled" style="margin-bottom: 2rem">
            <h4
              class="title-caption d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
              <span class="circle text-white d-flex align-items-center justify-content-center">
                2
              </span>
              Kemudahan Melamar Pekerjaan
            </h4>
            <p class="text-caption">
              Mudah Untuk Mendaftarkan Diri Dalam Melamar Pekerjaan Secara Online, Menjadikan Lebih Cepat Dan Efisien.
            </p>
          </li>
          <li class="list-unstyled" style="margin-bottom: 4rem">
            <h4
              class="title-caption d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
              <span class="circle text-white d-flex align-items-center justify-content-center">
                3
              </span>
              Dapat Diakses Dari Perangkat Manapun
            </h4>
            <p class="text-caption">
              Kemudahan dalam mengakses website dengan berbagai perangkat baik desktop maupun mobile.
            </p>
          </li>
        </ul>
      </div>
    </div>

    <div class="container">
      <div class="row flex-lg-row-reverse justify-content-center align-items-center ">
        <div class="col-lg" data-aos="zoom-out-up" data-aos-offset="400" data-aos-easing="ease-in-out">
            <img class="d-block img-fluid rounded shadow" src="/img/Pengurus_bkk.jpeg" alt="">
          {{-- <img src="https://source.unsplash.com/600x400" class="d-flex img-fluid h-600" alt="Bootstrap Themes" loading="lazy"> --}}
        </div>
        <div class="col-lg px-4 mt-3" data-aos="fade-up" data-aos-offset="400" data-aos-easing="ease-in-out">
          <h2 class="display-6 fw-bold lh-1 mb-3">BKK <br> SMK Muhammadiyah Kandanghaur</h2>
          <p class="lead">Merupakan wadah bagi siswa dan lulusan dalam menjebatani industri dan sekolah, yang memberikan informasi lowongan pekerjaan dan melakukan kerja sama dengan berbagai perusahaan untuk melaksanakan pendaftaran sampai memfasilitasi perusahaan melaksanakan tes seleksi.</p>
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
              bkkmuhkdh@gmail.com 
            </p>
          </div>
        </div>
      </div>

    </div>

  </div>

@endsection
