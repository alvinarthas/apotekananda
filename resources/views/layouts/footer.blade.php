<!-- <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
</footer> -->
<!-- ./wrapper -->
<!-- jQuery 2.1.4 -->
    <script src="{{asset('assets/plugin/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('assets/plugin/jQueryUI/jquery-ui.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('assets/plugin/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{asset('assets/plugin/morris/morris.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{asset('assets/plugin/select2/select2.full.min.js') }}"></script>
    <!-- <script src="{{asset('assets/plugin/select2/select2.min.js') }}"></script> -->
    <!-- Chosen -->
    <script src="{{asset('assets/plugin/chosen/chosen.jquery.js') }}"></script>
    <!-- JQuery Form -->
    <script src="{{asset('assets/plugin/jquery.form.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{asset('assets/plugin/sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- jvectormap -->
    <script src="{{asset('assets/plugin/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{asset('assets/plugin/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('assets/plugin/knob/jquery.knob.js') }}"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{{asset('assets/plugin/daterangepicker/daterangepicker.js') }}"></script>
    <!-- datepicker -->
    <script src="{{asset('assets/plugin/datepicker/bootstrap-datepicker.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('assets/plugin/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script src="{{asset('assets/plugin/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{asset('assets/plugin/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('assets/js/app.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{asset('assets/plugin/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{asset('assets/plugin/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script>
      $(function () {
        $("#user").select2();
        $("#role").select2();
        $("#jenis").select2();
        $("#kategori").select2();
        $("#satuan").select2();
        $("#barang").select2();
        $("#barang2").select2();
        $("#tbl_akun").DataTable();
        $("#current_mapping").DataTable();
        $("#master_satuan").DataTable();
        $("#master_barang").DataTable();
        $("#master_pbf").DataTable();
        $("#view_pemesanan").DataTable();
      });
    </script>
