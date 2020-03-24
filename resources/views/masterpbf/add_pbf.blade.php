@extends('layouts.master')
@section('content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">PBF</h3>
  </div><!-- /.box-header -->
      <!-- form start -->
  <form action="/pbf" method="POST">
        {{ csrf_field() }}
    <div class="box-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" name="pbf" class="form-control" placeholder="Nama PBF" required>
            </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" name="kode_pbf" class="form-control" placeholder="Kode PBF" required>
            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" name="alamat" class="form-control" placeholder="Alamat PBF" required>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="number" name="telepon" class="form-control" placeholder="Telepon PBF" required>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" name="pic" class="form-control" placeholder="Nama Pegawai PBF" required>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="number" name="telepon_pic" class="form-control" placeholder="Telepon Pegawai PBF" required>
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
