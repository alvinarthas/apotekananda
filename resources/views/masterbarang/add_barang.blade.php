@extends('layouts.master')
@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Tambah Barang</h3>
    </div><!-- /.box-header -->

    <!-- form start -->
    <form action="/barang" method="POST">
      {{ csrf_field() }}
      <div class="box-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" name="barang" class="form-control" placeholder="Nama Barang" required>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang" required>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="number" name="harga" class="form-control" placeholder="Harga"required>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="number" name="min_qty" class="form-control" placeholder="Minimal Barang"required>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
                <label>Satuan Barang</label>
                <select class="form-control select2" id=satuan name="satuan"required>
                  @foreach($satuans as $satuan)
                  <option>{{$satuan->satuan}}</option>
                  @endforeach
                </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
                <label>Jenis Barang</label>
                <select class="form-control select2" id=jenis name="jenis"required>
                  <option>Barang Luar</option>
                  <option>Barang Dalam</option>
                </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
                <label>Kategori Barang</label>
                <select class="form-control select2" id=kategori name="kategori"required>
                  @foreach($kategoris as $kategori)
                  <option>{{$kategori->kategori}}</option>
                  @endforeach
                </select>
            </div>
          </div>
        </div>
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </div>
    </form>
</div><!-- /.box -->
@endsection
