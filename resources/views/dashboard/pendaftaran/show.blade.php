@extends('dashboard.layouts.main')

@section('container')

<div class="justify-content-center">

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Data Pendaftaran</h6>
        </div>
        <div class="card-body mx-10">
            <form method="post" action="/dashboard/pendaftaran/{{ $pendaftaran->id }}" class="mb-5" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <input type="hidden" name="id" value="{{ $pendaftaran->id }}">
                <div class="mb-3">
                    <label for="lowongan_id" class="form-label">Lowongan Yang Dituju</label>
                    <input type="text" class="form-control @error('lowongan_id') is-invalid @enderror" id="lowongan_id" name="lowongan_id" autofocus readonly value="{{ old('lowongan_id', $pendaftaran->lowongan->title_lowongan) }}">
                    @error('lowongan_id')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

            <div class="row">
                <div class="col-mb-6 mb-3">
                  <label for="foto_diri" class="form-label @error('foto_diri') is-invalid @enderror">Foto Diri</label>
                  <input type="hidden" name="foto_diri" value="{{ $pendaftaran->foto_diri }}">
                  @if ($pendaftaran->foto_diri)
                  <img src="{{ asset('storage/' . $pendaftaran->foto_diri) }}" id="img-preview-1" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                  @endif
                  @error('foto_diri')
                  <div class="invalid-feedback">
                  {{ $message }}
                  </div>
                  @enderror
                </div>
            </div>

                <div class="mb-3">
                  <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                  <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" autofocus required readonly value="{{ old('nama_lengkap', $pendaftaran->nama_lengkap) }}">
                  @error('nama_lengkap')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                    {{-- input data diri --}}
              <div class="row data-diri item-center">

                <div class="col-md-6 mb-3">
                  <label for="nik" class="form-label">Nomor Induk Kependudukan (NIK)</label>
                  <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" required autofocus readonly value="{{ old('nik', $pendaftaran->nik) }}">
                  @error('nik')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="col-md-6 mb-3">
                  <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                  <input type="text" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" required autofocus readonly value="{{ old('jenis_kelamin', $pendaftaran->jenis_kelamin) }}">
                  @error('jenis_kelamin')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" required autofocus readonly value="{{ old('tanggal_lahir', $pendaftaran->tanggal_lahir) }}">
                    @error('tanggal_lahir')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                <div class="col-md-6 mb-3">
                    <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
                    <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror" id="nama_sekolah" name="nama_sekolah" required autofocus readonly value="{{ old('nama_sekolah', $pendaftaran->nama_sekolah) }}">
                    @error('nama_sekolah')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>


                  <div class="col-md-6 mb-3">
                    <label for="no_hp" class="form-label">Nomor Handphone</label>
                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" required autofocus readonly value="{{ old('no_hp', $pendaftaran->no_hp) }}">
                    @error('no_hp')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required autofocus readonly value="{{ old('email', $pendaftaran->email) }}">
                    @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
              </div>

                  {{-- input pakaian --}}
                  
                  <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="ukuran_baju" class="form-label">Ukuran Baju</label>
                        <input type="text" class="form-control @error('ukuran_baju') is-invalid @enderror" id="ukuran_baju" name="ukuran_baju" required readonly value="{{ old('ukuran_baju', $pendaftaran->ukuran_baju) }}">
                        @error('ukuran_baju')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
    
                      <div class="col-md-4 mb-3">
                        <label for="ukuran_celana" class="form-label">Ukuran Celana</label>
                        <input type="text" class="form-control @error('ukuran_celana') is-invalid @enderror" id="ukuran_celana" name="ukuran_celana" required readonly value="{{ old('ukuran_celana', $pendaftaran->ukuran_celana) }}">
                        @error('ukuran_celana')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
    
                      <div class="col-md-4 mb-3">
                        <label for="ukuran_sepatu" class="form-label">Ukuran Sepatu</label>
                        <input type="text" class="form-control @error('ukuran_sepatu') is-invalid @enderror" id="ukuran_sepatu" name="ukuran_sepatu" required readonly value="{{ old('ukuran_sepatu', $pendaftaran->ukuran_sepatu) }}">
                        @error('ukuran_sepatu')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                  </div>
            

                  {{-- input vaksin --}}

                   {{-- input data vaksin ke-1 --}}
                <div class="row data-vaksin-1 item-center">

                    <div class="col-md-6 mb-3">
                        <label for="jenis_vaksin_1" class="form-label">Jenis Vaksin Ke-1</label>
                        <input type="text" class="form-control @error('jenis_vaksin_1') is-invalid @enderror" id="jenis_vaksin_1" name="jenis_vaksin_1" autofocus readonly value="{{ old('jenis_vaksin_1', $pendaftaran->jenis_vaksin_1) }}">
                        @error('jenis_vaksin_1')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
    

                  <div class="col-md-6 mb-3">
                    <label for="tgl_vaksin_1" class="form-label">Tanggal Vaksin Ke-1</label>
                    <input type="date" class="form-control @error('tgl_vaksin_1') is-invalid @enderror" id="tgl_vaksin_1" name="tgl_vaksin_1" required readonly value="{{ old('tgl_vaksin_1', $pendaftaran->tgl_vaksin_1) }}">
                    @error('tgl_vaksin_1')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="kota_vaksin_1" class="form-label">Kota Vaksinasi Ke-1</label>
                    <input type="text" class="form-control @error('kota_vaksin_1') is-invalid @enderror" id="kota_vaksin_1" name="kota_vaksin_1" required readonly value="{{ old('kota_vaksin_1', $pendaftaran->kota_vaksin_1) }}">
                    @error('kota_vaksin_1')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                </div>

                 <div class="mb-3">
                    <label for="img_bukti_1" class="form-label @error('img_bukti_1') is-invalid @enderror">Bukti Vaksinasi Ke-1</label>
                    <input type="hidden" name="img_bukti_1" value="{{ $pendaftaran->img_bukti_1 }}">
                    @if ($user->img_bukti_1)
                    <img src="{{ asset('storage/' . $pendaftaran->img_bukti_1) }}" id="img-preview-1" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    @endif
                    @error('img_bukti_1')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                    @enderror
                  </div>

                  {{-- input data vaksin ke-2 --}}
                  <div class="row data-vaksin-2 item-center">

                    <div class="col-md-6 mb-3">
                        <label for="jenis_vaksin_2" class="form-label">Jenis Vaksin Ke-2</label>
                        <input type="text" class="form-control @error('jenis_vaksin_2') is-invalid @enderror" id="jenis_vaksin_2" name="jenis_vaksin_2" autofocus readonly value="{{ old('jenis_vaksin_2', $pendaftaran->jenis_vaksin_2) }}">
                        @error('jenis_vaksin_2')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
  
                      <div class="col-md-6 mb-3">
                        <label for="tgl_vaksin_2" class="form-label">Tanggal Vaksin Ke-2</label>
                        <input type="date" class="form-control @error('tgl_vaksin_2') is-invalid @enderror" id="tgl_vaksin_2" name="tgl_vaksin_2" required readonly value="{{ old('tgl_vaksin_2', $pendaftaran->tgl_vaksin_2) }}">
                        @error('tgl_vaksin_2')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
    
                      <div class="col-md-6 mb-3">
                        <label for="kota_vaksin_2" class="form-label">Kota Vaksinasi Ke-2</label>
                        <input type="text" class="form-control @error('kota_vaksin_2') is-invalid @enderror" id="kota_vaksin_2" name="kota_vaksin_2" required readonly value="{{ old('kota_vaksin_2', $pendaftaran->kota_vaksin_2) }}">
                        @error('kota_vaksin_2')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                
              </div>

              <div class="mb-3">
                  <label for="img_bukti_2" class="form-label @error('img_bukti_2') is-invalid @enderror">Bukti Vaksinasi Ke-2</label>
                  <input type="hidden" name="img_bukti_2" value="{{ $pendaftaran->img_bukti_2 }}">
                  @if ($user->img_bukti_2)
                  <img src="{{ asset('storage/' . $pendaftaran->img_bukti_2) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block" id="img-preview-2">
                 @endif
                  @error('img_bukti_2')
                  <div class="invalid-feedback">
                  {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="col-md-6 mb-3">
                  <label for="status" class="form-label">Status Pendaftaran</label>
                  <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" name="status" required readonly value="{{ old('status', $pendaftaran->status) }}">
                  @error('status')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

               
              
              </form>
        </div>
    </div>

</div>


<script>

function previewImage1() {
    const img_bukti_1 = document.querySelector('#img_bukti_1');
    const imgPreview1 = document.querySelector('#img-preview-1');

    imgPreview1.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(img_bukti_1.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview1.src = oFREvent.target.result;
    }
  }

  function previewImage2() {
    const img_bukti_2 = document.querySelector('#img_bukti_2');
    const imgPreview2 = document.querySelector('#img-preview-2');

    imgPreview2.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(img_bukti_2.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview2.src = oFREvent.target.result;
    }
  }
   
</script>

@endsection