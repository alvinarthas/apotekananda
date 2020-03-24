@extends('layouts.master')
@section('content')
      <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">Kategori Barang</h3>
                      </div><!-- /.box-header -->
                      <!-- form start -->
                      <form action="/kategori/{{$kategori->id}}" method="POST">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <div class="box-body">
                          <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              <input name="id" type="hidden" value="{{$kategori->id}}">
                              <input type="text" name="kategori" class="form-control" value="{{$kategori->kategori}}" placeholder="Nama Kategori" required>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                    </div><!-- /.box -->
@endsection
