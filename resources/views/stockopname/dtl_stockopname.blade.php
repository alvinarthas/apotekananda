@extends('layouts.master')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Detail Stok Opname</h3><br>
        @php($op = $opnam[0]->judul)
        <h4>{{$op}}</h4>
    <div class="box-body">
        <table id="dtl_resep" class="table table-bordered table-striped">
        <thead>
            <tr>
            <th>No</th>
            <th>ID Stok Opname</th>
            <th>Tanggal</th>
            <th>Barang</th>
            <th>Jumlah Sistem</th>
            <th>Jumlah Asli</th>
            <th>Status</th>
            <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @php ($i=1)
            @foreach($opnames as $opname)
            <tr>
            <td>{{$i}}</td>
            <td>{{$opname->opname_id}}</td>
            <td>{{$opname->date_opname}}</td>
            <td>{{$opname->barang}}</td>
            <td>{{$opname->jml_sistem}}</td>
            <td>{{$opname->jml_real}}</td>
            <td>{{$opname->status}}</td>
            <td>{{$opname->keterangan}}</td>
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
