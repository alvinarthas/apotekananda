@extends('layouts.master')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Detail Barang Masuk:  {{$detailss[0]->stockin_id}} </h3><br>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table id="detail_pemesanan" class="table table-bordered table-striped">
        <thead>
            <tr>
            <th>No</th>
            <th>Kode Barang Masuk</th>
            <th>Tanggal</th>
            <th>Nama PBF</th>
            <th>Nama Barang</th>
            <th>Kategori Barang</th>
            <th>Jenis Barang</th>
            <th>Jumlah Stockin</th>
            </tr>
        </thead>
        <tbody>
            @php ($i=1)
            @foreach($detailss as $detail)
            <tr>
            <td>{{$i}}</td>
            <td>{{$detail->stockin_id}}</td>
            <td>{{$detail->date_stockin}}</td>
            <td>{{$detail->pbf_id}}</td>
            <td>{{$detail->barang}}</td>
            <td>{{$detail->kategori}}</td>
            <td>{{$detail->jenis}}</td>
            <td>{{$detail->jml_stockin}}</td>
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
