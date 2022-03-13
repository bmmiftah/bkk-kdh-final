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
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-briefcase fa-sm fa-fw mr-2 text-gray-400"></i> Data Pendaftaran</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="tabelPendaftaran" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">Actions</th>
                        <th scope="col">Status</th>
                        <th scope="col">Nomor Tes</th>
                        <th scope="col">Nama Pelamar</th>
                        <th scope="col">Lowongan</th>
                        {{-- <th scope="col">Perusahaan</th> --}}
                        <th scope="col">Tanggal Tutup</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Asal Sekolah</th>
                        <th scope="col">Nomor HP</th>
                        <th scope="col">Email</th>
                        <th scope="col">Ukuran Baju</th>
                        <th scope="col">Ukuran Celana</th>
                        <th scope="col">Ukuran Sepatu</th>
                        <th scope="col">Jenis Vaksin 1</th>
                        <th scope="col">Tanggal Vaksin 1</th>
                        <th scope="col">Kota Vaksin 1</th>
                        <th scope="col">Jenis Vaksin 2</th>
                        <th scope="col">Tanggal Vaksin 2</th>
                        <th scope="col">Kota Vaksin 2</th>
                    </tr>
                </thead>
               
                <tbody>
                    @foreach ($pendaftarans as $pendaftaran )
                    <tr>
                        <td class="text-left">

                            @if ($pendaftaran->status !== 'Diterima' && $pendaftaran->status !== 'Ditolak, Gagal Verifikasi Data' && $pendaftaran->status !== 'Ditolak, Gagal Tahap Psikotes' && $pendaftaran->status !== 'Ditolak, Gagal Tahap Wawancara' && $pendaftaran->status !== 'Ditolak, Gagal Tahap MCU')
                                <form action="/dashboard/pendaftaran/{{ $pendaftaran->id }}" method="post" class="d-inline">
                                    @method('put')
                                    @csrf
                                        <button class="badge bg-success text-light border-0" onclick="return confirm('are you sure?')"><i style="color: white" class="fas fa-check-circle fa-md fa-fw"></i> Update Status</button>
                                </form>

                                <form action="/pp/{{ $pendaftaran->id }}" method="post" class="d-inline">
                                    @method('put')
                                    @csrf
                                    {{-- <button class="badge bg-danger border-0" onclick="return confirm('are you sure?')"><i style="color: white" class="fas fa-trash fa-md fa-fw"></i></button> --}}
                                        <button class="badge bg-danger text-light border-0" onclick="return confirm('are you sure?')"><i style="color: white" class="fas fa-check-circle fa-md fa-fw"></i> Tolak Pendaftaran</button>
                                </form>
                            @endif

                            <a href="/dashboard/pendaftaran/{{ $pendaftaran->id }}" class="badge bg-info"><i style="color: white" class="fas fa-eye fa-md fa-fw"></i></a>
                        </td>

                        <td>{{ $pendaftaran->status }}</td>
                        <td>{{ $pendaftaran->no_tes }}</td>
                        <td>{{ $pendaftaran->nama_lengkap}}</td>
                        <td>{{ $pendaftaran->lowongan->title_lowongan }}</td>
                        {{-- <td>{{ $pendaftaran->perusahaan->nama_perusahaan }}</td> --}}
                        <td>{{ $pendaftaran->lowongan->tgl_tutup }}</td>
                        <td>{{ $pendaftaran->jenis_kelamin}}</td>
                        <td>{{ $pendaftaran->tanggal_lahir}}</td>
                        <td>{{ $pendaftaran->nama_sekolah}}</td>
                        <td>{{ $pendaftaran->no_hp}}</td>
                        <td>{{ $pendaftaran->email}}</td>
                        <td>{{ $pendaftaran->ukuran_baju}}</td>
                        <td>{{ $pendaftaran->ukuran_celana}}</td>
                        <td>{{ $pendaftaran->ukuran_sepatu}}</td>
                        <td>{{ $pendaftaran->jenis_vaksin_1}}</td>
                        <td>{{ $pendaftaran->tgl_vaksin_1}}</td>
                        <td>{{ $pendaftaran->kota_vaksin_1}}</td>
                        <td>{{ $pendaftaran->jenis_vaksin_2}}</td>
                        <td>{{ $pendaftaran->tgl_vaksin_2}}</td>
                        <td>{{ $pendaftaran->kota_vaksin_2}}</td>
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

$(document).ready(function() {
    $('#tabelPendaftaran').DataTable( {

        dom: 'Bfrtip',
        buttons: [
            'excel'
        ]

//         // initComplete: function () {
//         //     this.api().columns().every( function () {
//         //         var column = this;
//         //         var select = $('<select><option value=""></option></select>')
//         //             .appendTo( $(column.footer()).empty() )
//         //             .on( 'change', function () {
//         //                 var val = $.fn.dataTable.util.escapeRegex(
//         //                     $(this).val()
//         //                 );
 
//         //                 column
//         //                     .search( val ? '^'+val+'$' : '', true, false )
//         //                     .draw();
//         //             } );
 
//         //         column.data().unique().sort().each( function ( d, j ) {
//         //             select.append( '<option value="'+d+'">'+d+'</option>' )
//         //         } );
//         //     } );
//         // }
    } );
} );


// $(document).ready( function () {
//     $('#tabelPendaftaran').DataTable();
// } );
</script>

@endsection
