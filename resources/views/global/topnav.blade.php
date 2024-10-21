<header id="topnav" class="topbar-dark">
    <nav class="navbar-custom">
        <ul class="list-unstyled topbar-right-menu float-right mb-0">       
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="ml-1">{{ ucfirst(infinityUser::get_name(Auth::user()->id)) }}<i class="mdi mdi-chevron-down"></i> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h6 class="text-overflow m-0">Welcome {{ ucfirst(infinityUser::get_name(Auth::user()->id)) }}!</h6>
                    </div>
                    <a href="/logout" class="dropdown-item notify-item">
                        <i class="dripicons-power"></i> <span>Logout</span>
                    </a>
                </div>
            </li>

            <li class="dropdown notification-list">
                <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                    <i class="fe-settings noti-icon"></i>
                </a>
            </li>

        </ul>
        <ul class="list-unstyled menu-left mb-0">
            @php
            if(Auth::user()->role == 'Administrator') {
                $home = '/admin/dashboard';
            }
            @endphp
            <li class="float-left">
                <a href="{{ $home }}" class="logo">
                    Helpdesk
                </a>
            </li>
            <li class="float-left">
                <a class="button-menu-mobile open-left navbar-toggle">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
            </li>
        </ul>
    </nav>
</header>