<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CashDrive | @yield('subTitle')</title>

   @yield('header')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    @yield('topbar')
  </nav>
  <!-- /.navbar -->
  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-primary elevation-4">
       <!-- Brand Logo -->
    <a href="/home" class="brand-link">
      <img src="{{asset('dist/img/logo.png')}}" alt="CashDrive" class="brand-image img-circle  elevation-3" style="opacity: 2; background:white">
      <span class="brand-text font-weight-light">CashDrive</span>
    </a>
      @yield('sidebar')
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        @yield('content')
  </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>>
  <!-- /.content-wrapper -->
  @yield('footer')
</div>
<!-- ./wrapper -->
</body>
</html>
