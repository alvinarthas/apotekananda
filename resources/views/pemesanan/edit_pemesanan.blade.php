@extends('layouts.master')
@section('content')
<div class="box">
      <div class="box-header">
        <h3 class="box-title">Edit Pemesanan</h3><br><br>
      </div><!-- /.box-header -->
      <div class="box-body">
        @php($ord_id = $pemesanan[0]->order_id)
        @php($pbfss = $pemesanan[0]->pbf_id)
        @php($dat = $pemesanan[0]->date_pemesanan)
        <form action="/pemesanan/{{$ord_id}}" method="post">
          {{ method_field('PUT') }}
          {{ csrf_field() }}
            <div class="row">
              <div class="col-md-6">
                <span>Nama PBF</span>
                <select class="form-control select2" id=pbf name="pbf"required>
                  @foreach ($pbfs as $pbf)
                  @if($pbf->kode_pbf == $pbfss)
                  <option value="{{$pbf->kode_pbf}}" selected>{{$pbf->pbf}}</option>
                  @else
                  <option value="{{$pbf->kode_pbf}}">{{$pbf->pbf}}</option>
                  @endif
                  @endforeach
                </select>
              </div>
              <div class="col-md-6">
                <span>Tanggal Pemesanan</span>
                <input type="date" name="tgl_pemesanan" class="form-control" value="{{$pemesanan[0]->date_pemesanan}}" placeholder="Tanggal Pemesanan" required>
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
                @php($i=1)
                @foreach($details as $detail)
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
                        @endforeach
                      </select>
                    </td>
                    <td><input type="text" id="jml_order'+i+'"  name="jml_order[]" class="form-control" value="{{$detail->jml_order}}"  required></td>
                    <td><input type="text" id="harga_pesanan'+i+'"  name="harga_pesanan[]" class="form-control" value="{{$detail->harga_pesanan}}" required></td>
                    <td><input type="text" id="total_hp'+i+'" name="total_hp[]" class="form-control" value="{{$detail->total_hp}}" readonly required></td>
                    <td><input type="text" id="discount'+i+'" name="discount[]" class="form-control" value="{{$detail->discount}}"  required></td>
                    <td><input type="text" id="total_dc'+i+'" name="total_dc[]" class="form-control" value="{{$detail->total_dc}}"  required readonly ></td>
                    <td><input type="text" id="harga_dc'+i+'" name="harga_dc[]" class="form-control"  value="{{$detail->harga_dc}}" required readonly ></td>
                    <td><input type="text" id="ppn'+i+'" name="ppn[]" class="form-control" value="{{$detail->ppn}}" required readonly></td>
                    <td><input type="text" id="total_all'+i+'" name="total_all[]" class="form-control qty" value="{{$detail->total_all}}" readonly  required ></td>

                    <td>
                        <input name="remove" id="{{$i}}" type="button" class="btn btn-xs btn-warning btn_remove" value="-"></input>

                    </td>
                    @php ($i++)
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <td colspan="2">Total Semua Harga Pesanan</td>
                <td colspan="2"><input type="text" id="total_semua" name="total_semua" class="form-control"  required readonly></td>
              </tfoot>
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
            '<td><input type="text" id="jml_order'+i+'"  name="jml_order[]" class="form-control"  required></td>'
            +
            '<td><input type="text" id="harga_pesanan'+i+'"  name="harga_pesanan[]" class="form-control" required></td>'
            +
            '<td><input type="text" id="total_hp'+i+'" name="total_hp[]" class="form-control" readonly required></td>'
            +
            '<td><input type="text" id="discount'+i+'" name="discount[]" class="form-control"  required></td>'
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
      $("#barang"+i).select2();
      $("#harga_pesanan"+i).keyup(function(){
          var total_hp = this.value;
          var harga_pesanan = $("#harga_pesanan"+i).val();
          var jml_order = $("#jml_order"+i).val();
          total_hp = harga_pesanan * jml_order;
          $("#total_hp"+i).val(total_hp);
        });
      $("#jml_order"+i).keyup(function(){
          var total_hp = this.value;
          var harga_pesanan = $("#harga_pesanan"+i).val();
          var jml_order = $("#jml_order"+i).val();
          total_hp = harga_pesanan * jml_order;
          $("#total_hp"+i).val(total_hp);
        });
      $("#discount"+i).keyup(function(){
          var total_dc = this.value;
          var discount = $("#discount"+i).val();
          var total_hp = $("#total_hp"+i).val();
          total_dc = (discount * total_hp)/100;
          $("#total_dc"+i).val(total_dc);
        });
      $("#discount"+i).keyup(function(){
          var harga_dc = this.value;
          var total_dc = $("#total_dc"+i).val();
          var total_hp = $("#total_hp"+i).val();
          harga_dc = total_hp-total_dc;
          $("#harga_dc"+i).val(harga_dc);
        });
      $("#discount"+i).keyup(function(){
          var ppn = this.value;
          var harga_dc = $("#harga_dc"+i).val();
          ppn = harga_dc*0.1;
          $("#ppn"+i).val(ppn);
        });
      $("#discount"+i).keyup(function(){
          var total_all = this.value;
          var harga_dc = $("#harga_dc"+i).val();
          var ppn = $("#ppn"+i).val();
          total_all = parseInt(harga_dc)+parseInt(ppn);
          $("#total_all"+i).val(total_all);
          sumTotal();
        });
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
</script>

@endsection
