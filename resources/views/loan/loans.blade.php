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
              <li class="breadcrumb-item active">Loans</li>
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
          <h3 class="card-title">Loan </h3>

          <div class="card-tools">
            <a  type="button" id="loan_create" class="btn btn-info float-left" href="#" onclick="return check_details();"class="nav-link"> <i class="fas fa-plus"></i> Request Loan</a>
            {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button> --}}
          </div>
        </div><br>
        <div class="card-body p-0">
          <table id="example1" class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                          Loan Name
                      </th>
                      <th style="width: 15%">
                          Loan Amount
                      </th>
                      <th style="width: 8%" class="text-center">
                          Active
                      </th>
                      <th style="width: 10%">
                         Due Date
                      </th>
                      <th>
                          Status
                      </th>
                      <th style="width:10%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach($userLoans as $loan)
                  <tr>
                      <td>
                          #
                      </td>
                      <td>
                          <a>
                             {{$loan->loan_name}}
                          </a>
                          <br/>
                          <small>
                              Created {{$loan->created_at}}
                          </small>
                      </td>
                      <td>
                          {{$loan->amount}}
                      </td>
                      <td class="project-state">
                          <span class="badge badge-{{$loan->active==1?'success':'danger'}}">{{$loan->active==1?'Active':'Pending Activation'}}</span>
                      </td>
                       <td>
                          {{$loan->active==1?$loan->loanPayment()->due_date:''}}
                      </td>
                     <?php 
                           $status = $loan->active==1?\Carbon\Carbon::parse($loan->loanPayment()->due_date)->diff(\Carbon\Carbon::now())->days:0;
                            $status2 = $loan->active==1?\Carbon\Carbon::parse($loan->loanPayment()->due_date)->diff(\Carbon\Carbon::parse($loan->loanPayment()->created_at))->days:0;
                           $perc = round(($status2/($status+1))*100,2);
                      ?>
                      <td class="project_progress">
                          <div class="progress progress-sm">
                              <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{$status}}" aria-valuemin="0" aria-valuemax="{{$status+1}}" style="width: {{$perc}}%">
                              </div>
                          </div>
                          <small>
                            {{$status}} days till expiration
                          </small>
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          {{-- <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Activate
                          </a>
                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>  --}}
                      </td>
                  </tr>
                @endforeach
              </tbody>
          </table>
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