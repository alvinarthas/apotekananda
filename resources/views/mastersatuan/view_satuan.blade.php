@extends('layouts.master')
@section('content')
<div class="box">
                <div class="box-header">
                  <h3 class="box-title">List Data Satuan</h3><br>
                  <a href="/satuan/create"><button class="btn btn-default">Tambah Satuan</button></a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="master_satuan" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Satuan</th>
                        <th>Singkatan Satuan</th>
                        <th>Options</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php ($i=1)
                      @foreach($satuans as $satuan)
                      <tr>
                        <td>{{$i}} <input name="id" type="hidden" value="{{$satuan->id}}"></td>
                        <td>{{$satuan->satuan }}</td>
                        <td>{{$satuan->singkatan }}</td>
                        <td>
                        <form action="/satuan/{{$satuan->id}}" method="POST">
                            {{ csrf_field()}}
                            {{ method_field('DELETE') }}
                        <a href="satuan/{{$satuan->id}}/edit">Update</a>
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
