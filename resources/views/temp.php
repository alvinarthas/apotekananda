<script>
    $(function() {
      $("#berat").on("change paste keyup", function() {
         $("#total").val(5000*($("#berat").val()));
      });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        addRow();
        $("#barang").select2();
    });

    function addRow(){
        counterRowjurnal=parseInt($('#counterRowjurnal').val())+1;
        var html=
        '<xzztr>'+
            '<xzztd>conjurnal</td>'
            +
            '<xzztd><input type="date" name="date_pemesanan[]" class="form-control" required></xzztd>'
            +
            '<xzztd><select class="form-control select2" id=barang name="kode_barang[]" required>'
            +'@foreach($barangs as $barang)<option value="{{$barang->kode_barang}}">{{$barang->barang}}</option>'
            +'@endforeach </select></xzztd>'
            +
            '<xzztd><input type="number"  name="jml_order[]" class="form-control"  required></xzztd>'
            +
            '<xzztd><input type="number"  name="harga_pesanan[]" class="form-control" required></xzztd>'
            +
            '<xzztd><input type="number"  name="total_hp[]" class="form-control"  readonly required></xzztd>'
            +
            '<xzztd><input type="number" name="discount[]" class="form-control"  required></xzztd>'
            +
            '<xzztd><input type="number" name="total_dc[]" class="form-control"  required readonly></xzztd>'
            +
            '<xzztd><input type="number" name="harga_dc[]" class="form-control"  required readonly></xzztd>'
            +
            '<xzztd><input type="number" name="ppn[]" class="form-control" value="10" required readonly></xzztd>'
            +
            '<xzztd><input type="number" name="total_all[]" class="form-control"  required readonly></xzztd>'
            +
            '<xzztd>'+
                '<input type="button" onclick="addRow();" class="btn btn-xs btn-success" value="+"></input>'+
                '<input id="conjurnal" type="button" onclick="delRowQuotation(this.id);" class="btn btn-xs btn-warning" value="-"></input>'
                +
            '</td>'+
        '</xzztr>';
        while (html != (html=html.replace("conjurnal", counterRowjurnal)));
        while (html != (html=html.replace("xzz", '')));
        $('#counterRowjurnal').parent().parent().before(html);
        $('#counterRowjurnal').val(counterRowjurnal);
        $(".chosen-select").chosen();
    }

    function sumTotal(){
        var sum = 0;
        $('.qty').each(function(){
            sum += parseFloat(this.value.replace(/,/g, ''));
        });
        $('#total').val(sum).formatCurrency();
    }

    function delRowQuotation(id){
        // alert(id);
        $('#'+id).parent().parent().detach();

        sumTotal();
    }

</script>
<script type="text/javascript">
function deleteRow(row)
{
  var i=row.parentNode.parentNode.rowIndex;
  document.getElementById('POITable').deleteRow(i);
}


function insRow()
{
  console.log( 'hi');
  var x=document.getElementById('pemesanan');
  var new_row = x.rows[1].cloneNode(true);
  var len = x.rows.length;
  new_row.cells[0].innerHTML = len;

  var inp1 = new_row.cells[1].getElementsById('coba')[0];
  inp1.id += len;
  inp1.value = '';
  var inp2 = new_row.cells[2].getElementsById('date_pemesanan')[0];
  inp2.id += len;
  var inp3 = new_row.cells[3].getElementsByTagName('barang')[0];
  inp1.id += len;
  inp1.value = '';
  var inp4 = new_row.cells[4].getElementsByTagName('jml_order')[0];
  inp1.id += len;
  inp1.value = '';
  var inp5 = new_row.cells[5].getElementsByTagName('harga_pesanan')[0];
  inp1.id += len;
  inp1.value = '';
  var inp6 = new_row.cells[6].getElementsByTagName('total_hp')[0];
  inp1.id += len;
  inp1.value = '';
  var inp7 = new_row.cells[7].getElementsByTagName('discount')[0];
  inp1.id += len;
  inp1.value = '';
  var inp8 = new_row.cells[8].getElementsByTagName('total_dc')[0];
  inp1.id += len;
  inp1.value = '';
  var inp9 = new_row.cells[9].getElementsByTagName('harga_dc')[0];
  inp1.id += len;
  inp1.value = '';
  var inp10 = new_row.cells[10].getElementsByTagName('ppn')[0];
  inp1.id += len;
  inp1.value = '';
  var inp11 = new_row.cells[11].getElementsByTagName('total_all')[0];
  inp1.id += len;
  inp1.value = '';
  var inp12 = new_row.cells[12].getElementsByTagName('options')[0];
  inp1.id += len;
  inp1.value = '';
}
</script>
<script type="text/javascript">
$(document).ready(function(){
    $("submit_baris").click(function(){
      var new_row = $("new_baris").val();
      $.post("pemesanan/row_pemesanan.php",{
            rows : new_row
        }, function(data){
          $("count_row").html(data);
      });
    });
  });
</script>
