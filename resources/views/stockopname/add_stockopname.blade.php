@extends('layouts.master')
@section('content')
<form action="/stokopname" method="post">
  {{ csrf_field() }}
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Stock Opname</h3><br><br>
  </div><!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" id="judul"  name="judul" class="form-control" placeholder="Judul" required>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="date" name="tgl_opname" class="form-control" placeholder="Tanggal Transaksi" required>
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
      </tbody>
    </table>
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

function jmlsistem(id){
    var brg_code = document.getElementById("barang"+id).value;
    console.log(brg_code);
    $.ajax({
      type:'GET',
      url:"/jmlsistem",
      dataType:'json',
      data:{
        'code':brg_code
      },
      success:function(data){
        //console.log('#jml_sistem'+id).val;
        $('#jml_sistem'+id).val(data);
      }
    });
}
function ajx_Barang(id){
     $("#barang"+id).select2({
        placeholder:"Pilih Barang",
        ajax:{
            url: "/ajxopnorder",
            dataType:'json',    
            delay:250,
            data:function(params){
                
                return{
                    s_brg:params.term,
                };
            },
            processResults:function(data){
                var item = $.map(data, (value)=>{ //map buat ngemap object data kyk foreach
                    return { id: value.id, text: value.text };
                });

                return {
                    results: item
                }
            },
            cache: true
        },
        minimumInputLength: 1,
        // templateResult: formatRepo, 
        // templateSelection: formatRepoSelection
    });
}
function addRow(){
    var i= 0;
    $('#tambah').click(function(){
      i++;
      $('#opname').append(
        '<tr id="row'+i+'">'+
            '<td><input type="hidden" id="idid" name="idid"  value="'+i+'" class="form-control"  required>'+i+'</td>'
            +
            '<td><select class="form-control select2" id="barang'+i+'" name="kode_barang[]" onchange="jmlsistem(`'+i+'`)" required >'
            +'</select></td>'
            +   
            '<td><input type="text" id="jml_sistem'+i+'"  name="jml_sistem[]" class="form-control" readonly required></td>'
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
      ajx_Barang(i);
      //jmlsistem(i);
      $("#keterangan"+i).select2();
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
