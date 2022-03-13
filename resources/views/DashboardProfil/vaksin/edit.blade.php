@extends('dashboardProfil.layouts.main')

@section('container')
<div class="justify-content-center">

  
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-paperclip fa-sm fa-fw mr-2 text-gray-400"></i>Data Vaksinasi</h6>
        </div>
        <div class="card-body mx-10">
            <form method="post" action="/vaksin/{{ $user->id }}" class="mb-5" enctype="multipart/form-data">
                @method('put')
                @csrf
                
                {{-- input data vaksin ke-1 --}}
                <div class="row data-vaksin-1 item-center">

                  <div class="col-md-6 mb-3">
                    <label for="jenis_vaksin_1" class="form-label">Jenis Vaksin Ke-1</label>
                    <br>
                    <select class="form-control" name="jenis_vaksin_1">
                        <option value="" selected>--Pilih Jenis Vaksin Ke-1--</option>
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
                    <input type="date" class="form-control @error('tgl_vaksin_1') is-invalid @enderror" id="tgl_vaksin_1" name="tgl_vaksin_1" required value="{{ old('tgl_vaksin_1', $user->tgl_vaksin_1) }}">
                    @error('tgl_vaksin_1')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="kota_vaksin_1" class="form-label">Kota Vaksinasi Ke-1</label>
                    <input type="text" class="form-control @error('kota_vaksin_1') is-invalid @enderror" id="kota_vaksin_1" name="kota_vaksin_1" required value="{{ old('kota_vaksin_1', $user->kota_vaksin_1) }}">
                    @error('kota_vaksin_1')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                </div>

                 <div class="mb-3">
                    <label for="img_bukti_1" class="form-label @error('img_bukti_1') is-invalid @enderror">Bukti Vaksinasi Ke-1</label>
                    <input type="hidden" name="oldImg_bukti_1" value="{{ $user->img_bukti_1 }}">
                    @if ($user->img_bukti_1)
                    <img src="{{ asset('storage/' . $user->img_bukti_1) }}" id="img-preview-1" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    @else
                    <img class="img-preview img-fluid mb-3 col-sm-5" id="img-preview-1">
                    @endif
                    <img class="img-preview img-fluid mb-3 col-sm-5" id="img-preview-1">
                    <input class="form-control" type="file" id="img_bukti_1" name="img_bukti_1" onchange="previewImage1()">
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
                      <select class="form-control" name="jenis_vaksin_2">
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
                        <input type="date" class="form-control @error('tgl_vaksin_2') is-invalid @enderror" id="tgl_vaksin_2" name="tgl_vaksin_2" required value="{{ old('tgl_vaksin_2', $user->tgl_vaksin_2) }}">
                        @error('tgl_vaksin_2')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
    
                      <div class="col-md-6 mb-3">
                        <label for="kota_vaksin_2" class="form-label">Kota Vaksinasi Ke-2</label>
                        <input type="text" class="form-control @error('kota_vaksin_2') is-invalid @enderror" id="kota_vaksin_2" name="kota_vaksin_2" required value="{{ old('kota_vaksin_2', $user->kota_vaksin_2) }}">
                        @error('kota_vaksin_2')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                  
                </div>

                <div class="mb-3">
                    <label for="img_bukti_2" class="form-label @error('img_bukti_2') is-invalid @enderror">Bukti Vaksinasi Ke-2</label>
                    <input type="hidden" name="oldImg_bukti_2" value="{{ $user->img_bukti_2 }}">
                    @if ($user->img_bukti_2)
                    <img src="{{ asset('storage/' . $user->img_bukti_2) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block" id="img-preview-2">
                    @else
                    <img class="img-preview img-fluid mb-3 col-sm-5" id="img-preview-2">
                    @endif
                    <img class="img-preview img-fluid mb-3 col-sm-5" id="img-preview-2">
                    <input class="form-control" type="file" id="img_bukti_2" name="img_bukti_2" onchange="previewImage2()">
                    @error('img_bukti_2')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                    @enderror
                  </div>

                <button type="submit" class="btn btn-primary">Update Data Vaksin</button>
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