@extends('layouts.master')
@section('content')
<div class="box">
                <div class="box-header">
                  <h3 class="box-title">Stok Barang</h3><br>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="master_barang" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Satuan Barang</th>
                        <th>Kategori Barang</th>
                        <th>Jenis Barang</th>
                        <th>Barang Masuk</th>
                        <th>Barang Keluar</th>
                        <th>Stok Barang</th>
                        <th>Harga Barang</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php ($i=1)
                      @foreach($stoks as $stok)
                        <tr>
                        <td>{{$i}}</td>
                        <td>{{$stok->kode_barang}}</td>
                        <td>{{$stok->barang}}</td>
                        <td>{{$stok->satuan}}</td>
                        <td>{{$stok->kategori}}</td>
                        <td>{{$stok->jenis}}</td>
                        <td><a href="/stokbarang/in/{{$stok->kode_barang}}">{{$stok->stockin}}</a></td>
                        <td><a href="/stokbarang/out/{{$stok->kode_barang}}">{{$stok->stockout}}</a></td>
                        <td>{{$stok->qty}}</td>
                        <td>
                          <?php $duit =number_format($stok->harga,"2",",",".");
                          echo "Rp ".$duit;
                          ?>
                        </td>
                        @php ($i++)
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

@endsection
