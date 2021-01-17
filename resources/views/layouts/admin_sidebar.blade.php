@if(helper_is_admin())
    <li class="nav-item">
        <a href="{{route('loan.active')}}" class="nav-link">
            <i class="nav-icon fas fa-coins"></i>
            <p>
            Active Loans
            {{-- <i class="fas fa-angle-left right"></i> --}}
            <span class="badge badge-info right">{{helper_active_loan_count()}}</span>
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('loan.request')}}" class="nav-link">
            <i class="nav-icon fas fa-coins"></i>
            <p>
            Loan Requests
            {{-- <i class="fas fa-angle-left right"></i> --}}
            <span class="badge badge-info right">{{helper_loan_request_count()}}</span>
            </p>
        </a>
    </li>
        
@endif