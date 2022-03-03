@extends('layouts.layout')
@push('css')
     <!-- DataTables -->
     <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
     <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
     <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ $title }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ $action }}">Home</a></li>
              <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    @include('layouts.flash-message')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">{{ $title }}</h3>
              <div class="card-tools">
                <a href="{{ route('patient.create') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Tambah Pasien</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="dataPatient" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Alamat</th>
                    <th>Pekerjaan</th>
                    <th>Agama</th>
                    <th>Umur</th>
                    <th>HandPhone</th>
                    <th>Jenis Kelamin</th>
                    <th>Status Menikah</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Alamat</th>
                    <th>Pekerjaan</th>
                    <th>Agama</th>
                    <th>Umur</th>
                    <th>HandPhone</th>
                    <th>Jenis Kelamin</th>
                    <th>Status Menikah</th>
                    <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
@push('scripts')
  <!-- DataTables  & Plugins -->
  <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#dataPatient').DataTable({
                processing: true,
                serverSide: true,
                dom: 'Bfrtip',
                buttons: ['pageLength', 'copy', 'csv', 'excel', 'pdf', 'print'],
                ajax: "{{ route('patient.list') }}",
                columns: [
                    {data: 'nama', name: 'nama'},
                    {data: 'alamat', name: 'alamat'},
                    {data: 'pekerjaan', name: 'pekerjaan'},
                    {data: 'agama', name: 'agama'},
                    {data: 'umur', name: 'umur'},
                    {data: 'hp', name: 'hp'},
                    {data: 'kelamin', name: 'kelamin'},
                    {data: 'status_menikah', name: 'status_menikah'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

        });
      </script>
@endpush
