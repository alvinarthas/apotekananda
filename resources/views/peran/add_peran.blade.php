@extends('layouts.master')
@section('content')
<div class="box">
      <div class="box-header">
        <h3 class="box-title">Tambah Peran</h3><br><br>
      </div><!-- /.box-header -->
      <div class="box-body">
        <form action="/peran" method="post">
          {{ csrf_field() }}
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name="peran" class="form-control" placeholder="Peran" required>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
              <br><br><br><br>
              </div>
            </div>
            <div align="right" class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
      </div><!-- /.box-body -->
</div><!-- /.box -->
@endsection
@section('footjs')
@endsection
