@extends('layouts.master')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">List Data Pemesanan</h3><br>
        <a href="/pemesanan/create"><button class="btn btn-default">Tambah Pemesanan</button></a>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table id="tambah_pemesanan" class="table table-bordered table-striped">
        <thead>
            <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Order ID</th>
            <th>Nama PBF</th>
            <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @php ($i=1)
            @foreach($pemesanans as $pemesanan)
            <tr>
            <td>{{$i}} <input name="id" type="hidden" value="{{$pemesanan->order_id}}"></td>
            <td><a href="/orderdetail/{{$pemesanan->order_id}}">{{$pemesanan->date_pemesanan}}</a></td>
            <td>{{$pemesanan->order_id}}</td>
            <td>{{$pemesanan->pbf}}</td>
            <td>
            <form action="/pemesanan/{{$pemesanan->order_id}}" method="POST">
                {{ csrf_field()}}
                {{ method_field('DELETE') }}
            <a href="/pemesanan/{{$pemesanan->order_id}}/edit">Edit</a>
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
