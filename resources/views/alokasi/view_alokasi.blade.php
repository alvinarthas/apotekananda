@extends('layouts.master')
@section('content')
<div class="box">
                <div class="box-header">
                  <h3 class="box-title">List Alokasi Barang</h3><br>
                  <a href="/alokasi/create"><button class="btn btn-default">Tambah Alokasi</button></a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="alokasi_tbl" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode RAK</th>
                        <th>Options</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php ($i=1)
                      @foreach($alokasis as $alokasi)
                      <tr>
                        <td>{{$i}}</td>
                        <td><a href="alokasi/{{$alokasi->kode_rak}}">{{$alokasi->kode_rak }}</a></td>
                        <td>
                        <form action="/alokasi/{{$alokasi->kode_rak}}" method="POST">
                            {{ csrf_field()}}
                            {{ method_field('DELETE') }}
                        <a href="alokasi/{{$alokasi->kode_rak}}/edit">Edit</a>
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
