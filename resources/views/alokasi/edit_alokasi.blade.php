@extends('layouts.master')
@section('content')
<div class="box">
      <div class="box-header">
        <h3 class="box-title">Edit Alokasi Barang: {{$alokasis[0]->kode_rak}}</h3><br><br>
      </div><!-- /.box-header -->
      <div class="box-body">
        <form action="/alokasi/{{$alokasis[0]->kode_rak}}" method="post">
          {{ method_field('PUT') }}
          {{ csrf_field() }}
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name="kode_rak" class="form-control" value="{{$alokasis[0]->kode_rak}}" placeholder="Kode Rak" required>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
              <br><br><br><br>
              </div>
            </div>
            <table id="alokasi_tbl" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th width="1%">No</th>
                  <th>Nama Barang</th>
                  <th><input type="button"  id="tambah" class="btn btn-xs btn-success" value="+"></input></th>
                </tr>
              </thead>
              <tbody id="count_row">
                  @php($i=1)
                  @foreach($alokasis as $alokasi)
                  <tr id="row{{$i}}">
                      <td><input type="hidden" id="idid" name="idid"  value="{{$i}}" class="form-control"  required>{{$i}}</td>
                      <td>
                        <select class="form-control select2" id="barang{{$i}}" name="kode_barang[]" required>
                          @foreach($barangs as $barang)
                            @if($barang->kode_barang == $alokasi->kode_barang)
                            <option value="{{$barang->kode_barang}}" selected>{{$barang->barang}}</option>
                            @else
                            <option value="{{$barang->kode_barang}}">{{$barang->barang}}</option>
                            @endif
                          @endforeach
                        </select>
                      </td>
                      <td>
                          <input name="remove" id="{{$i}}" type="button" class="btn btn-xs btn-warning btn_remove" value="-"></input>
                      </td>
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
            +
            '<td>'+
                '<input name="remove" id="'+i+'" type="button" class="btn btn-xs btn-warning btn_remove" value="-"></input>'
                +
            '</td>'+
        '</tr>'
      );
      $("#barang"+i).select2();
      $(document).on('click','.btn_remove',function(){
        var button_id = $(this).attr("id");
        $('#row'+button_id+'').remove();
        sumTotal();
      });
    });
  }
</script>

@endsection
