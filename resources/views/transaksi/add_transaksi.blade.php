@extends('layouts.master')
@section('content')
<form action="/transaksi" method="post">
  {{ csrf_field() }}
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Transaksi</h3><br><br>
  </div><!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <div class="col-md-6">
        <span>Cara Pembayaran</span>
        <select class="form-control select2" id=payment name="payment"required>
          <option>CASH</option>
          <option>Debit Mandiri</option>
          <option>Debit BNI</option>
          <option>Catet</option>
        </select>
      </div>
      <div class="col-md-6">
        <span>Tanggal Transaksi</span>
        <input type="date" name="tgl_trx" class="form-control" placeholder="Tanggal Transaksi" required>
      </div>
      <br><br><br><br>
    </div>
    <table id="trx_tbl" class="table table-bordered table-hover">
      <thead>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Jumlah Barang</th>
        <th>Harga Barang</th>
        <th>Discount</th>
        <th>Total Harga</th>
        <th width="5%"><input type="button"  id="t_trx" class="btn btn-xs btn-success" value="+"></input></th>
      </thead>
      <tbody id="trx">
      </tbody>
    </table>
  </div>
</div><!-- /.box -->
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Resep</h3><br><br>
  </div><!-- /.box-header -->
  <div class="box-body">
    <table id="trx_tbl" class="table table-bordered table-hover">
      <thead>
        <th>No</th>
        <th>Resep</th>
        <th>Harga Resep</th>
        <th>Discount</th>
        <th>Total Resep</th>
        <th width="5%"><input type="button"  id="t_resep" class="btn btn-xs btn-success" value="+"></input></th>
      </thead>
      <tbody id="resep">
      </tbody>
    </table>
  </div>
  <div align="right" class="box-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</div>
</form>
@endsection
@section('footjs')
<script type="text/javascript">
$(document).ready(function () {
    addRowTrx();
    addRowRsp();
});
function addRowTrx(){
    var i= 0;
    $('#t_trx').click(function(){
      i++;
      $('#trx').append(
        '<tr id="trxrow'+i+'">'+
            '<td><input type="hidden" id="idtrx" name="idtrx"  value="'+i+'" class="form-control"  required>'+i+'</td>'
            +
            '<td><select class="form-control select2" id="barang'+i+'" name="kode_barang[]" required>'
            +'@foreach($barangs as $barang)<option value="{{$barang->kode_barang}}">{{$barang->barang}}</option>'
            +'@endforeach </select></td>'
            +
            '<td><input type="text" id="jml_trx'+i+'"  name="jml_trx[]" class="form-control"  required></td>'
            +
            '<td><input type="text" id="harga_barang'+i+'"  name="harga_barang[]" class="form-control" required></td>'
            +
            '<td><input type="text" id="discount'+i+'" name="discount[]" class="form-control"  required></td>'
            +
            '<td><input type="text" id="total_all'+i+'" name="total_all[]" class="form-control qty" readonly  required ></td>'
            +
            '<td>'+
                '<input name="remove" id="'+i+'" type="button" class="btn btn-xs btn-warning btn_remove" value="-"></input>'
                +
            '</td>'+
        '</tr>'
      );
      $("#barang"+i).select2();
      $("#harga_barang"+i).keyup(function(){
          var jml1 = this.value;
          var dis = this.value;
          var total_all = this.value;
          var harga_barang = $("#harga_barang"+i).val();
          var jml_trx = $("#jml_trx"+i).val();
          var discount = $("#discount"+i).val();
          jml1 = harga_barang*jml_trx;
          dis = (jml1 *(discount/100));
          total_all = jml1-dis;
          $("#total_all"+i).val(total_all);
        });
        $("#jml_trx"+i).keyup(function(){
            var jml1 = this.value;
            var dis = this.value;
            var total_all = this.value;
            var harga_barang = $("#harga_barang"+i).val();
            var jml_trx = $("#jml_trx"+i).val();
            var discount = $("#discount"+i).val();
            jml1 = harga_barang*jml_trx;
            dis = (jml1 *(discount/100));
            total_all = jml1-dis;
            $("#total_all"+i).val(total_all);
          });
          $("#discount"+i).keyup(function(){
              var jml1 = this.value;
              var dis = this.value;
              var total_all = this.value;
              var harga_barang = $("#harga_barang"+i).val();
              var jml_trx = $("#jml_trx"+i).val();
              var discount = $("#discount"+i).val();
              jml1 = harga_barang*jml_trx;
              dis = (jml1 *(discount/100));
              total_all = jml1-dis;
              $("#total_all"+i).val(total_all);
            });
      $(document).on('click','.btn_remove',function(){
        var button_id = $(this).attr("id");
        $('#trxrow'+button_id+'').remove();
        sumTotal();
      });
    });
  }

function addRowRsp(){
      var i= 0;
      $('#t_resep').click(function(){
        i++;
        $('#resep').append(
          '<tr id="rsprow'+i+'">'+
              '<td><input type="hidden" id="idrsp" name="idrsp"  value="'+i+'" class="form-control"  required>'+i+'</td>'
              +
              '<td><select class="form-control select2" id="resep'+i+'" name="resep[]" required>'
              +'@foreach($reseps as $resep)<option>{{$resep->resep_id}}</option>'
              +'@endforeach </select></td>'
              +
              '<td><input type="text" id="harga_resep'+i+'"  name="harga_resep[]" class="form-control" required></td>'
              +
              '<td><input type="text" id="discount_resep'+i+'" name="discount_resep[]" class="form-control"  required></td>'
              +
              '<td><input type="text" id="total_all_resep'+i+'" name="total_all_resep[]" class="form-control qty" readonly  required ></td>'
              +
              '<td>'+
                  '<input name="remove" id="'+i+'" type="button" class="btn btn-xs btn-warning btn_removes" value="-"></input>'
                  +
              '</td>'+
          '</tr>'
        );
        $("#resep"+i).select2();
        $("#harga_resep"+i).keyup(function(){
            var dis = this.value;
            var total_all_resep = this.value;
            var harga_resep = $("#harga_resep"+i).val();
            var discount_resep = $("#discount_resep"+i).val();
            dis = (harga_resep *(discount_resep/100));
            total_all_resep = harga_resep-dis;
            $("#total_all_resep"+i).val(total_all_resep);
          });
          $("#discount_resep"+i).keyup(function(){
              var dis = this.value;
              var total_all_resep = this.value;
              var harga_resep = $("#harga_resep"+i).val();
              var discount_resep = $("#discount_resep"+i).val();
              dis = (harga_resep *(discount_resep/100));
              total_all_resep = harga_resep-dis;
              $("#total_all_resep"+i).val(total_all_resep);
            });
        $(document).on('click','.btn_removes',function(){
          var button_id = $(this).attr("id");
          $('#rsprow'+button_id+'').remove();
          sumTotal();
        });
      });
    }
</script>

@endsection
