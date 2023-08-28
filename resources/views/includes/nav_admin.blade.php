
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{route('dashboard.index')}}" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('completed-order.index')}}" class="nav-link">
                <i class="fas fa-shopping-cart nav-icon"></i>
                <p>Completed Order</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('message.show')}}" class="nav-link">
                <i class="fas fa-file nav-icon"></i>
                <p>New Report{!!($totalMessageAdmin!=0) ? '<span class="right badge badge-warning">'.$totalMessageAdmin.'</span>':null!!}</p>
            </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>Report<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('orderReport.index')}}" class="nav-link">
                        <i class="fas fa-dot-circle nav-icon"></i>
                        <p>Order Report</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('material-stock.index')}}" class="nav-link">
                        <i class="fas fa-dot-circle nav-icon"></i>
                        <p>Stock Report</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('material-rejectReport.index')}}" class="nav-link">
                        <i class="fas fa-dot-circle nav-icon"></i>
                        <p>Material Reject</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button type="submit" class="btn btn-success w-100"><i class="fas fa-sign-out-alt nav-icon"></i>Logout</button>
            </form>
        </li>
    </ul>
</nav>