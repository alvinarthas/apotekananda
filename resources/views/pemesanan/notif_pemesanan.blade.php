@extends('layouts.master')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">List Barang Yang Harus  dipesan</h3><br>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table id="notif_pesanan" class="table table-bordered table-striped">
        <thead>
            <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Jumlah Barang</th>
            </tr>
        </thead>
        <tbody>
            @php ($i=1)
            @foreach($barangs as $barang)
            <tr>
            <td>{{$i}}</td>
            <td>{{$barang->barang}}</td>
            <td>{{$barang->qty}}</td>
            @php ($i++)
            </tr>
            @endforeach
        </tbody>
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->

@endsection
@section('footjs')
<script type="text/javasc  ript">
   $(document).ready(function() {
     $("#notif_pesanan").select2();
} );
</script>
@endsection
