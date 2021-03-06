@extends('template')
@section('title','Data Karyawan')
@section('content')

    @include ('alert')
    
    <a href="karyawan/create" class="btn btn-danger"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Tambah Data</a>
    <hr>
    <table class="table table-bordered" id="example1">
            <thead>
        <tr>
            <th width="100">NIK</th>
            <th>Nama Karyawan</th>
            <th>Jabatan</th>
            <th>Departemen</th>
            <th>Tanggal Masuk</th>
            {{-- <th></th>
            <th></th> --}}
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($karyawan as $row)
        <tr>
            <td>{{ $row->nik}}</td>
            <td>{{ $row->nama }}</td>
            <td>{{ $row->nama_jabatan }}</td>
            <td>{{ $row->nama_departemen }}</td>
            <td>{{ $row->tanggal_masuk }}</td>
            {{-- <td width="50"><a href="/karyawan/{{ $row->nik}}/kehadiran" class="btn btn-success btn-sm"><i class="fa fa-calendar" aria-hidden="true"></i>
                Kehadiran </a></td>
            <td width="50"><a href="/karyawan/{{ $row->nik}}/polakerja" class="btn btn-success btn-sm"><i class="fa fa-calendar" aria-hidden="true"></i>
                Pola Kerja</a></td> --}}
            <td width="50"><a href="/karyawan/{{ $row->nik}}/edit" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
                 Detail</a></td>
            <td width="50">
                {{ Form::open(['url'=>'karyawan/'.$row->nik,'method'=>'delete'])}}
                 <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i>
                     Hapus</button>
                {{ Form::close()}}
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
@endsection
@push('scipts')
<!-- DataTables -->
<script src="{{ asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<!-- page script -->
<script>
        $(function () {
          $('#example1').DataTable()
          $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
          })
        })
      </script>
@endpush