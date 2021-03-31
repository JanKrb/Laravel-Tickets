<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Nav::isRoute('home') }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('Dashboard') }}</span>
        </a>
    </li>

    <!-- Nav Item - Create Ticket -->
    <li class="nav-item {{ Nav::isRoute('createTicket') }}">
        <a class="nav-link" href="{{ route('createTicket') }}">
            <i class="fas fa-fw fa-plus"></i>
            <span>{{ __('New Ticket') }}</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        {{ __('Settings') }}
    </div>

    <!-- Nav Item - Profile -->
    <li class="nav-item {{ Nav::isRoute('profile') }}">
        <a class="nav-link" href="{{ route('profile') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>{{ __('Profile') }}</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        {{ __('Administration') }}
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Nav::isRoute('groups') }}">
        <a class="nav-link" href="{{ route('groups') }}">
            <i class="fas fa-fw fa-users-cog"></i>
            <span>{{ __('Groups') }}</span>
        </a>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Nav::isRoute('listAccounts') }}">
        <a class="nav-link" href="{{ route('listAccounts') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>{{ __('List Accounts') }}</span>
        </a>
    </li>

    <!-- Heading -->
    <div class="sidebar-heading">
        {{ __('Tickets') }}
    </div>

    <!-- Nav Item - Ticket List -->
    <li class="nav-item {{ Nav::isRoute('listTicket') }}">
        <a class="nav-link" href="{{ route('listTicket') }}">
            <i class="fas fa-fw fa-list"></i>
            <span>{{ __('Ticket List') }}</span>
        </a>
    </li>

    <!-- Nav Item - Ticket Settings -->
    <li class="nav-item {{ Nav::isRoute('adminTicket') }}">
        <a class="nav-link" href="{{ route('adminTicket') }}">
            <i class="fas fa-fw fa-wrench"></i>
            <span>{{ __('Ticket Settings') }}</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
