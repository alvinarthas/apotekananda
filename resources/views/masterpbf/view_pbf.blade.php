@extends('layouts.master')
@section('content')
<div class="box">
                <div class="box-header">
                  <h3 class="box-title">List Data PBF</h3><br>
                  <a href="/pbf/create"><button class="btn btn-default">Tambah PBF</button></a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="master_pbf" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama PBF</th>
                        <th>Kode PBF</th>
                        <th>Alamat PBF</th>
                        <th>Telepon PBF</th>
                        <th>Nama Pegawai PBF</th>
                        <th>Telepon Pegawai PBF</th>
                        <th>Options</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php ($i=1)
                      @foreach($pbfs as $pbf)
                      <tr>
                        <td>{{$i}} <input name="id" type="hidden" value="{{$pbf->id}}"></td>
                        <td>{{$pbf->pbf }}</td>
                        <td>{{$pbf->kode_pbf }}</td>
                        <td>{{$pbf->alamat }}</td>
                        <td>{{$pbf->telepon }}</td>
                        <td>{{$pbf->pic }}</td>
                        <td>{{$pbf->telepon_pic }}</td>
                        <td>
                        <form action="/pbf/{{$pbf->id}}" method="POST">
                            {{ csrf_field()}}
                            {{ method_field('DELETE') }}
                        <a href="pbf/{{$pbf->id}}/edit">Update</a>
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
