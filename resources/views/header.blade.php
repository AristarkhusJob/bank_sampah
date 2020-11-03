<div class="horizontal-menu">
    <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container-fluid">
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo"><img src="../assets/dashboardAssets/images/logo.svg" alt="logo"/></a>
                <a class="navbar-brand brand-logo-mini"><img src="../assets/dashboardAssets/images/logo-mini.svg" alt="logo"/></a>
            </div>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        <span class="nav-profile-name">{{ Auth::user()->name }}</span>
                        <img src="../assets/dashboardAssets/images/user.png" alt="profile"/>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}">
                            <i class="mdi mdi-logout text-primary"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
        </div>
    </nav>
    <nav class="bottom-navbar">
        <div class="container">
            <ul class="nav page-navigation">
                
                @if (Auth::user()->type == 'super admin' || Auth::user()->type == 'admin')
                <li class="nav-item">
                    <a href="/index" class="nav-link">
                    <i class="mdi mdi-chart-areaspline menu-icon"></i>
                    <span class="menu-title">Beranda</span>
                    </a>
                </li>
                @endif
                
                <li class="nav-item">
                    <a href="{{ route('beasiswa.index') }}" class="nav-link">
                        <i class="mdi mdi-school menu-icon"></i>
                        <span class="menu-title">Beasiswa</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                
                @if (Auth::user()->type == 'super admin')
                <li class="nav-item">
                    <a href="/transaction" class="nav-link">
                        <i class="mdi mdi-cash-multiple menu-icon"></i>
                        <span class="menu-title">Transaksi</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('trash.index') }}" class="nav-link">
                        <i class="mdi mdi-recycle menu-icon"></i>
                        <span class="menu-title">Sampah</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('beswan.index') }}" class="nav-link">
                        <i class="mdi mdi-account-card-details menu-icon"></i>
                        <span class="menu-title">Beswan</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('payment.index') }}" class="nav-link">
                        <i class="mdi mdi-cash-usd menu-icon"></i>
                        <span class="menu-title">Pembayaran</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link">
                        <i class="mdi mdi-account-multiple-plus menu-icon"></i>
                        <span class="menu-title">User</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                @endif
                
                @if (Auth::user()->type == 'super admin' || Auth::user()->type == 'admin')
                <li class="nav-item">
                    <a href="{{ route('notif.index') }}" class="nav-link">
                        <i class="mdi mdi-motorbike menu-icon"></i>
                        <span class="menu-title">Penjemputan</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                @endif
                
            </ul>
        </div>
    </nav>
</div>
