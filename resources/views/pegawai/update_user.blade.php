@extends('layouts.master')
@section('content')
      <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">Edit Akun</h3>
                      </div><!-- /.box-header -->
                      <!-- form start -->
                        <form action="/akun/{{$akun->id}}" method="POST" enctype="multipart/form-data">
                          {{ method_field('PUT') }}
                          {{ csrf_field() }}
                        <div class="box-body">
                          <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              <input name="id" type="hidden" value="{{$akun->id}}">
                              <input type="text" name="first_name" class="form-control" value="{{$akun->first_name}}" placeholder="First Name" required>
                            </div>
                          </div>
                          <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" name="last_name" class="form-control" value="{{$akun->last_name}}" placeholder="Last Name"required>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              <input type="text" name="username" class="form-control" value="{{$akun->username}}" placeholder="Username"required>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-fw fa-bank"></i></span>

                              <input type="text" name="alamat" class="form-control"value="{{$akun->alamat}}" placeholder="Alamat"required>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-fw fa-phone"></i></span>

                              <input type="number" name="telepon" class="form-control"value="{{$akun->telepon}}" placeholder="Telepon"required>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                              <input type="email" name="email" class="form-control" value="{{$akun->email}}" placeholder="Email">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                              <input type="password" name="password" class="form-control" placeholder="Password"required>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                            <input type="password" name="pass_conf" class="form-control" placeholder="Password Confirmation"required>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                          <input type="file" name="img" multiple />
                        </div>
                      </div>
                      <div class="form-group">
                        <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                        <select class="form-control select2" id=selectjenis name="sex"required>
                          <option>Laki-laki</option>
                          <option>Perempuan</option>
                        </select>
                      </div>
                    </div><!-- /.box-body -->

                        <div class="box-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                    </div><!-- /.box -->
@endsection
