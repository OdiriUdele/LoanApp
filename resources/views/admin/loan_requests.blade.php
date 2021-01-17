@extends('layouts.master')

@section('subTitle')
  Loan Requests
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
              <li class="breadcrumb-item"><a href="/hpme">Home</a></li>
              <li class="breadcrumb-item active">Loan Requests</li>
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
          <h3 class="card-title">Loan Requests </h3>

          <div class="card-tools">
            <a  type="button" id="loan_create" class="btn btn-info float-left" href="{{route('loan.active')}}" class="nav-link"> <i class="fas fa-money"></i> Active Loans</a>
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
                       <th style="width: 20%">
                          Loan user
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
                      <th style="width:10%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach($loanrequests as $loan)
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
                          <a>
                             {{$loan->user->name}}
                          </a>
                          <br/>
                          <small>
                             {{$loan->user->email}}
                          </small>
                      </td>
                      <td>
                          {{$loan->amount}}
                      </td>
                      <td class="project-state">
                          <span class="badge badge-{{$loan->active==1?'success':'danger'}}">{{$loan->active==1?'Active':'Pending Activation'}}</span>
                      </td>
                       <td>
                          {{$loan->due_date}}
                      </td>
                      <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="#" onclick="return check_loan({{$loan->id}},{{helper_user_has_active_loan($loan->user_id)}})">
                              <i class="fas fa-check">
                              </i>
                              Activate
                          </a>
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
    <script>
      function check_loan(id,count){
       console.log(count);
        if(count){
          warningtoast('Active Loan Exist','User has an Active Loan','An Active Loan Exists for this User Already <a href="/active/loan"><b>Click HERE</b></a> to see.')
        }else{
          window.location.href = '/activate_loan/'+id;
        }
      }
    </script>
@endsection