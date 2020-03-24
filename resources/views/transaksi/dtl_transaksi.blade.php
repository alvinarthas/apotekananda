<?php use App\Barang; ?>
@extends('layouts.master')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Detail Data Transaksi</h3><br>
    <div class="box-body">
        <table id="dtl_resep" class="table table-bordered table-striped">
        <thead>
            <tr>
            <th>No</th>
            <th>ID Transaksi</th>
            <th>Tanggal</th>
            <th>Barang / Resep</th>
            <th>Jumlah Barang</th>
            <th>Harga Barang</th>
            <th>Discount</th>
            <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @php ($i=1)
            @foreach($transaksis as $transaksi)
            <tr>
            <td>{{$i}}</td>
            <td>{{$transaksi->trx_id}}</td>
            <td>{{$transaksi->date_trx}}</td>
              @if($transaksi->resep_id == NULL)
                @php($barangs =Barang::barangs($transaksi->kode_barang))
                @php($barang = $barangs[0]->barang)
                <td>{{$barang}}</td>
              @else
                <td><a href="/resep/{{$transaksi->resep_id}}">{{$transaksi->resep_id}}</a></td>
              @endif
            <td>{{$transaksi->qty}}</td>
            <td>{{$transaksi->ttl_harga}}</td>
            <td>{{$transaksi->discount}}</td>
            <td>{{$transaksi->ttl_semua}}</td>
            @php ($i++)
            </tr>
            @endforeach
        </tbody>
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->

@endsection
@section('footjs')
{{-- <script type="text/javascript">
   $(document).ready(function() {
    var table = $('#example').DataTable( {
        scrollY:        "300px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         false,
        fixedColumns:   {
            leftColumns: 5
        }
    } );
} );
</script> --}}
@endsection
