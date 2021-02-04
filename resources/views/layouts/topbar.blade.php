
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      @if(!helper_is_admin())
      <li class="nav-item d-none d-sm-inline-block">
        <a  type="button" id="loan_create"  class="btn btn-info float-right" href="#" onclick="return check_details();" class="nav-link"> <i class="fas fa-plus"></i> Request Loan</a>
      </li>
      @endif
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" role="button" onclick="$('body').hasClass('dark-mode')? $('body').removeClass('dark-mode'):$('body').addClass('dark-mode')">
          <i class="fas fa-lightbulb"></i>
        </a>
      </li>
       <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="{{asset('dist/img/user.png')}}" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline"></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary" style="background:#E0930A !important">
            <img src="{{asset('dist/img/user.png')}}" class="img-circle elevation-2" alt="User Image">

            <p>
               {{ Auth::user()->name }}
              <small>Member since {{\Carbon\Carbon::parse(Auth::user()->created_at )->format('F-Y')}}</small>
            </p>
          </li>
          <!-- Menu Body -->
          @if(!helper_is_admin())
          <li class="user-body">
            <div class="row">
              <div class="col-6 text-center">
                <a href="#">OutStanding Loan</a>
              </div>
              <div class="col-6 text-center">
                <a href="#">All Loans</a>
              </div>
            </div>
            <!-- /.row -->
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="/profile" class="btn btn-default btn-flat">Profile</a>
            <a  class="btn btn-default btn-flat float-right" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
          </li>
          @else
            <li class="user-body">
              <div class="row">
                <div class="col-6 text-center">
                  <a href="{{route('loan.active')}}">Active Loan</a>
                </div>
                <div class="col-6 text-center">
                  <a href="{{route('loan.request')}}">All Loan Requests</a>
                </div>
              </div>
              <!-- /.row -->
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <a href="#" class="btn btn-default btn-flat">Profile</a>
              <a  class="btn btn-default btn-flat float-right" href="{{ route('logout') }}"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
            </li>
          @endif
        </ul>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> --}}
    </ul>