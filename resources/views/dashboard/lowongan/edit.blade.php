@extends('dashboard.layouts.main')

@section('container')

<div class="justify-content-center">

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>Edit Lowongan | {{ $lowongan->title_lowongan }}</h6>
        </div>
        <div class="card-body mx-10">
            <form method="post" action="/dashboard/lowongan/{{ $lowongan->slug }}" class="mb-5" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                  <label for="title_lowongan" class="form-label">Judul lowongan</label>
                  <input type="text" class="form-control @error('title_lowongan') is-invalid @enderror" id="title_lowongan" name="title_lowongan" required autofocus value="{{ old('title_lowongan', $lowongan->title_lowongan) }}">
                  @error('title_lowongan')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
        
                <div class="mb-3">
                  <label for="slug" class="form-label">Slug</label>
                  <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required readonly value="{{ old('slug', $lowongan->slug) }}">
                  @error('slug')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="perusahaan" class="form-label">Perusahaan</label>
                  <br>
                  <select class="form-control" name="perusahaan_id" required>
                      <option value="" selected>--Pilih Perusahaan--</option>
                    @foreach ($perusahaans as $perusahaan )
                     @if (old('perusahaan_id', $lowongan->perusahaan_id) == $perusahaan->id)
                        <option value="{{ $perusahaan->id }}" selected>{{ $perusahaan->nama_perusahaan }}</option>
                     @else
                        <option value="{{ $perusahaan->id }}">{{ $perusahaan->nama_perusahaan }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>

                <div class="mb-3">
                    <label for="tgl_buka" class="form-label">Tanggal Buka Pendaftaran</label>
                    <input type="date" class="form-control @error('tgl_buka') is-invalid @enderror" id="tgl_buka" name="tgl_buka" required autofocus value="{{ old('tgl_buka', $lowongan->tgl_buka) }}">
                    @error('tgl_buka')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                <div class="mb-3">
                    <label for="tgl_tutup" class="form-label">Tanggal Tutup Pendaftaran</label>
                    <input type="date" class="form-control @error('tgl_tutup') is-invalid @enderror" id="tgl_tutup" name="tgl_tutup" required autofocus value="{{ old('tgl_tutup', $lowongan->tgl_tutup) }}">
                    @error('tgl_tutup')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
        
                {{-- <div class="mb-3">
                  <label for="image" class="form-label @error('image') is-invalid @enderror">Post Image</label>
                  <img class="img-preview img-fluid mb-3 col-sm-5">
                  <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
                  @error('image')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div> --}}
        
                {{-- trix detail lowongan --}}
                <div class="mb-3">
                  <label for="detail_lowongan" class="form-label @error('detail_lowongan') is-invalid @enderror">Isi Detail Lowongan</label>
                  @error('detail_lowongan')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                 
                   <input id="detail_lowongan" type="hidden" name="detail_lowongan" value="{{ old('detail_lowongan', $lowongan->detail_lowongan) }}" required>
                  <trix-editor input="detail_lowongan"></trix-editor>
                </div>

                {{-- trix kriteria lowongan --}}
                <div class="mb-3">
                  <label for="kriteria_lowongan" class="form-label @error('kriteria_lowongan') is-invalid @enderror">Isi Kriteria Lowongan</label>
                  @error('kriteria_lowongan')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                 
                   <input id="kriteria_lowongan" type="hidden" name="kriteria_lowongan" value="{{ old('kriteria_lowongan', $lowongan->kriteria_lowongan) }}" required>
                  <trix-editor input="kriteria_lowongan"></trix-editor>
                </div>

                {{-- trix informasi tambahan --}}
                <div class="mb-3">
                  <label for="informasi_tambahan" class="form-label">Isi Informasi Tambahan</label>
                  @error('informasi_tambahan')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                 
                   <input id="informasi_tambahan" type="hidden" name="informasi_tambahan" value="{{ old('informasi_tambahan', $lowongan->informasi_tambahan) }}">
                  <trix-editor input="informasi_tambahan"></trix-editor>
                </div>
                
                <button type="submit" class="btn btn-primary">Update Lowongan</button>
              </form>
        </div>
    </div>

</div>


<script>
    const title = document.querySelector('#title_lowongan');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/lowongan/checkSlug?title_lowongan=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });

    // document.addEventListener('trix-file-accept', function(e) {
    //   e.preventDefault()
    // });
   
</script>

@endsection