@extends('layouts.layout')
@push('css')
   <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
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
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-lightblue">
            <div class="card-header">
              <h3 class="card-title">{{ $title }}</h3>
            </div>
            <form action="{{ $action }}" method="POST">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="nama_penyakit">Nama Penyakit</label>
                  <input type="text" class="form-control" id="nama_penyakit" name="nama_penyakit" placeholder="Nama Penyakit" required>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" required>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
              </div>
            </form>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
@push('scripts')
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $('.select2').select2()
    </script>
@endpush
