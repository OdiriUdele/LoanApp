@extends('layouts.master')

@section('subTitle')
  Profile
@endsection

@section('header')
    @include('layouts.header')
@endsection 

@section('bodyClass')
  hold-transition sidebar-mini
@endsection 

@section('topbar')
    @include('layouts.topbar')
@endsection

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('content')
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">My Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">My Profile</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Active Loan Amount</span>
                      <span class="info-box-number text-center text-muted mb-0">2300</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Active Loan Due Date</span>
                      <span class="info-box-number text-center text-muted mb-0">20-10-21</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Total Loan</span>
                      <span class="info-box-number text-center text-muted mb-0">20</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Recent Activity</h4>
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                        </span>
                        <span class="description">Shared publicly - 7:45 PM today</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore.
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v2</a>
                      </p>
                    </div>

                    <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                        </span>
                        <span class="description">Sent you a message - 3 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore.
                      </p>
                      <p>
                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 2</a>
                      </p>
                    </div>

                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                        </span>
                        <span class="description">Shared publicly - 5 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore.
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v1</a>
                      </p>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                  <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                src="{{asset('dist/img/user.png')}}"
                                alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                        <p class="text-muted text-center">Software Engineer</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>email address</b> <a class="float-right">{{ Auth::user()->email }}</a>
                            </li>
                        </ul>

                        <a href="{{route('profile.edit',['id'=>1]) }}" class="btn btn-primary btn-block"><b>Edit User Details</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
              <h3 class="text-primary"><i class="fas fa-money-check"> </i>Bank Details</h3>
              {{-- <p class="text-muted">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p> --}}
              {{-- <br> --}}
              <div class="text-muted">
                <h5 class="text-sm">Bank Name
                  <b class="d-block">Access Bank</b>
                </h5>
                <h5 class="text-sm">Account Number
                  <b class="d-block">2009854321</b>
                </h5>
                 <h5 class="text-sm">Account Name
                  <b class="d-block">Odiri Udele</b>
                </h5>
                 <h5 class="text-sm">BVN Number
                  <b class="d-block">2009854321</b>
                </h5>
              </div>
              <div class="text-center mt-5 mb-3">
                <a href="#" class="btn btn-sm btn-primary"> <i class="fas fa-plus"> </i> Request Loan</a>
                <a href="#" class="btn btn-sm btn-warning" style="background:#E0930A !important"><i class="fas fa-money-check-alt"></i> Pay Loan</a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection

@section('footer')
    @include('layouts.footer')
@endsection