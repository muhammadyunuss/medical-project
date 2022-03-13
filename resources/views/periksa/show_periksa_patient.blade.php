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
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="{{ $patient->nama }}" readonly>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat Pasien</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="{{ $patient->alamat }}" readonly>
                </div>
                <div class="form-group">
                    <label for="pekerjaan">Pekerjaan Pasien</label>
                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" value="{{ $patient->pekerjaan }}" readonly>
                </div>
                <div class="form-group">
                    <label for="agama">Agama Pasien</label>
                    <input type="text" class="form-control" id="agama" name="agama" placeholder="Agama" value="{{ $patient->agama }}" readonly>
                </div>
                <div class="form-group">
                    <label for="umur">Umur Pasien</label>
                    <input type="number" class="form-control" id="umur" name="umur" placeholder="Umur" value="{{ $patient->umur }}" readonly>
                </div>
                <div class="form-group">
                    <label for="hp">Nomor Hp Pasien</label>
                    <input type="text" class="form-control" id="hp" name="hp" placeholder="Nomor Hp" value="{{ $patient->hp }}" readonly>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <input type="text" class="form-control" id="kelamin" name="kelamin" placeholder="Nomor Hp" value="{{ $patient->kelamin }}" readonly>
                </div>
                <div class="form-group">
                    <label>Status Menikah</label>
                    <input type="text" class="form-control" id="status_menikah" name="status_menikah" placeholder="Status Menikah" value="{{ $patient->status_menikah }}" readonly>
                  </div>
              </div>
              {{-- <div class="card-footer">
                <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Submit</button>
                <a href="{{ route('patient.index') }}" class="btn btn-info"><i class="fa fa-arrow-left"></i> Back</a>
              </div> --}}
            </form>
          </div>
          <div class="row">
            <div class="col-12">
              <!-- Custom Tabs -->
              <div class="card">
                <div class="card-header d-flex p-0">
                  <h3 class="card-title p-3">Tabs</h3>
                  <ul class="nav nav-pills ml-auto p-2">
                    <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Tab 1</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Tab 2</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Tab 3</a></li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                        Dropdown <span class="caret"></span>
                      </a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" tabindex="-1" href="#">Action</a>
                        <a class="dropdown-item" tabindex="-1" href="#">Another action</a>
                        <a class="dropdown-item" tabindex="-1" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" tabindex="-1" href="#">Separated link</a>
                      </div>
                    </li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                      A wonderful serenity has taken possession of my entire soul,
                      like these sweet mornings of spring which I enjoy with my whole heart.
                      I am alone, and feel the charm of existence in this spot,
                      which was created for the bliss of souls like mine. I am so happy,
                      my dear friend, so absorbed in the exquisite sense of mere tranquil existence,
                      that I neglect my talents. I should be incapable of drawing a single stroke
                      at the present moment; and yet I feel that I never was a greater artist than now.
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                      The European languages are members of the same family. Their separate existence is a myth.
                      For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                      in their grammar, their pronunciation and their most common words. Everyone realizes why a
                      new common language would be desirable: one could refuse to pay expensive translators. To
                      achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                      words. If several languages coalesce, the grammar of the resulting language is more simple
                      and regular than that of the individual languages.
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3">
                      Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                      Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                      when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                      It has survived not only five centuries, but also the leap into electronic typesetting,
                      remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                      sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                      like Aldus PageMaker including versions of Lorem Ipsum.
                    </div>
                    <!-- /.tab-pane -->
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- ./card -->
            </div>
            <!-- /.col -->
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
