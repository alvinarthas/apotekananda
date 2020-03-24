@extends('layouts.master')
@section('content')
<form action="/stokopname/{{$opname[0]->opname_id}}" method="post">
  {{ method_field('PUT') }}
  {{ csrf_field() }}
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Stock Opname: {{$opname[0]->opname_id}}</h3><br><br>
  </div><!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" id="judul"  name="judul" class="form-control" value="{{$opname[0]->judul}}" placeholder="Judul" required>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="date" name="tgl_opname" class="form-control" value="{{$opname[0]->date_opname}}" placeholder="Tanggal Transaksi" required>
          </div>
        </div>
      </div>
      <br><br><br><br>
    </div>
    <table id="trx_tbl" class="table table-bordered table-hover">
      <thead>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Jumlah di Sistem</th>
        <th>Jumlah Asli</th>
        <th>Status</th>
        <th>Keterangan  </th>
        <th width="5%"><input type="button"  id="tambah" class="btn btn-xs btn-success" value="+"></input></th>
      </thead>
      <tbody id="opname">
        @php($i=1)
        @foreach($dtl_opname as $detail)
        <tr id="row{{$i}}">
            <td><input type="hidden" id="idid" name="idid"  value="{{$i}}" class="form-control"  required>{{$i}}</td>
            <td>
              <select class="form-control select2" id="barang{{$i}}" name="kode_barang[]" required>
                @foreach($barangs as $barang)
                  @if($barang->kode_barang == $detail->kode_barang)
                    <option value="{{$barang->kode_barang}}" selected>{{$barang->barang}}</option>
                  @else
                    <option value="{{$barang->kode_barang}}">{{$barang->barang}}</option>
                  @endif
                @endforeach </select></td>
            <td><input type="text" id="jml_sistem{{$i}}"  name="jml_sistem[]" value="{{$detail->jml_sistem}}" class="form-control"  required></td>
            <td><input type="text" id="jml_asli{{$i}}"  name="jml_asli[]" value="{{$detail->jml_real}}" class="form-control"  required></td>
            <td><input type="text" id="status{{$i}}" name="status[]" value="{{$detail->status}}" class="form-control" readonly required></td>
            <td>
              <select class="form-control select2" id="keterangan{{$i}}" name="keterangan[]" required>
                <option>Aman</option>
                <option>Hilang</option>
                <option>Rusak</option>
                <option>Kadaluarsa</option>
              </select></td>
            <td>
                <input name="remove" id="{{$i}}" type="button" class="btn btn-xs btn-warning btn_remove" value="-"></input>
            </td>
              @php ($i++)
        </tr>
        @endforeach
      </tbody>
    </table>
    @php($a=$i)
  </div>
  <div align="right" class="box-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</div><!-- /.box -->
</form>
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
      $('#opname').append(
        '<tr id="row'+i+'">'+
            '<td><input type="hidden" id="idid" name="idid"  value="'+i+'" class="form-control"  required>'+i+'</td>'
            +
            '<td><select class="form-control select2" id="barang'+i+'" name="kode_barang[]" required>'
            +'@foreach($barangs as $barang)<option value="{{$barang->kode_barang}}">{{$barang->barang}}</option>'
            +'@endforeach </select></td>'
            +
            '<td><input type="text" id="jml_sistem'+i+'"  name="jml_sistem[]" class="form-control"  required></td>'
            +
            '<td><input type="text" id="jml_asli'+i+'"  name="jml_asli[]" class="form-control"  required></td>'
            +
            '<td><input type="text" id="status'+i+'" name="status[]" class="form-control" readonly required></td>'
            +
            '<td><select class="form-control select2" id="keterangan'+i+'" name="keterangan[]" required>'
            +'<option>Aman</option>'
            +'<option>Hilang</option>'
            +'<option>Rusak</option>'
            +'<option>Kadaluarsa</option>'
            +'</select></td>'
            +
            '<td>'+
                '<input name="remove" id="'+i+'" type="button" class="btn btn-xs btn-warning btn_remove" value="-"></input>'
                +
            '</td>'+
        '</tr>'
      );
      $("#barang"+i).select2();
      $("#keterangan"+i).select2();
      $("#jml_sistem"+i).keyup(function(){
          var status = this.value;
          var jml_asli = $("#jml_asli"+i).val();
          var jml_sistem = $("#jml_sistem"+i).val();
          if (jml_sistem == jml_asli) {
            status ="Sama";
          }
          else {
            status ="Tidak Sama";
          }
          $("#status"+i).val(status);
        });
        $("#jml_asli"+i).keyup(function(){
            var status = this.value;
            var jml_asli = $("#jml_asli"+i).val();
            var jml_sistem = $("#jml_sistem"+i).val();
            if (jml_sistem == jml_asli) {
              status ="Sama";
            }
            else {
              status ="Tidak Sama";
            }
            $("#status"+i).val(status);
          });
      $(document).on('click','.btn_remove',function(){
        var button_id = $(this).attr("id");
        $('#row'+button_id+'').remove();
        sumTotal();
      });
    });
  }
</script>

@endsection
