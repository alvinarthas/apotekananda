@extends('layouts.master')
@section('content')
<div class="box">
                <div class="box-header">
                  <h3 class="box-title">List Data Satuan</h3><br>
                  <a href="/role/create"><button class="btn btn-default">Tambah Peran</button></a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form action="/roles" method="post">
                    {{ csrf_field() }}
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Akun</th>
                        <th>Peran</th>
                        <th>Options</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php ($i=1)
                      @foreach($akunrole as $data)
                      <tr>
                        <td>{{$i}}</td><input name="user" type="hidden" value="{{$data->user_id}}"><input name="role" type="hidden" value="{{$data->role_id}}">
                        <td>{{$data->first_name}} {{$data->last_name}}</td>
                        <td>{{$data->name}}</td>
                        <td>
                        <button class="btn btn-default">Delete</button>
                        </td>
                        @php ($i++)
                      </tr>
                      @endforeach
                      </form>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

@endsection
