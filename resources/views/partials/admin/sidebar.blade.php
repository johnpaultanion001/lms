<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('admin/dashboard')}}">
   
    <div class="sidebar-brand-text mx-3">{{ trans('panel.site_title') }}</div>
</a>

<hr class="sidebar-divider my-0">

<li class="nav-item {{ request()->is('admin/dashboard')  ? 'active' : '' }}">
    <a class="nav-link" href="{{url('admin/dashboard')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>
<li class="nav-item {{ request()->is('admin/categories') || request()->is('admin/categories/*')  ? 'active' : '' }}">
    <a class="nav-link" href="{{url('admin/categories')}}">
        <i class="fas fa-fw fa-list"></i>
        <span>Categories</span></a>
</li>
<li class="nav-item {{ request()->is('admin/questions') || request()->is('admin/questions/*') ? 'active' : '' }}">
    <a class="nav-link" href="{{url('admin/questions')}}">
        <i class="fas fa-fw fa-question"></i>
        <span>Questions</span></a>
</li>

<li class="nav-item {{ request()->is('admin/respondents')  ? 'active' : '' }}">
    <a class="nav-link" href="{{url('admin/respondents')}}">
        <i class="fas fa-fw fa-trophy"></i>
        <span>Respondents</span></a>
</li>
   
<button class="rounded-circle border-0" id="sidebarToggle"></button>


</ul>