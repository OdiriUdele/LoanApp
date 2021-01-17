<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CashDrive | @yield('subTitle')</title>

   @yield('header')
</head>
<body class="@yield('bodyClass')">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    @yield('topbar')
  </nav>
  <!-- /.navbar -->
  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
       <!-- Brand Logo -->
    <a href="/home" class="brand-link">
      <img src="{{asset('dist/img/logo.png')}}" alt="CashDrive" class="brand-image img-circle  elevation-3" style="opacity: 2; background:white">
      <span class="brand-text font-weight-light">CashDrive</span>
    </a>
      @yield('sidebar')
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
         @yield('alerts')
         
        @yield('content')
        
  </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
  <!-- /.content-wrapper -->
    <div class="modal fade" id="modal-info">
        <div class="modal-dialog">
          <div class="modal-content bg-info">
            <div class="modal-header">
              <h4 class="modal-title">Update Payment Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p> To add your Card detail, you will need to make a payment of &#8358;50 to confirm that card details are valid. After Confirmation a refund will be made&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <a href="{{route('payment.save')}}" type="button" class="btn btn-outline-light">Continue</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
  @yield('footer')
</div>
<!-- ./wrapper -->
</body>
</html>
