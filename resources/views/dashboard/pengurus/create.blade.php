@extends('dashboard.layouts.main')

@section('container')



    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Buat Pengurus Baru</h6>
        </div>
        <div class="card-body mx-10">
            <form method="post" action="/dashboard/pengurus" class="mb-5" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama </label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" autofocus required value="{{ old('nama') }}">
                  @error('nama')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="jabatan" class="form-label">Jabatan </label>
                  <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" autofocus required value="{{ old('jabatan') }}">
                  @error('jabatan')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
        
                <div class="mb-3">
                    <label for="img_pengurus" class="form-label @error('img_pengurus') is-invalid @enderror">Foto Pengurus</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input name="img_pengurus" class="form-control" type="file" id="img_pengurus" name="img_pengurus" onchange="previewImage()">
                    @error('img_pengurus')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                
                <button type="submit" class="btn btn-primary">Tambah Pengurus</button>
              </form>
        </div>
    </div>

</div>


<script>

    document.addEventListener('trix-file-accept', function(e) {
      e.preventDefault()
    });

    function previewImage() {
      const img_pengurus = document.querySelector('#img_pengurus');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(img_pengurus.files[0]);

      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
    }
   
</script>

@endsection