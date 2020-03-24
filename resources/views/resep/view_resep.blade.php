@extends('layouts.master')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">List Data Resep</h3><br>
        <a href="/resep/create"><button class="btn btn-default">Tambah Resep</button></a>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table id="tambah_pemesanan" class="table table-bordered table-striped">
        <thead>
            <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>ID Resep</th>
            <th>Dokter</th>
            <th>Keterangan</th>
            <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @php ($i=1)
            @foreach($reseps as $resep)
            <tr>
            <td>{{$i}} <input name="id" type="hidden" value="{{$resep->resep_id}}"></td>
            <td>{{$resep->date_resep}}</td>
            <td><a href="/resep/{{$resep->resep_id}}">{{$resep->resep_id}}</a></td>
            <td>{{$resep->dokter}}</td>
            <td>{{$resep->keterangan}}</td>
            <td>
            <form action="/resep/{{$resep->resep_id}}" method="POST">
                {{ csrf_field()}}
                {{ method_field('DELETE') }}
            <a href="/resep/{{$resep->resep_id}}/edit">Edit</a>
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
