@extends('dashboard.layouts.main')

@section('container')

<div class="justify-content-center">

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Buat Carousell Informasi Baru</h6>
        </div>
        <div class="card-body mx-10">
            <form method="post" action="/dashboard/carousell" class="mb-5" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="title_carousel" class="form-label">Judul Carousell </label>
                  <input type="text" class="form-control @error('title_carousel') is-invalid @enderror" id="title_carousel" name="title_carousel" autofocus required value="{{ old('title_carousel') }}">
                  @error('title_carousel')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
        
                <div class="mb-3">
                    <label for="img_carousel" class="form-label @error('img_carousel') is-invalid @enderror">Gambar Carousell</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input name="img_carousel" class="form-control" type="file" id="img_carousel" name="img_carousel" onchange="previewImage()">
                    @error('img_carousel')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                
                <button type="submit" class="btn btn-primary">Tambah Carousell Informasi</button>
              </form>
        </div>
    </div>

</div>


<script>

    document.addEventListener('trix-file-accept', function(e) {
      e.preventDefault()
    });

    function previewImage() {
      const img_carousel = document.querySelector('#img_carousel');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(img_carousel.files[0]);

      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
    }
   
</script>

@endsection