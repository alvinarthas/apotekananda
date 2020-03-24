@extends('layouts.master')
@section('content')
<div class="box">
      <div class="box-header">
        <h3 class="box-title">Tambah Pemesanan Barang</h3><br><br>
      </div><!-- /.box-header -->
      <div class="box-body">
        <form action="/pemesanan" method="post">
          {{ csrf_field() }}
            <div class="row">
              <div class="col-md-6">
                <span>Nama PBF</span>
                <select class="form-control select2" id=pbf name="pbf"required>
                </select>
              </div>
              <div class="col-md-6">
                <span>Tanggal Pemesanan</span>
                <input type="date" name="tgl_pemesanan" class="form-control" placeholder="Tanggal Pemesanan" required>
              </div>
              <br><br><br><br>
            </div>
            <table id="pemesanan_tbl" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th width="1%">No</th>
                  <th width="20%">Nama Barang</th>
                  <th width="5%">Jumlah Pesanan</th>
                  <th width="10%">Harga Pesanan</th>
                  <th width="10%">Total Harga Pesanan</th>
                  <th width="2%">Discount</th>
                  <th width="10%">Total Discount</th>
                  <th width="10%">Harga Setelah Discount</th>
                  <th width="10%">PPN 10%</th>
                  <th width="15%">Total Harga</th>
                  <th width="5%"><input type="button"  id="tambah" class="btn btn-xs btn-success" value="+"></input></th>
                </tr>
              </thead>
              <tbody id="count_row">
              </tbody>
              <tfoot>
                <td colspan="2">Total Semua Harga Pesanan</td>
                <td colspan="2"><input type="text" id="total_semua" name="total_semua" class="form-control"  required readonly></td>
              </tfoot>
            </table>
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
    ajx_PBF();
});
  function _HarPesanan(id){
          var total_hp = this.value;
          var harga_pesanan = $("#harga_pesanan"+id).val();
          var jml_order = $("#jml_order"+id).val();
          total_hp = harga_pesanan * jml_order;
          $("#total_hp"+id).val(total_hp);
  }

  function _Order(id){
          var total_hp = this.value;
          var harga_pesanan = $("#harga_pesanan"+id).val();
          var jml_order = $("#jml_order"+id).val();
          total_hp = harga_pesanan * jml_order;
          $("#total_hp"+id).val(total_hp);
  }

  function _DiskonUp(id){
      // Total Discount
          var total_dc = this.value;
          var discount = $("#discount"+id).val();
          var total_hp = $("#total_hp"+id).val();
          total_dc = (discount * total_hp)/100;
          $("#total_dc"+id).val(total_dc);
      // ----------------------------------------------
      // Harga Discount
          var harga_dc = this.value;
          var total_dc = $("#total_dc"+id).val();
          var total_hp = $("#total_hp"+id).val();
          harga_dc = total_hp-total_dc;
          $("#harga_dc"+id).val(harga_dc);
      // ----------------------------------------------
      // PPN
          var ppn = this.value;
          var harga_dc = $("#harga_dc"+id).val();
          ppn = harga_dc*0.1;
          $("#ppn"+id).val(ppn);
      // ----------------------------------------------
      // Total ALL
          var total_all = this.value;
          var harga_dc = $("#harga_dc"+id).val();
          var ppn = $("#ppn"+id).val();
          total_all = parseInt(harga_dc)+parseInt(ppn);
          $("#total_all"+id).val(total_all);
          sumTotal();
        // ----------------------------------------------
  };
  function addRow(){
    var i= 0;
    $('#tambah').click(function(){
      i++;
      $('#count_row').append(
        '<tr id="row'+i+'">'+
            '<td><input type="hidden" id="idid" name="idid"  value="'+i+'" class="form-control"  required>'+i+'</td>'
            +
            '<td><select class="form-control select2" id="barang'+i+'" name="kode_barang[]" required>'
            +'</select></td>'
            +
            '<td><input type="text" id="jml_order'+i+'" onKeyUp="_Order(`'+i+'`)"  name="jml_order[]" class="form-control"  required></td>'
            +
            '<td><input type="text" id="harga_pesanan'+i+'" onKeyUp="_HarPesanan(`'+i+'`)"  name="harga_pesanan[]" class="form-control" required></td>'
            +
            '<td><input type="text" id="total_hp'+i+'" name="total_hp[]" class="form-control" readonly required></td>'
            +
            '<td><input type="text" id="discount'+i+'" onKeyUp="_DiskonUp(`'+i+'`)" name="discount[]" class="form-control"  required></td>'
            +
            '<td><input type="text" id="total_dc'+i+'" name="total_dc[]" class="form-control"  required readonly ></td>'
            +
            '<td><input type="text" id="harga_dc'+i+'" name="harga_dc[]" class="form-control"  required readonly ></td>'
            +
            '<td><input type="text" id="ppn'+i+'" name="ppn[]" class="form-control" required readonly></td>'
            +
            '<td><input type="text" id="total_all'+i+'" name="total_all[]" class="form-control qty" readonly  required ></td>'
            +
            '<td>'+
                '<input name="remove" id="'+i+'" type="button" class="btn btn-xs btn-warning btn_remove" value="-"></input>'
                +
            '</td>'+
        '</tr>'
      );
      ajx_Barang(i);
      
      $(document).on('click','.btn_remove',function(){
        var button_id = $(this).attr("id");
        $('#row'+button_id+'').remove();
        sumTotal();
      });
    });
  }

  function sumTotal(){
    var sum = 0;
    $('.qty').each(function(){
        sum += parseFloat(this.value.replace(/,/g, ''));
    });
    $('#total_semua').val(sum);
  }
  
  function ajx_PBF(){
    $("#pbf").select2({
        placeholder:"Pilih PBF",
        ajax:{
            url: "/ajxpbforder",
            dataType:'json',    
            delay:250,
            data:function(params){
                return{
                    s_pbf:params.term,
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

  function ajx_Barang(id){
     $("#barang"+id).select2({
        placeholder:"Pilih Barang",
        ajax:{
            url: "/ajxbrgorder",
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
</script>

@endsection
