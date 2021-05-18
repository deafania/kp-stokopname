<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>
  
  @include('includes.backend.style')
  
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
  
  @yield('script-after')
  @include('sweetalert::alert')

  @livewireScripts
</body>
</html>
