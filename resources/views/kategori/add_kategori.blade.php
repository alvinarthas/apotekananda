@extends('layouts.master')
@section('content')
      <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">Kategori Barang</h3>
                      </div><!-- /.box-header -->
                      <!-- form start -->
                      <form action="/kategori" method="POST">
                        {{ csrf_field() }}
                        <div class="box-body">
                          <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              <input type="text" name="kategori" class="form-control" placeholder="Nama Kategori" required>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                    </div><!-- /.box -->
@endsection
