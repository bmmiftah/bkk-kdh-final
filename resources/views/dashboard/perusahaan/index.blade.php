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
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-flag fa-sm fa-fw mr-2 text-gray-400"></i> Data Perusahaan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="tabelPerusahaan" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Perusahaan</th>
                        <th scope="col">Detail Perusahaan</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
               
                <tbody>
                    @foreach ($perusahaans as $perusahaan )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $perusahaan->nama_perusahaan }}</td>
                        <td>{!! $perusahaan->detail_perusahaan !!}</td>
                        <td class="text-right">
                            <a href="/dashboard/perusahaan/{{ $perusahaan->slug }}/edit" class="badge bg-warning text-light"><i style="color: white" class="fas fa-edit fa-md fa-fw"></i>Edit</a>

                            <form action="/dashboard/perusahaan/{{ $perusahaan->slug }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
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
    $('#tabelPerusahaan').DataTable();
} );
</script>

@endsection
