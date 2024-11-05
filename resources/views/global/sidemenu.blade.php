<div class="left-side-menu">
    <!--- Sidemenu -->
    <div id="sidebar-menu" class="active">
        <ul class="metismenu in" id="side-menu">
            <li class="menu-title">Navigation</li>
            <li><a href="/dashboard"><i class="mdi mdi-view-dashboard"></i> <span>Dashboard</span></a></li>
            <li>
                <a href="javascript:void(0);" aria-expanded="false">
                    <i class="mdi mdi-ticket"></i>
                    <span> Tickets</span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level collapse" aria-expanded="false">
                    <li><a href="{{ route('tickets') }}">Ticket List</a></li>
                    @if(Auth::user()->role == 'Administrator')
                    <li><a href="{{ route('issue') }}">Issue Types</a></li>
                    @endif
                </ul>
            </li>
            @if(Auth::user()->role == 'Administrator')
            <li><a href="{{ route('user') }}"><i class="mdi mdi-account"></i> <span>User</span></a></li>
            @endif
        </ul>
    </div>
    <div class="clearfix"></div>
    {{ HTML::image('img/logo.jpg', 'Logo', array('style' => 'width:100%;display:block;margin:0 auto;')) }}
</div>