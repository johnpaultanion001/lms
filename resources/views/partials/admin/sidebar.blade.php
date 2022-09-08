<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('admin/dashboard')}}">
    <img src="{{ asset('public/assets/img/ekyc-logo.png') }}" alt="Logo" class="admin-logo">
    <!-- <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-user"></i>
    </div> -->
    <div class="sidebar-brand-text mx-3">EKYC</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
@can('admin_access')
<li class="nav-item {{ request()->is('admin/dashboard')  ? 'active' : '' }}">
    <a class="nav-link" href="{{url('admin/dashboard')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>
@endcan
@can('client_access')
<li class="nav-item {{ request()->is('admin/profile/*')  ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.profile', ['user' => auth()->user()->id]) }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Profile</span></a>
</li>
    @if(auth()->user()->status == 'APPROVED')
        <li class="nav-item {{ request()->is('admin/products') || request()->is('admin/products/*')  ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.products.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Products</span></a>
        </li>
    @endif

@endcan
<!-- Divider -->
<!-- <hr class="sidebar-divider"> -->

<!-- Divider -->
<!-- <hr class="sidebar-divider"> -->
@can('admin_access')

    <!-- Nav Item - Charts -->
    <li class="nav-item {{ request()->is('admin/users')  ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.users') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Users</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ request()->is('admin/clients')|| request()->is('admin/client/*')  ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.clients') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Clients</span></a>
    </li>
    <li class="nav-item {{ request()->is('admin/reports')|| request()->is('admin/reports/*')  ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.reports') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Reports</span></a>
    </li>
@endcan

<!-- Nav Item - Utilities Collapse Menu -->
<!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="false" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Settings</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
        </div>
    </div>
</li> -->
<!-- Divider -->
<!-- <hr class="sidebar-divider d-none d-md-block"> -->

<!-- Sidebar Toggler (Sidebar) -->
<button class="rounded-circle border-0" id="sidebarToggle"></button>


</ul>
<!-- End of Sidebar -->