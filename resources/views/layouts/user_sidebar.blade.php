@if(!helper_is_admin())
    <li class="nav-item">
    <a href="{{ url('/profile') }}" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>
        Your Profile
        </p>
    </a>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-coins"></i>
            <p>
            Loans
            <i class="fas fa-angle-left right"></i>
            <span class="badge badge-info right">{{helper_user_loan_count()}}</span>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ url('/loan') }}" class="nav-link">
                <i class="fa fa-coins nav-icon"></i>
                <p>View Loans</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="#" onclick="return check_details();" class="nav-link">
                <i class="fa fa-wallet nav-icon"></i>
                <p>Request Loan</p>
            </a>
            </li>
        </ul>
    </li>
@endif