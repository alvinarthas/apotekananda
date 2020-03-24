@extends('layouts.master')
@section('content')
      <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">Tambah Peran</h3>
                      </div><!-- /.box-header -->
                      <!-- form start -->
                      <form action="/role" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box-body">
                          <div class="form-group">
                            <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                            <select class="form-control select2" id=user name="user"required>
                              @foreach($akuns as $akun)
                              <option value="{{$akun->id}}">{{$akun->first_name}} {{$akun->last_name}}</option>
                              @endforeach
                            </select>
                          </div>
                        <div class="form-group">
                          <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                          <select class="form-control select2" id=role name="role"required>
                            @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div><!-- /.box-body -->

                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
      </div><!-- /.box -->
@endsection
