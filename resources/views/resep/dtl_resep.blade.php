@extends('layouts.master')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Detail Data Resep</h3><br>
    <div class="box-body">
        <table id="dtl_resep" class="table table-bordered table-striped">
        <thead>
            <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>ID Resep</th>
            <th>Jenis Resep</th>
            <th>Dokter</th>
            <th>Barang</th>
            <th>Jumlah Barang</th>
            </tr>
        </thead>
        <tbody>
            @php ($i=1)
            @foreach($reseps as $resep)
            <tr>
            <td>{{$i}} <input name="id" type="hidden" value="{{$resep->resep_id}}"></td>
            <td>{{$resep->date_resep}}</td>
            <td>{{$resep->resep_id}}</td>
            <td>{{$resep->jenis_resep}}</td>
            <td>{{$resep->dokter}}</td>
            <td>{{$resep->barang}}</td>
            <td>{{$resep->jml_barang}}</td>
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
