@extends('layouts.master')
@section('content')
<div class="box">
                <div class="box-header">
                  <h3 class="box-title">Detail Alokasi Barang</h3><br>
                <div class="box-body">
                  <table id="alokasi_tbl" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode RAK</th>
                        <th>Nama Barang</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php ($i=1)
                      @foreach($alokasis as $alokasi)
                      <tr>
                        <td>{{$i}}</td>
                        <td>{{$alokasi->kode_rak }}</td>
                        <td>{{$alokasi->barang }}</td>
                        @php ($i++)
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

@endsection
