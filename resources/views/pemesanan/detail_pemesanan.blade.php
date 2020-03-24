@extends('layouts.master')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Detail Pemesanan</h3><br>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table id="detail_pemesanan" class="table table-bordered table-striped">
        <thead>
            <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama PBF</th>
            <th>Nama Barang</th>
            <th>Kategori Barang</th>
            <th>Jenis Barang</th>
            <th>Jumlah Barang</th>
            <th>Harga/unit</th>
            <th>Total Harga Pesanan</th>
            <th>Discount</th>
            <th>Total Discount</th>
            <th>Harga Setelah Discount</th>
            <th>PPN 10%</th>
            <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @php ($i=1)
            @foreach($details as $detail)
            <tr>
            <td>{{$i}}</td>
            <td>{{$detail->date_pemesanan}}</td>
            <td>{{$detail->pbf}}</td>
            <td>{{$detail->barang}}</td>
            <td>{{$detail->kategori}}</td>
            <td>{{$detail->jenis}}</td>
            <td>{{$detail->jml_order}}</td>
            <td>{{$detail->harga_pesanan}}</td>
            <td>{{$detail->total_hp}}</td>
            <td>{{$detail->discount}}</td>
            <td>{{$detail->total_dc}}</td>
            <td>{{$detail->harga_dc}}</td>
            <td>{{$detail->ppn}}</td>
            <td>{{$detail->total_all}}</td>
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
