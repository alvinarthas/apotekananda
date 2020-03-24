@extends('layouts.master')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Pemesanan yang belum di Masukkan</h3><br>
  </div>
  <div class="box-body">
    <table id="order_stockin" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>ID Pemesanan</th>
          <th>Tanggal</th>
          <th>PBF</th>
        </tr>
      </thead>
      <tbody>
        @php ($i=1)
        @foreach($orders as $order)
        <tr>
          <td>{{$i}}</td>
          <td><a href="/stockin/{{$order->order_id}}/edit">{{$order->order_id}}</a></td>
          <td>{{$order->date_pemesanan}}</td>
          <td>{{$order->pbf}}</td>
          @php ($i++)
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">List Data Barang Masuk</h3><br>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table id="view_stockin" class="table table-bordered table-striped">
        <thead>
            <tr>
            <th>No</th>
            <th>Kode Barang Masuk</th>
            <th>Tanggal</th>
            <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @php ($i=1)
            @foreach($stockins as $stockin)
            <tr>
            <td>{{$i}}</td>
            <td><a href="/stockindetail/{{$stockin->stockin_id}}">{{$stockin->date_stockin}}</a></td>
            <td>{{$stockin->stockin_id}}</td>
            <td>
            <form action="/stockin/{{$stockin->stockin_id}}" method="POST">
                {{ csrf_field()}}
                {{ method_field('DELETE') }}
            <button class="btn btn-default">Delete</button>
            </form>
            </td>
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
