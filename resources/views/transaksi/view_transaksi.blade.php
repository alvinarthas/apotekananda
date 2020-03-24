@extends('layouts.master')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Transaksi Penjualan Obat</h3><br>
    <a href="/transaksi/create"><button class="btn btn-default">Tambah Transaksi</button></a>
  </div>
  <div class="box-body">
    <table id="order_stockin" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>ID Transaksi</th>
          <th>Tanggal</th>
          <th>Jenis Pembayaran</th>
        </tr>
      </thead>
      <tbody>
        @php ($i=1)
        @foreach($transaksis as $transaksi)
        <tr>
          <td>{{$i}}</td>
          <td><a href="/transaksi/{{$transaksi->trx_id}}">{{$transaksi->trx_id}}</a></td>
          <td>{{$transaksi->date_trx}}</td>
          <td>{{$transaksi->payment}}</td>
          @php ($i++)
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

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
