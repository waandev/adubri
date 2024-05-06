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

            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="la la-users"></i>
                    <span data-i18n="Accounts">Users</span>
                    <span class="badge badge badge-pill badge-success float-right mt-0"></span>
                </a>
            </li>

        </ul>
    </div>
</div>

<!-- END: Main Menu-->
