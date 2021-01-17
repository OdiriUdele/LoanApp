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

@section('alerts')
  @include('layouts.alert')
@stop

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
                <div class="col-12 col-sm-3">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Active Loan Amount</span>
                      <span class="info-box-number text-center text-muted mb-0">{{helper_user_active_loan()?'&#8358;'.helper_user_active_loan()->amount: 'No Active Loan'}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-3">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Active Loan Due Date</span>
                      <span class="info-box-number text-center text-muted mb-0">{{helper_user_active_loan()?\Carbon\Carbon::parse(helper_user_active_loan()->loanPayment->due_date):'yyyy-mm-dd'}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-3">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Active Loan Penalty</span>
                      <span class="info-box-number text-center text-muted mb-0">{{helper_user_active_loan()?helper_user_active_loan()->incurred_charge:0}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-3">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Total Loan</span>
                      <span class="info-box-number text-center text-muted mb-0">{{helper_user_loan_count()}}</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Recent Activity</h4>
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{asset('dist/img/user.png')}}" alt="user image">
                        <span class="username">
                          <a href="#">You Created a Loan</a>
                        </span>
                        <span class="description">on - 7:45 PM today</span>
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
                        <img class="img-circle img-bordered-sm" src="{{asset('dist/img/user.png')}}" alt="User Image">
                        <span class="username">
                          <a href="#">You Created a Loan</a>
                        </span>
                        <span class="description"> 1 days ago</span>
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
                        <img class="img-circle img-bordered-sm" src="{{asset('dist/img/user.png')}}" alt="user image">
                        <span class="username">
                          <a href="#">You Registered</a>
                        </span>
                        <span class="description"> - 5 days ago</span>
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

                        <div class="text-center mt-5 mb-3">
                          <a href="{{route('profile.edit',['id'=>1]) }}" class="btn btn-primary btn-block"><b>Edit User Details</b></a>
                          <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-info"><b>Update Payment Info</b></a>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
              <h3 class="text-primary"><i class="fas fa-money-check"> </i>Payment Details</h3>
              {{-- <p class="text-muted">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p> --}}
              {{-- <br> --}}
              <div class="text-muted">
             
              @if(helper_user_payauth_active())
                 <?php
                  $payment_Det = auth()->User()->activepayment_auths();
                  ?>
                <h5 class="text-sm">Card Type
                  <b class="d-block">{{$payment_Det->card_type}}</b>
                </h5>
                <h5 class="text-sm">Card
                  <b class="d-block">Card ending with xxxx{{$payment_Det->last4}}</b>
                </h5>
                <h5 class="text-sm">Bank
                  <b class="d-block">{{$payment_Det->bank}}</b>
                </h5>
                 <h5 class="text-sm">Account Name
                  <b class="d-block">{{$payment_Det->account_name}}</b>
                </h5>
              @else
                <h5 class="text-sm">No Payment Detail
                </h5>
              @endif
              </div>
              <div class="text-center mt-5 mb-3">
                <a href="#" onclick="return check_details();" class="btn btn-sm btn-primary"> <i class="fas fa-plus"> </i> Request Loan</a>
                <a href="/loan" class="btn btn-sm btn-warning" style="background:#E0930A !important"><i class="fas fa-money-check-alt"></i> View Loans</a>
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