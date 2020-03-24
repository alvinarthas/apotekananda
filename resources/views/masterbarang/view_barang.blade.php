@extends('layouts.master')
@section('content')
<div class="box">
                <div class="box-header">
                  <h3 class="box-title">List Data Barang</h3><br>
                  <a href="/barang/create"><button class="btn btn-default">Tambah Barang</button></a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="master_barang" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kode Barang</th>
                        <th>Satuan Barang</th>
                        <th>Kategori Barang</th>
                        <th>Jenis Barang</th>
                        <th>Minimal Barang</th>
                        <th>Harga Barang</th>
                        <th>Options</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php ($i=1)
                      @foreach($barangs as $barang)
                      <tr>
                        <td>{{$i}} <input name="id" type="hidden" value="{{$barang->id}}"></td>
                        <td>{{$barang->kode_barang}}</td>
                        <td>{{$barang->barang}}</td>
                        <td>{{$barang->satuan}}</td>
                        <td>{{$barang->kategori}}</td>
                        <td>{{$barang->jenis}}</td>
                        <td>{{$barang->min_qty}}</td>
                        <td>
                          <?php $duit =number_format($barang->harga,"2",",",".");
                          echo "Rp ".$duit;
                          ?>
                        </td>
                        <td>
                        <form action="/barang/{{$barang->id}}" method="POST">
                            {{ csrf_field()}}
                            {{ method_field('DELETE') }}
                        <a href="barang/{{$barang->id}}/edit">Update</a>
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
