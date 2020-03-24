@extends('layouts.master')
@section('content')
<div class="box">
      <div class="box-header">
        <h3 class="box-title">Resep Obat</h3><br><br>
      </div><!-- /.box-header -->
      <div class="box-body">
        <form action="/resep/{{$reseps[0]->resep_id}}" method="post">
          {{ method_field('PUT') }}
          {{ csrf_field() }}
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <span>Tanggal Resep</span>
                <input type="date" name="tgl_resep" class="form-control" value="{{$reseps[0]->date_resep}}" placeholder="Tanggal Resep " required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <span>Nama Dokter</span>
                    <input type="text" id="dokter"  name="dokter" class="form-control" value="{{$reseps[0]->dokter}}" placeholder="Nama Dokter"  required>
                  </div>
              </div>
            </div>
            <br><br>
            <div class="row">
              <div class="col-md-6">
                <span>Jenis Resep</span>
                <select class="form-control select2" id="jenis" name="jenis" required>
                  <option>Salep</option>
                  <option>Tablet</option>
                  <option>Bubuk</option>
                </select>
              </div>
              <div class="col-md-6">
                <span>Keterangan</span>
                <textarea name="keterangan" rows="4" cols="80">{{$reseps[0]->keterangan}}</textarea>
              </div>
            </div>
              <br><br>
            <table id="buatresep_tbl" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th width="1%">No</th>
                  <th>Nama Barang</th>
                  <th>Jumlah Diperlukan</th>
                  <th width="5%"><input type="button"  id="tambah" class="btn btn-xs btn-success" value="+"></input></th>
                </tr>
              </thead>
              <tbody id="count_row">
                @php($i=1)
                @foreach($details as $resep)
                <tr id="row{{$i}}">
                    <td><input type="hidden" id="idid" name="idid"  value="{{$i}}" class="form-control"  required>{{$i}}</td>
                    <td>
                      <select class="form-control select2" id="barang{{$i}}" name="kode_barang[]" required>
                        @foreach($barangs as $barang)
                          @if($barang->kode_barang == $resep->kode_barang)
                            <option value="{{$barang->kode_barang}}" selected>{{$barang->barang}}</option>
                          @else
                            <option value="{{$barang->kode_barang}}">{{$barang->barang}}</option>
                          @endif
                        @endforeach
                      </select>
                    </td>
                    <td><input type="text" id="jml_barang{{$i}}"  name="jml_barang[]" class="form-control" value="{{$resep->jml_barang}}"  required></td>
                    <td>
                        <input name="remove" id="{{$i}}" type="button" class="btn btn-xs btn-warning btn_remove" value="-"></input>
                    </td>
                </tr>
                @php($i++)
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
            '<td><input type="text" id="jml_barang'+i+'"  name="jml_barang[]" class="form-control"  required></td>'
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
