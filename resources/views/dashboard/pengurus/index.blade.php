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
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-info fa-sm fa-fw mr-2 text-gray-400"></i> Data Pengurus</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="tabelPengurus" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">File Foto</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
               
                <tbody>
                    @foreach ($penguruses as $pengurus )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pengurus->nama }}</td>
                        <td>{{ $pengurus->jabatan }}</td>
                        <td>{{ $pengurus->img_pengurus }}</td>
                        <td class="text-right">
                            <a href="/dashboard/pengurus/{{ $pengurus->id }}/edit" class="badge bg-warning text-light"><i style="color: white" class="fas fa-edit fa-md fa-fw"></i>Edit</a>

                            <form action="/dashboard/pengurus/{{ $pengurus->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0 text-light" onclick="return confirm('are you sure?')"><i style="color: white" class="fas fa-trash fa-md fa-fw"></i>Hapus</button>
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
    $('#tabelPengurus').DataTable();
} );
</script>

@endsection
