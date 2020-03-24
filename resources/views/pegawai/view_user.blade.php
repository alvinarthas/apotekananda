@extends('layouts.master')
@section('content')
<div class="box">
                <div class="box-header">
                  <h3 class="box-title">List Data Akun</h3><br>
                  <a href="/akun/create"><button class="btn btn-default">Tambah Akun</button></a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="tbl_akun" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Jenis Kelamin</th>
                        <th>Foto</th>
                        <th>Options</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php ($i=1)
                      @foreach($akuns as $akun)
                      <tr>
                        <td>{{$i}} <input name="id" type="hidden" value="{{$akun->id}}"></td>
                        <td>{{$akun->first_name}}&nbsp{{$akun->last_name}}</td>
                        <td>{{$akun->alamat}}</td>
                        <td>{{$akun->telepon}}</td>
                        <td>{{$akun->sex}}</td>
                        <td><img width="80" height="80" alt="image" class="img-circle" src="../assets/img/{{$akun->img}}" alt="User Image"></td>
                        <td>
                        <form action="/akun/{{$akun->id}}" method="POST">
                            {{ csrf_field()}}
                            {{ method_field('DELETE') }}
                        <a href="akun/{{$akun->id}}/edit">Update</a>
                        <button class="btn btn-default">Delete</button>
                        </form>
                        </td>
                        @php ($i++)
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

@endsection
