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
                  <label for="nama">Nama Pasien</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat Pasien</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
                </div>
                <div class="form-group">
                    <label for="pekerjaan">Pekerjaan Pasien</label>
                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" required>
                </div>
                <div class="form-group">
                    <label for="agama">Agama Pasien</label>
                    <input type="text" class="form-control" id="agama" name="agama" placeholder="Agama" required>
                </div>
                <div class="form-group">
                    <label for="umur">Umur Pasien</label>
                    <input type="number" class="form-control" id="umur" name="umur" placeholder="Umur" required>
                </div>
                <div class="form-group">
                    <label for="hp">Nomor Hp Pasien</label>
                    <input type="text" class="form-control" id="hp" name="hp" placeholder="Nomor Hp" required>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="form-control select2" id="kelamin" name="kelamin" style="width: 100%;" required>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option vaelu="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Status Menikah</label>
                    <select class="form-control select2" id="status_menikah" name="status_menikah" style="width: 100%;">
                        <option value="Belum Menikah">Belum Menikah</option>
                        <option value="Sudah Menikah">Sudah Menikah</option>
                    </select>
                  </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Submit</button>
                <a href="{{ route('patient.index') }}" class="btn btn-info"><i class="fa fa-arrow-left"></i> Back</a>
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
