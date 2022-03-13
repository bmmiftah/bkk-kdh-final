@extends('layouts.main1')

@section('container')


<div class="container justify-content-center py-5">

    <div class="row info align-items-md-stretch">

        <div class="col-md-7 mb-2 rounded-5" data-aos="fade-down" data-aos-delay="200" data-aos-easing="ease-in-out">
          
            <div class="accordion" style="background-color: #fefefe" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                      <i class="bi bi-file-text-fill"></i> Tentang Lowongan
                    </button>
                  </h2>
                  <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                      {!! $detail_lowongan->detail_lowongan !!}
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                      <i class="bi bi-ui-checks"></i> Kriteria Pekerja
                    </button>
                  </h2>
                  <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                      {!! $detail_lowongan->kriteria_lowongan !!}
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                      <i class="bi bi-megaphone-fill"></i> Informasi Tambahan
                    </button>
                  </h2>
                  <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                    <div class="accordion-body">
                     {!! $detail_lowongan->informasi_tambahan !!}
                    </div>
                  </div>
                </div>
              </div>
            
        </div>

        <div class="col-md-5" data-aos="fade-down" data-aos-delay="400" data-aos-easing="ease-in-out">

            <div class="item-fluid p-5 shadow-sm border rounded-5" style="background-color: #fefefe">
                <h2>{{ $detail_lowongan->title_lowongan }}</h2>
                <p>{{ $detail_lowongan->perusahaan->nama_perusahaan }}</p>
                <hr>
                <h6>Status Pendaftaran <span class="badge {{ $detail_lowongan->status == (true) ? 'bg-success' : 'bg-danger' ; }} ">{{ $detail_lowongan->status == (true) ? 'Dibuka' : 'Ditutup' ; }}</span></h6>
                <p class="inline-text"><i class="bi bi-calendar2-date-fill"></i> Batas Pendaftaran : {{ $detail_lowongan->tgl_tutup }}</p>

                @if ($detail_lowongan->status == true)
                <br>
                <a href="/pendaftaran/create/{{ $detail_lowongan->slug }}" class="btn btn-primary" type="button"><i class="bi bi-briefcase-fill"></i> Daftar Lowongan</a>
                @endif
              </div>

        </div>

    </div>

</div>




@endsection
