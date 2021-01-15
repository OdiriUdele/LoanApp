@extends('layouts.master')

@section('subTitle')
  Edit Profile
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
            <h1>Edit Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit My Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <form method="post" action="{{ route('profile.update',['id'=>Auth::user()->id ]) }}" name="save_user_details" id="save_user_details">
       @csrf
      
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">User Bio</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{Auth::user()->details?Auth::user()->details->phone:'' }}">
              </div>
              <div class="form-group">
                <label for="DOB">Date Of Birth</label>
                <input type="date" id="DOB" name="date_of_birth" class="form-control" value="{{Auth::user()->details?\Carbon\Carbon::parse(Auth::user()->details->date_of_birth)->format('Y-m-d'):'' }}">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Bank Details</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="bankname">Bank Name</label>
                <input type="text" id="bankname" name="bank_name" class="form-control" value="{{Auth::user()->details?Auth::user()->details->bank_name:'' }}">
              </div>
              <div class="form-group">
                <label for="bankAcctName">Account Name</label>
                <input type="text" id="bankAcctName" name="bank_acct_name" class="form-control" value="{{Auth::user()->details?Auth::user()->details->bank_acct_name:'' }}">
              </div>
              <div class="form-group">
                <label for="bankAcctNum">Account Number</label>
                <input type="text" id="bankAcctNum" name="bank_acct_num" class="form-control" value="{{Auth::user()->details?Auth::user()->details->bank_acct_num:'' }}" >
              </div>
               <div class="form-group">
                <label for="bvn">BVN Number</label>
                <input type="text" id="bvn"  name="bvn_number" class="form-control" value="{{Auth::user()->details?Auth::user()->details->bvn_number:'' }}">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
          <a href="{{url('/profile')}}" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Save Changes" class="btn btn-success float-right" >
        </div>
      </div>
      </form>
      
    </section>
    <!-- /.content -->
@endsection

@section('footer')
    @include('layouts.footer')
@endsection