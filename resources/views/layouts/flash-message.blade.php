<div class="mr-3 ml-3">
    @if(Session::has('fail'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
        {{Session::get('fail')}}
    </div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Alert!</h5>
        {{Session::get('success')}}
    </div>
    @endif
    <div class="alert alert-danger alert-dismissible" role="alert" style="display: none;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-ban"></i> Data Gagal Ditambahkan!</h5>
    </div>
    <div class="alert alert-success alert-dismissible" role="alert" style="display: none;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i><div id="message"></div></h5>
    </div>
  </div>
