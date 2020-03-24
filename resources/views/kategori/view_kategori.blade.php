@extends('layouts.master')
@section('content')
<div class="box">
                <div class="box-header">
                  <h3 class="box-title">List Kategori Barang</h3><br>
                  <a href="/kategori/create"><button class="btn btn-default">Tambah Kategori</button></a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="master_kategori" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Options</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php ($i=1)
                      @foreach($kategoris as $kategori)
                      <tr>
                        <td>{{$i}} <input name="id" type="hidden" value="{{$kategori->id}}"></td>
                        <td>{{$kategori->kategori }}</td>
                        <td>
                        <form action="/kategori/{{$kategori->id}}" method="POST">
                            {{ csrf_field()}}
                            {{ method_field('DELETE') }}
                        <a href="kategori/{{$kategori->id}}/edit">Update</a>
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
