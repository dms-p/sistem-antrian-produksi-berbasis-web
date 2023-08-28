
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{route('dashboard.index')}}" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>Order<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('order.index')}}" class="nav-link">
                        <i class="fas fa-dot-circle nav-icon"></i>
                        <p>Order List</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('order.history')}}" class="nav-link">
                        <i class="fas fa-dot-circle nav-icon"></i>
                        <p>History Order</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('completed-order.index')}}" class="nav-link">
                        <i class="fas fa-dot-circle nav-icon"></i>
                        <p>Completed Order</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{route('message.show')}}" class="nav-link">
                <i class="fas fa-bell nav-icon"></i>
                <p>Messages{!!$totalMessageProduction!=0 ? '<span class="right badge badge-warning">'.$totalMessageProduction.'</span>':null!!}</p>
            </a>
        </li>
        <!--li-- class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>Widgets<span class="right badge badge-danger">New</span></p>
            </a>
        </!--li-->
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-database"></i>
                <p>Data Master<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('material.index')}}" class="nav-link">
                        <i class="fas fa-box nav-icon"></i>
                        <p>Materials</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('bundle-material.index')}}" class="nav-link">
                        <i class="fas fa-boxes nav-icon"></i>
                        <p>Bundle Materials</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('material-out.index')}}" class="nav-link">
                        <i class="fas fa-box-open nav-icon"></i>
                        <p>Material Out</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('material-opname.index')}}" class="nav-link">
                        <i class="fas fa-box-open nav-icon"></i>
                        <p>Material Opname</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('uom.index')}}" class="nav-link">
                        <i class="fas fa-tag nav-icon"></i>
                        <p>UOM</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{route('user.index')}}" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>User</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('seller.index')}}" class="nav-link">
                <i class="nav-icon fas fa-user-friends"></i>
                <p>Sales</p>
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
            <a href="{{route('customer.index')}}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>Customer</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('ads.index')}}" class="nav-link">
                <i class="nav-icon fas fa-image"></i>
                <p>Ads</p>
            </a>
        </li>
        <li class="nav-item">
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button type="submit" class="btn btn-success w-100"><i class="fas fa-sign-out-alt nav-icon"></i>Logout</button>
            </form>
        </li>
    </ul>
</nav>