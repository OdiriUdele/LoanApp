@extends('layouts.master')

@section('subTitle')
  Loans
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
            <h1>Loans</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="/loan">Loans</a></li>
              <li class="breadcrumb-item active">Request Loans</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

     <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                <h3 class="card-title">Create Loan</h3>
                </div>
                <div class="card-body p-0">
                    <form method="post" action="{{ route('loan.store') }}" name="save_user_details" id="save_user_details">
                       @csrf
                        <div class="bs-stepper">
                            <div class="bs-stepper-header" role="tablist">
                            <!-- your steps here -->
                            <div class="step" data-target="#logins-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                <span class="bs-stepper-circle">1</span>
                                <span class="bs-stepper-label">Loan Details</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#information-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                <span class="bs-stepper-circle">2</span>
                                <span class="bs-stepper-label">Loan Collateral</span>
                                </button>
                            </div>
                            </div>
                            <div class="bs-stepper-content">
                            <!-- your steps content here -->
                            <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                <div class="form-group">
                                    <label for="loan_name">Loan Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-at"></i></span>
                                        </div>
                                        <input type="email" class="form-control" id="loan_name" name="loan_name" placeholder="Loan Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-money-bill-alt"></i></span>
                                        </div>
                                        <input type="number" class="form-control" id="amount" name="amount" placeholder="Amount">
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="due_date">Due Date</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" class="form-control" id="due_date" name="due_date" min="<?php echo date("Y-m-d"); ?>" placeholder="dd/mm/yyyy">
                                    </div>
                                </div>
                                <a href="{{url('/loan')}}" class="btn btn-secondary float-right">Cancel</a>
                                <a href="#" class="btn btn-primary"onclick="return next()">Next</a>
                            </div>
                            <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                <div class="form-group">
                                    <label for="car_year">Car Year</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-car"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="car_year" name="car_year"  placeholder="Car Year" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="car_make">Car Make</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-car"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="car_make" name="car_make" placeholder="Car Make">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="car_model">Car Model</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-car"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="car_model" name="car_model" placeholder="Model">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="car_body_style">Car Body Style</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-car"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="car_body_style" name="car_body_style" placeholder="Body Style">
                                    </div>
                                </div>
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <a href="{{url('/loan')}}" class="btn btn-secondary float-right">Cancel</a>
                                <a href="#" class="btn btn-primary"onclick="return previous()">Previous</a>
                                <button type="button"  onclick="$('#save_user_details').submit()" class="btn btn-primary">Submit</button>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                Visit <a href="https://casdrive/.co/">CashDrive</a> for more details about loans.
                </div>
            </div>
            <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
@endsection

@section('footer')
    @include('layouts.footer')
    <!-- BS-Stepper -->
    <script src="{{asset('plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>        
    <script>
         // BS-Stepper Init
        $(document).ready(function () {
            const stepper = new Stepper($('.bs-stepper')[0])
           
        })
         function next(){
            const stepper = new Stepper($('.bs-stepper')[0])
            stepper.next();
        }
        function previous(){
            const stepper = new Stepper($('.bs-stepper')[0])
            stepper.previous();
        }
    </script>
@endsection