<div class="left-side-menu">
    <!--- Sidemenu -->
    <div id="sidebar-menu" class="active">
        <ul class="metismenu in" id="side-menu">
            <li class="menu-title">Navigation</li>
            <li><a href="/admin/dashboard"><i class="mdi mdi-view-dashboard"></i> <span>Dashboard</span></a></li>
            <li>
                <a href="javascript:void(0);" aria-expanded="false">
                    <i class="mdi mdi-ticket"></i>
                    <span> Tickets</span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level collapse" aria-expanded="false">
                    <li><a href="{{ route('tickets') }}">Ticket List</a></li>
                    <li><a href="{{ route('admin.issue') }}">Issue Types</a></li>
                </ul>
            </li>
            <li><a href="{{ route('admin.user') }}"><i class="mdi mdi-account"></i> <span>User</span></a></li>
            <li><a href="#"><i class="mdi mdi-chart-line"></i> <span>Report</span></a></li>
        </ul>
    </div>
    <div class="clearfix"></div>
</div>