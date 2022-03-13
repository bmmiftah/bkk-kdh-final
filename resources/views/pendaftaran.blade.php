@extends('layouts.main1')

@section('container')

@if (session()->has('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="d-flex justify-content-center py-5">

    <div class="card shadow-sm" style="width: 80%;">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-plus-circle fa-sm fa-fw mr-2 text-gray-400"></i>Form Pendaftaran</h6>
        </div>
        <div class="card-body mx-10">
            <form method="post" action="/pendaftaran" class="mb-5" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <input type="hidden" name="no_tes" value="{{ $no_tes }}">

                <div class="mb-3">
                  <label for="lowongan_id" class="form-label">Mendaftar Pada Lowongan</label>
                  <br>
                  <select class="form-control" name="lowongan_id" readonly srequired>
                    @foreach ($lowongans as $lowongan )
                     @if (old('lowongan') == $lowongan->title_lowongan)
                        <option value="{{ $lowongan->id }}" readonly selected>{{ $lowongan->title_lowongan }}</option>
                     @else
                        <option readonly value="{{ $lowongan->id }}">{{ $lowongan->title_lowongan }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>

                {{-- <div class="mb-3">
                  <label for="lowongan_id" class="form-label">Mendaftar Pada Lowongan</label>
                  @foreach ($lowongans as $lowongan )
                  <input type="text" class="form-control @error('lowongan') is-invalid @enderror" id="lowongan_id" name="lowongan_id" autofocus required readonly value="{{ old('lowongan_id', $lowongan->lowongan_id ) }}" placeholder="{{ $lowongan->title_lowongan }}">
                  @endforeach
                  @error('lowongan')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div> --}}

                {{-- input data diri --}}
              <div class="row data-diri item-center">

                <div class="col-md-6 mb-3">
                  <label for="foto_diri" class="form-label @error('foto_diri') is-invalid @enderror">Foto Diri</label>
                  <input type="hidden" name="foto_diri" value="{{ $user->avatar }}">
                  @if ($user->avatar)
                  <img src="{{ asset('storage/' . $user->avatar) }}" id="img-preview-1" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                  @endif
                  @error('foto_diri')
                  <div class="invalid-feedback">
                  {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                  <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" autofocus required readonly value="{{ old('nama_lengkap', $user->name) }}">
                  @error('nama_lengkap')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="col-md-6 mb-3">
                  <label for="nik" class="form-label">Nomor Induk Kependudukan (NIK)</label>
                  <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" required autofocus readonly value="{{ old('nik', $user->nik) }}">
                  @error('nik')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="col-md-6 mb-3">
                  <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                  <input type="text" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" required autofocus readonly value="{{ old('jenis_kelamin', $user->jenis_kelamin) }}">
                  @error('jenis_kelamin')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" required autofocus readonly value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}">
                    @error('tanggal_lahir')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                <div class="col-md-6 mb-3">
                    <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
                    <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror" id="nama_sekolah" name="nama_sekolah" required autofocus readonly value="{{ old('nama_sekolah', $user->sekolah) }}">
                    @error('nama_sekolah')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>


                  <div class="col-md-6 mb-3">
                    <label for="no_hp" class="form-label">Nomor Handphone</label>
                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" required autofocus readonly value="{{ old('no_hp', $user->no_hp) }}">
                    @error('no_hp')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required autofocus readonly value="{{ old('email', $user->email) }}">
                    @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
              </div>

                  {{-- input pakaian --}}
                  
                  <div class="mb-3">
                    <label for="ukuran_baju" class="form-label">Ukuran Baju</label>
                    <br>
                    <select class="form-control" name="ukuran_baju" required>
                        <option value="" selected>--Pilih Ukuran Baju--</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="XXL">XXL</option>
                        <option value="XXXL">XXXL</option>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label for="ukuran_celana" class="form-label">Ukuran Celana</label>
                    <br>
                    <select class="form-control" name="ukuran_celana" required>
                        <option value="" selected>--Pilih Ukuran celana--</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                        <option value="32">32</option>
                        <option value="33">33</option>
                        <option value="34">34</option>
                        <option value="35">35</option>
                        <option value="36">36</option>
                        <option value="37">37</option>
                        <option value="38">38</option>
                        <option value="39">39</option>
                        <option value="40">40</option>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label for="ukuran_sepatu" class="form-label">Ukuran sepatu</label>
                    <br>
                    <select class="form-control" name="ukuran_sepatu" required>
                        <option value="" selected>--Pilih Ukuran sepatu--</option>
                        <option value="36">36</option>
                        <option value="37">37</option>
                        <option value="38">38</option>
                        <option value="39">39</option>
                        <option value="40">40</option>
                        <option value="41">41</option>
                        <option value="42">42</option>
                        <option value="43">43</option>
                        <option value="44">44</option>
                        <option value="45">45</option>
                    </select>
                  </div>

                  {{-- input vaksin --}}

                   {{-- input data vaksin ke-1 --}}
                <div class="row data-vaksin-1 item-center">

                  <div class="col-md-6 mb-3">
                    <label for="jenis_vaksin_1" class="form-label">Jenis Vaksin Ke-1</label>
                    <br>
                    <select class="form-control" name="jenis_vaksin_1" selected readonly>
                        <option value="">--Pilih Jenis Vaksin Ke-1--</option>
                      @foreach ($vaksins as $vaksin )
                       @if (old('jenis_vaksin_1', $user->jenis_vaksin_1) == $vaksin->jenis_vaksin)
                          <option value="{{ $vaksin->jenis_vaksin }}" selected>{{ $vaksin->jenis_vaksin }}</option>
                       @else
                          <option value="{{ $vaksin->jenis_vaksin }}">{{ $vaksin->jenis_vaksin }}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="tgl_vaksin_1" class="form-label">Tanggal Vaksin Ke-1</label>
                    <input type="date" class="form-control @error('tgl_vaksin_1') is-invalid @enderror" id="tgl_vaksin_1" name="tgl_vaksin_1" required readonly value="{{ old('tgl_vaksin_1', $user->tgl_vaksin_1) }}">
                    @error('tgl_vaksin_1')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="kota_vaksin_1" class="form-label">Kota Vaksinasi Ke-1</label>
                    <input type="text" class="form-control @error('kota_vaksin_1') is-invalid @enderror" id="kota_vaksin_1" name="kota_vaksin_1" required readonly value="{{ old('kota_vaksin_1', $user->kota_vaksin_1) }}">
                    @error('kota_vaksin_1')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                </div>

                 <div class="mb-3">
                    <label for="img_bukti_1" class="form-label @error('img_bukti_1') is-invalid @enderror">Bukti Vaksinasi Ke-1</label>
                    <input type="hidden" name="img_bukti_1" value="{{ $user->img_bukti_1 }}">
                    @if ($user->img_bukti_1)
                    <img src="{{ asset('storage/' . $user->img_bukti_1) }}" id="img-preview-1" class="img-preview img-fluid mb-3 col-sm-5 d-block">
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
                    <br>
                    <select class="form-control" name="jenis_vaksin_2" readonly>
                        <option value="" selected>--Pilih Jenis Vaksin Ke-2--</option>
                      @foreach ($vaksins as $vaksin )
                      @if (old('jenis_vaksin_2', $user->jenis_vaksin_2) == $vaksin->jenis_vaksin)
                          <option value="{{ $vaksin->jenis_vaksin }}" selected>{{ $vaksin->jenis_vaksin }}</option>
                      @else
                          <option value="{{ $vaksin->jenis_vaksin }}">{{ $vaksin->jenis_vaksin }}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
  
                    <div class="col-md-6 mb-3">
                      <label for="tgl_vaksin_1" class="form-label">Tanggal Vaksin Ke-2</label>
                      <input type="date" class="form-control @error('tgl_vaksin_2') is-invalid @enderror" id="tgl_vaksin_2" name="tgl_vaksin_2"  readonly required value="{{ old('tgl_vaksin_2', $user->tgl_vaksin_2) }}">
                      @error('tgl_vaksin_2')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
  
                    <div class="col-md-6 mb-3">
                      <label for="kota_vaksin_2" class="form-label">Kota Vaksinasi Ke-2</label>
                      <input type="text" class="form-control @error('kota_vaksin_2') is-invalid @enderror" id="kota_vaksin_2" name="kota_vaksin_2"  readonly required value="{{ old('kota_vaksin_2', $user->kota_vaksin_2) }}">
                      @error('kota_vaksin_2')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                
              </div>

              <div class="mb-3">
                  <label for="img_bukti_2" class="form-label @error('img_bukti_2') is-invalid @enderror">Bukti Vaksinasi Ke-2</label>
                  <input type="hidden" name="img_bukti_2" value="{{ $user->img_bukti_2 }}">
                  @if ($user->img_bukti_2)
                  <img src="{{ asset('storage/' . $user->img_bukti_2) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block" id="img-preview-2">
                 @endif
                  @error('img_bukti_2')
                  <div class="invalid-feedback">
                  {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="row">
                  <div class="col-12 mt-5">
                    <center><small class="text-secondary mt-4">Pastikan data yang telah di-isi form diatas sudah benar.</small>
                    <br>
                    <button type="submit" class="btn btn-primary mt-2 ">Kirim Data Pendaftaran</button></center>
                  </div>
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
