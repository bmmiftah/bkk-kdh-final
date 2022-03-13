@extends('dashboard.layouts.main')

@section('container')

<div class="justify-content-center">

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-plus-circle fa-sm fa-fw mr-2 text-gray-400"></i>Buat Informasi Baru</h6>
        </div>
        <div class="card-body mx-10">
            <form method="post" action="/dashboard/informasi" class="mb-5" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="title_informasi" class="form-label">Judul Informasi</label>
                  <input type="text" class="form-control @error('title_informasi') is-invalid @enderror" id="title_informasi" name="title_informasi" autofocus value="{{ old('title_informasi') }}">
                  @error('title_informasi')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
        
                <div class="mb-3">
                  <label for="slug" class="form-label">Slug</label>
                  <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}">
                  @error('slug')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
        
                <div class="mb-3">
                  <label for="category" class="form-label">Kategori Informasi</label>
                  <br>
                  <select class="form-control" name="category_id">
                    @foreach ($categories as $category )
                     @if (old('category_id') == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->title_category }}</option>
                     @else
                        <option value="{{ $category->id }}">{{ $category->title_category }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>

                {{-- <div class="mb-3">
                  <label for="lowongan" class="form-label">Lowongan</label>
                  <br>
                  <select class="form-control" name="lowongan_id">
                      <option value="" selected>Tanpa Lowongan</option>
                    @foreach ($lowongans as $lowongan )
                     @if (old('lowongan_id') == $lowongan->id)
                        <option value="{{ $lowongan->id }}" selected>{{ $lowongan->title_lowongan }}</option>
                     @else
                        <option value="{{ $lowongan->id }}">{{ $lowongan->title_lowongan }}</option>
                      @endif
                    @endforeach
                  </select>
                </div> --}}
        
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
        
                <div class="mb-3">
                  <label for="isi_informasi" class="form-label">Isi Informasi</label>
                  @error('isi_informasi')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                 
                   <input id="isi_informasi" type="hidden" name="isi_informasi" value="{{ old('isi_informasi') }}" required>
                  <trix-editor input="isi_informasi"></trix-editor>
                </div>
                
                <button type="submit" class="btn btn-primary">Buat Informasi</button>
              </form>
        </div>
    </div>

</div>


<script>
    const title = document.querySelector('#title_informasi');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/informasi/checkSlug?title_informasi=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });

    // document.addEventListener('trix-file-accept', function(e) {
    //   e.preventDefault()
    // });

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