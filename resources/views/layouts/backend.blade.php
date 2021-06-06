<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>
  
  @include('includes.backend.style')
  @yield('custom_head')
  <livewire:styles />
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>
    
    <!-- Navbar -->
    @include('includes.backend.navbar')
    <!-- /.navbar -->
    
    <!-- Main Sidebar Container -->
    @include('includes.backend.sidebar')
    
    <!-- Content Wrapper. Contains page content -->
    @yield('content') 
    <!-- /.content-wrapper -->
    @include('includes.backend.footer')
    
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  
  @include('includes.backend.script')

  @stack('custom_js')

  <script>
    $("#id_namabarang").on("change", function () {
    if ($("#id_namabarang").val() != null) {
        $.get('/databarang/getDataBarang/' + $("#id_namabarang").val(), function (obj) {
            var getDataBarang = obj;
            $("#stok").val(getDataBarang['stok']);
            $("#jumlah_masuk").val(null);
            $("#total_stok").val(null);
        });
    } else {
        $("#stok").val(null);
        $("#jumlah_masuk").val(null);
        $("#total_stok").val(null);
    }
  });

    $("#jumlah_masuk").on('keyup', function () {
      var stok = $("#stok").val();
      var jumlah_masuk = $("#jumlah_masuk").val();
      var total_stok = parseInt(stok) + parseInt(jumlah_masuk);
      $("#total_stok").val(total_stok);
    });

    $("#jumlah_masuk").on('change', function () {
      var stok = $("#stok").val();
      var jumlah_masuk = $("#jumlah_masuk").val();
      var total_stok = parseInt(stok) + parseInt(jumlah_masuk);
      $("#total_stok").val(total_stok);
    });
  </script>

  @yield('script-after')
  @include('sweetalert::alert')


  <livewire:scripts />

</body>
</html>
