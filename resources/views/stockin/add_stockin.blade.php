@extends('layouts.master')
@section('content')
<div class="box">
      <div class="box-header">
        <h3 class="box-title">Tambah Barang Masuk</h3><br><br>
      </div><!-- /.box-header -->
      <div class="box-body">
        <form action="/stockin" method="post">
          {{ csrf_field() }}
            <div class="row">
              <div class="col-md-6">
                <span>Tanggal Stock In</span>
                <input type="date" name="tgl_stockin" class="form-control" required>
              </div>
              <div class="col-md-6">
                <span>Nama PBF</span>
                <input type="text" id="pbfsss"  name="pbf" class="form-control" value="{{$pbf[0]->pbf}}"  readonly required>
              <input type="hidden" id="kode_pbf" name="kode_pbf"  value="{{$pbf[0]->kode_pbf}}" class="form-control"></input>
              </div>
              <br><br><br><br>
            </div>
            <table id="stockin_tbl" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Jumlah Stock IN</th>
                  <th width="5%"><input type="button"  id="tambah" class="btn btn-xs btn-success" value="+"></input></th>
                </tr>
              </thead>
              <tbody id="count_row">
                @php($i=1)
                @foreach($details as $detail)
                <tr id="row{{$i}}">
                  <td><input type="hidden" id="idid" name="idid"  value="{{$i}}" class="form-control">
                    <input type="hidden" id="order_id" name="order_id[]"  value="{{$detail->order_id}}" class="form-control">{{$i}}
                  </td>
                  <td>
                    <input type="text" id="barang'{{$i}}'"  name="barang[]" class="form-control" value="{{$detail->barang}}"  readonly required></input>
                    <input type="hidden" id="kode_barang'{{$i}}'" name="kode_barang[]"  value="{{$detail->kode_barang}}" class="form-control">
                  </td>
                  <td><input type="text" id="jml_stockin'{{$i}}'"  name="jml_stockin[]" class="form-control" value="{{$detail->jml_order}}" required></input></td>
                  <td><input name="remove" id="{{$i}}" type="button" class="btn btn-xs btn-warning btn_remove" value="-"></input></td>
                  @php ($i++)
                </tr>
                @endforeach
              </tbody>
            </table>
            @php($a=$i)
            <div align="right" class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
      </div><!-- /.box-body -->
</div><!-- /.box -->
@endsection
@section('footjs')
<script type="text/javascript">
$(document).ready(function () {
    addRow();
});
function addRow(){
    var i= "<?php echo $a-1; ?>";
    $('#tambah').click(function(){
      i++;
      $('#count_row').append(
        '<tr id="row'+i+'">'+
            '<td><input type="hidden" id="idid" name="idid"  value="'+i+'" class="form-control"  required>'+i+'</td>'
            +
            '<td><select class="form-control select2" id="barang'+i+'" name="kode_barang[]" required>'
            +'@foreach($barangs as $barang)<option value="{{$barang->kode_barang}}">{{$barang->barang}}</option>'
            +'@endforeach </select></td>'
            +'<td><input type="text" id="jml_stockin'+i+'"  name="jml_stockin[]" class="form-control" required></td>'
            +'<td>'+
                '<input name="remove" id="'+i+'" type="button" class="btn btn-xs btn-warning btn_remove" value="-"></input>'
                +
            '</td>'+
        '</tr>'
      );
      $("#barang"+i).select2();
      $("#pbf"+i).select2();
      });
  }
</script>

@endsection
