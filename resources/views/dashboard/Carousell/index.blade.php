@extends('dashboard.layouts.main')

@section('container')

@if (session()->has('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-info fa-sm fa-fw mr-2 text-gray-400"></i> Data Carousell Informasi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="tabelCarousell" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Gambar Carousell</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
               
                <tbody>
                    @foreach ($carousels as $carousell )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $carousell->title_carousel }}</td>
                        <td>{{  $carousell->img_carousel  }}</td>
                        <td class="text-center">
                            <a href="/dashboard/carousell/{{ $carousell->id }}/edit" class="badge bg-warning"><i style="color: white" class="fas fa-edit fa-md fa-fw"></i></a>

                            <form action="/dashboard/carousell/{{ $carousell->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('are you sure?')"><i style="color: white" class="fas fa-trash fa-md fa-fw"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection

@section('tables')

<script>
$(document).ready( function () {
    $('#tabelCarousell').DataTable();
} );
</script>

@endsection
