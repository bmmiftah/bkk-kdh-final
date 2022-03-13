@extends('dashboard.layouts.main')

@section('container')

<div class="justify-content-center">


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-flag fa-sm fa-fw mr-2 text-gray-400"></i>Edit Perusahaan Baru | {{ $perusahaan->nama_perusahaan }}</h6>
        </div>
        <div class="card-body mx-10">
            <form method="post" action="/dashboard/perusahaan/{{ $perusahaan->slug }}" class="mb-5" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                  <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                  <input type="text" class="form-control @error('nama_perusahaan') is-invalid @enderror" id="nama_perusahaan" name="nama_perusahaan" autofocus value="{{ old('nama_perusahaan', $perusahaan->nama_perusahaan) }}">
                  @error('nama_perusahaan')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
        
                <div class="mb-3">
                  <label for="slug" class="form-label">Slug</label>
                  <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $perusahaan->slug) }}">
                  @error('slug')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
        
                <div class="mb-3">
                  <label for="detail_perusahaan" class="form-label">Detail Perusahaan</label>
                  @error('detail_perusahaan')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                 
                   <input id="detail_perusahaan" type="hidden" name="detail_perusahaan" value="{{ old('detail_perusahaan', $perusahaan->detail_perusahaan) }}" required>
                  <trix-editor input="detail_perusahaan"></trix-editor>
                </div>
                
                <button type="submit" class="btn btn-primary">Update Perusahaan</button>
              </form>
        </div>
    </div>

</div>


<script>
    const title = document.querySelector('#nama_perusahaan');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/perusahaan/checkSlug?nama_perusahaan=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e) {
      e.preventDefault()
    });

    function previewImage() {
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
    }
   
</script>

@endsection