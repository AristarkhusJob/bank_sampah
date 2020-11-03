<div class="horizontal-menu">
    <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container-fluid">
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo"><img src="{{asset('../assets/dashboardAssets/images/logo.svg')}}" alt="logo"/></a>
                <a class="navbar-brand brand-logo-mini"><img src="{{asset('../assets/dashboardAssets/images/logo-mini.svg')}}" alt="logo"/></a>
            </div>
            <ul class="navbar-nav navbar-nav-right">                    
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        <span class="nav-profile-name">{{ Auth::user()->name }}</span>
                        <img src="{{asset('../assets/dashboardAssets/images/user.png')}}" alt="profile"/>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"> 
                            <i class="mdi mdi-logout text-primary"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
        </div>
    </nav>
</div>