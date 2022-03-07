@extends('layouts.layout')
@push('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                <button style="float: right; font-weight: 900;" class="btn btn-info btn-sm" type="button"  data-toggle="modal" data-target="#CreateModal">
                    Tambah Obat
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="dataObat" class="table table-bordered table-striped datatable">
                <thead>
                <tr>
                    <th>Nama Obat</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                <tr>
                    <th>Nama Obat</th>
                    <th>Keterangan</th>
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

<!-- Create Article Modal -->
<div class="modal fade" id="CreateModal">
    <div class="modal-dialog CreateModal">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Obat</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="createFrom">
                <div class="form-group">
                    <label for="nama_obat">Nama Obat:</label>
                    <input type="text" class="form-control" name="nama_obat" id="nama_obat">
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan:</label>
                    <textarea class="form-control" name="keterangan" id="keterangan"></textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary" id="SubmitCreateForm">Simpan</button>
        </div>
      </div>
    </div>
</div>

<!-- Edit Obat Modal -->
<div class="modal" id="EditModal">
    <div class="modal-dialog EditModal">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Obat</h4>
          <button type="button" class="close modelClose" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body ">
            <div id="EditModalBody">

            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default modelClose" data-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-primary" id="SubmitEditForm">Edit</button>
        </div>
      </div>
    </div>
</div>

<!-- Delete Article Modal -->
<div class="modal fade" id="DeleteModal">
    <div class="modal-dialog DeleteModal">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Hapus Obat</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h3>Apakah anda ingin menghapus data ini ?</h3>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          <button type="button" class="btn btn-danger" id="SubmitDeleteForm">Ya</button>
        </div>
      </div>
    </div>
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
        $(function () {
            $('#dataObat').DataTable({
                processing: true,
                serverSide: true,
                // dom: 'Bfrtip',
                // buttons: ['pageLength', 'copy', 'csv', 'excel', 'pdf', 'print'],
                ajax: "{{ route('obat.list') }}",
                columns: [
                    {data: 'nama_obat', name: 'nama_obat'},
                    {data: 'keterangan', name: 'keterangan'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true,
                    },
                ]
            });
        });

        // Create article Ajax request.
        $('#SubmitCreateForm').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('obat.store') }}",
                method: 'post',
                data: {
                    nama_obat: $('#nama_obat').val(),
                    keterangan: $('#keterangan').val(),
                },
                success: function(result) {
                    if(result.errors) {
                        $('.alert-danger').html('');
                        $.each(result.errors, function(key, value) {
                            $('.alert-danger').show();
                            $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
                        });
                    } else {
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('.datatable').DataTable().ajax.reload();
                        $('#CreateModal').modal('hide');
                        let message = document.getElementById("message");
                        let messageText = document.createTextNode("Data Berhasil Di Simpan!");
                        message.appendChild(messageText);
                        // location.reload();
                        document.getElementById("createFrom").reset();
                    }
                }
            });
        });


        // Get single Obat in EditModel
        $('.modelClose').on('click', function(){
            $('#EditModal').hide();
        });
        var id;
        $('body').on('click', '#getEditData', function(e) {
            // e.preventDefault();
            $('.alert-danger').html('');
            $('.alert-danger').hide();
            id = $(this).data('id');
            $.ajax({
                url: "obat/"+id+"/edit",
                method: 'GET',
                // data: {
                //     id: id,
                // },
                success: function(result) {
                    // console.log(result.html);
                    $('#EditModalBody').html(result.html);
                    $('#EditModal').show();
                }
            });
        });

        // Update article Ajax request.
        $('#SubmitEditForm').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "obat/"+id,
                method: 'PUT',
                data: {
                    nama_obat: $('#editNamaObat').val(),
                    keterangan: $('#editKeterangan').val(),
                },
                success: function(result) {
                    if(result.errors) {
                        $('.alert-danger').html('');
                        $.each(result.errors, function(key, value) {
                            $('.alert-danger').show();
                            $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
                        });
                    } else {
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('.datatable').DataTable().ajax.reload();
                        $('#EditModal').hide();
                        let message = document.getElementById("message");
                        let messageText = document.createTextNode("Data Berhasil Di Update!");
                        message.appendChild(messageText);
                    }
                }
            });
        });

        // Delete article Ajax request.
        var deleteID;
        $('body').on('click', '#getDeleteId', function(){
            deleteID = $(this).data('id');
        })
        $('#SubmitDeleteForm').click(function(e) {
            e.preventDefault();
            var id = deleteID;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "obat/"+id,
                method: 'DELETE',
                success: function(result) {
                    $('.alert-danger').hide();
                    $('.alert-success').show();
                    $('.datatable').DataTable().ajax.reload();
                    $('#DeleteModal').modal('hide');
                    let message = document.getElementById("message");
                    let messageText = document.createTextNode("Data Berhasil Di Hapus!");
                    message.appendChild(messageText);
                }
            });
        });
  </script>

@endpush
