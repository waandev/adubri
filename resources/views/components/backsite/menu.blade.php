<!-- BEGIN: Main Menu-->

<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow"
    role="navigation" data-menu="menu-wrapper">
    <div class="navbar-container main-menu-content" data-menu="menu-container">
        <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
            <li
                class="nav-item {{ request()->is('backsite/dashboard') || request()->is('backsite/dashboard/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('backsite.dashboard.index') }}">
                    <i class="la la-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="la la-comments"></i>
                    <span data-i18n="Accounts">Aduan</span>
                    <span class="badge badge badge-pill badge-success float-right mt-0"></span>
                </a>
            </li>

            @if (Auth::check() && Auth::user()->role_user()->first()->role_id == 1)
                <li
                    class="nav-item {{ request()->is('backsite/user') || request()->is('backsite/user/*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('backsite.user.index') }}">
                        <i class="la la-users"></i>
                        <span data-i18n="Accounts">User</span>
                        <span class="badge badge badge-pill badge-success float-right mt-0">{{ $totalUser }}</span>
                    </a>
                </li>

                <li
                    class="nav-item {{ request()->is('backsite/service') || request()->is('backsite/service/*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('backsite.user.index') }}">
                        <i class="la la-briefcase"></i>
                        <span data-i18n="Accounts">Layanan</span>
                    </a>
                </li>
            @endif

            <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#"
                    data-toggle="dropdown"><i class="la la-cog"></i><span data-i18n="Payments">Konfigurasi</span></a>
                <ul class="dropdown-menu">
                    <li data-menu=""><a class="dropdown-item" href="bank-payments.html" data-toggle=""><span
                                data-i18n="Payments">Profil</span></a>
                    </li>
                    <li data-menu=""><a class="dropdown-item" href="bank-add-payment.html" data-toggle=""><span
                                data-i18n="Add New">Ganti Password</span></a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</div>

<!-- END: Main Menu-->
