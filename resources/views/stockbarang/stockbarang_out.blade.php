@extends('layouts.master')
@section('content')
<div class="box">
    <div class="box-header">
        @php($barang = $barangs[0]->barang)
        <h3 class="box-title">Detail Stock Barang Keluar : {{$barang}}</h3><br>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table id="detail_pemesanan" class="table table-bordered table-striped">
        <thead>
            <tr>
            <th>No</th>
            <th>ID Transaksi / Resep</th>
            <th>Tanggal</th>
            <th>Jumlah Barang</th>
            </tr>
        </thead>
        <tbody>
            @php ($i=1)
            @foreach($detailouttrxs as $detailouttrx)
            <tr>
            <td>{{$i}}</td>
            <td>{{$detailouttrx->trx_id}}</td>
            <td>{{$detailouttrx->date_trx}}</td>
            <td>{{$detailouttrx->qty}}</td>
            @php ($i++)
            </tr>
            @endforeach
            <!-- Resep -->
            @foreach($detailoutrsps as $detailoutrsp)
            <tr>
            <td>{{$i}}</td>
            <td><a href="../../resep/{{$detailoutrsp->resep_id}}">{{$detailoutrsp->resep_id}}</a></td>
            <td>{{$detailoutrsp->date_resep }}</td>
            <td>{{$detailoutrsp->jml_barang}}</td>
            @php ($i++)
            </tr>
            @endforeach
        </tbody>
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->

@endsection
@section('footjs')
{{-- <script type="text/javasc  ript">
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
