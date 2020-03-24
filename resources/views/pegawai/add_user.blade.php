@extends('layouts.master')
@section('content')
<!--HTML PENGGUANA -->
<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Tambah Akun</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <form name="formaja" action="/akun" method="POST" enctype="multipart/form-data" >
      {{ csrf_field() }}
      <div class="box-body">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>

            <input type="text" name="first_name" id="first" class="form-control" placeholder="First Name">
          </div>
        </div>
        <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>

              <input type="text" name="last_name" id="last" class="form-control" placeholder="Last Name">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" name="username" class="form-control" placeholder="Username">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-fw fa-bank"></i></span>

            <input type="text" name="alamat" class="form-control" placeholder="Alamat">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-fw fa-phone"></i></span>

            <input type="number" name="telepon" class="form-control" placeholder="Telepon">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

            <input type="email" name="email" class="form-control" placeholder="Email">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>

            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-lock"></i></span>

          <input type="password" name="pass_conf" class="form-control" placeholder="Password Confirmation">
      </div>
    </div>
    <!-- <div class="form-group">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
        <input type="file" name="img" multiple />
      </div>
    </div> -->
    <div class="form-group">
      <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
      <select class="form-control select2" id=selectjenis name="sex">
        <option>Laki-laki</option>
        <option>Perempuan</option>
      </select>
    </div>
  </div><!-- /.box-body -->

      <div class="box-footer">
        <button onclick="validasi()">Submit</button>
      </div>
    </form>
    <script >
      function validasi(){
          var a = document.getElementById("first").value;
          var b = document.getElementById("last").value;
          if (a == "" || b == "")
            {
              alert("Name must be filled out");
            }
      }
    </script>
  </div><!-- /.box -->
  <!-- ////////////////////////////////////////////////////////// -->
@endsection
