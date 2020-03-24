@extends('layouts.master')
@section('content')
<div class="box">
                <div class="box-header">
                  <h3 class="box-title">List Peran</h3><br>
                  <a href="/peran/create"><button class="btn btn-default">Tambah Peran</button></a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="peran_tbl" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Peran</th>
                        <th>Options</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php ($i=1)
                      @foreach($perans as $peran)
                      <tr>
                        <td>{{$i}}</td>
                        <td>{{$peran->name }}</td>
                        <td>
                        <form action="/peran/{{$peran->id}}" method="POST">
                            {{ csrf_field()}}
                            {{ method_field('DELETE') }}
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
