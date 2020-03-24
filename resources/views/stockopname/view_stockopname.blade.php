@extends('layouts.master')
@section('content')
<div class="box">
                <div class="box-header">
                  <h3 class="box-title">List Stock Opname</h3><br>
                  <a href="/stokopname/create"><button class="btn btn-default">Tambah Stock Opname</button></a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>ID Stock Opname</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Options</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php ($i=1)
                      @foreach($opnames as $opname)
                      <tr>
                        <td>{{$i}}</td>
                        <td><a href="/stokopname/{{$opname->opname_id}}">{{$opname->opname_id}}</a></td>
                        <td>{{$opname->judul}}</td>
                        <td>{{$opname->date_opname}}</td>
                        <td>
                          <form action="/stokopname/{{$opname->opname_id}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        <a href="/stokopname/{{$opname->opname_id}}/edit">Edit</a>
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
