@extends('layouts.master')
@section('content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Edit PBF</h3>
  </div><!-- /.box-header -->
      <!-- form start -->
      <form action="/pbf/{{$pbf->id}}" method="POST">
      {{ method_field('PUT') }}
      {{ csrf_field() }}
    <div class="box-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" name="pbf" class="form-control" value="{{$pbf->pbf}}"placeholder="Nama PBF" required>
            </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" name="kode_pbf" class="form-control" value="{{$pbf->kode_pbf}}" placeholder="Kode PBF" required>
            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" name="alamat" class="form-control" value="{{$pbf->alamat}}" placeholder="Alamat PBF" required>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="number" name="telepon" class="form-control" value="{{$pbf->telepon}}" placeholder="Telepon PBF" required>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" name="pic" class="form-control" value="{{$pbf->pic}}" placeholder="Nama Pegawai PBF" required>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="number" name="telepon_pic" class="form-control"value="{{$pbf->telepon_pic}}" placeholder="Telepon Pegawai PBF" required>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div><!-- /.box -->
@endsection
