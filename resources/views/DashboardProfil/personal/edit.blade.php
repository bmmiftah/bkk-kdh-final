@extends('dashboardProfil.layouts.main')

@if (session()->has('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif

@section('container')
<div class="justify-content-center">

  
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Profil Saya</h6>
        </div>
        <div class="card-body mx-10">
            <form method="post" action="/profil/{{ $user->id }}" class="mb-5" enctype="multipart/form-data">
                @method('put')
                @csrf
                
                <div class="mb-3">
                  <label for="name" class="form-label">Nama</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required value="{{ old('name', $user->name) }}">
                  @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                
                <div class="row item-center">

                  <div class="col-md-6 mb-3">
                    <label for="nik" class="form-label">Nomor Induk Kependudukan (NIK)</label>
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" required value="{{ old('nik', $user->nik) }}">
                    @error('nik')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <br>
                    <select class="form-control" name="jenis_kelamin">
                        <option value="" selected>--Pilih Jenis Kelamin--</option>
                      @foreach ($jenis_kelamins as $jenis_kelamin )
                       @if (old('jenis_kelamin', $user->jenis_kelamin) == $jenis_kelamin->jenis_kelamin)
                          <option value="{{ $jenis_kelamin->jenis_kelamin }}" selected>{{ $jenis_kelamin->jenis_kelamin }}</option>
                       @else
                          <option value="{{ $jenis_kelamin->jenis_kelamin }}">{{ $jenis_kelamin->jenis_kelamin }}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" required value="{{ old('tempat_lahir', $user->tempat_lahir) }}">
                    @error('tempat_lahir')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" required value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}">
                    @error('tanggal_lahir')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="sekolah" class="form-label">Asal Sekolah</label>
                    <input type="text" class="form-control @error('sekolah') is-invalid @enderror" id="sekolah" name="sekolah" required value="{{ old('sekolah', $user->sekolah) }}">
                    @error('sekolah')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="no_hp" class="form-label">Nomor Yang Dapat Dihubungi</label>
                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" required value="{{ old('no_hp', $user->no_hp) }}">
                    @error('no_hp')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  
                </div>

                <div class="mb-3">
                  <label for="alamat" class="form-label">Alamat</label>
                  <textarea rows="3" type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" required>{{ old('alamat', $user->alamat) }}</textarea>
                  @error('alamat')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="avatar" class="form-label @error('avatar') is-invalid @enderror">Foto Profil</label>
                  <input type="hidden" name="oldImage" value="{{ $user->avatar }}">
                  @if ($user->avatar)
                  <img src="{{ asset('storage/' . $user->avatar) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                  @else
                  <img class="img-preview img-fluid mb-3 col-sm-5">
                  @endif
                  <img class="img-preview img-fluid mb-3 col-sm-5">
                  <input class="form-control" type="file" id="avatar" name="avatar" onchange="previewImage()">
                  @error('avatar')
                  <div class="invalid-feedback">
                  {{ $message }}
                  </div>
                  @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update Data Diri</button>
              </form>
        </div>
    </div>

</div>


<script>

    function previewImage() {
      const avatar = document.querySelector('#avatar');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(avatar.files[0]);

      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
    }

</script>


@endsection