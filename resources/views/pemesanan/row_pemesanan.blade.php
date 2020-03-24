@if(isset($request->rows))
    @php($row=$request->rows)
    @php($i=0)
    @while($i != $row)
      <tr>
          <td>1</td>
          <td><input type="date" name="date_pemesanan[]" class="form-control" required></td>
          <td>
            <select class="form-control select2" id=barang name="kode_barang[]" required>
              @foreach($barangs as $barang)<option value="{{$barang->kode_barang}}">{{$barang->barang}}</option>
              @endforeach
            </select></td>
          <td><input type="number"  name="jml_order[]" class="form-control"  required></td>
          <td><input type="number"  name="harga_pesanan[]" class="form-control" required></td>
          <td><input type="number"  name="total_hp[]" class="form-control"  readonly required></td>
          <td><input type="number" name="discount[]" class="form-control"  required></td>
          <td><input type="number" name="total_dc[]" class="form-control"  required readonly></td>
          <td><input type="number" name="harga_dc[]" class="form-control"  required readonly></td>
          <td><input type="number" name="ppn[]" class="form-control" value="10" required readonly></td>
          <td><input type="number" name="total_all[]" class="form-control"  required readonly></td>
      </tr>
  @endwhile
@endif
