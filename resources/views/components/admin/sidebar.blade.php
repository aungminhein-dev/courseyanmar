<div>
    <!--Start sidebar-wrapper-->
    <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
        <div class="brand-logo">
            <a href="index.html">
                {{-- <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon"> --}}
                <h5 class="logo-text">Courseyanmar Admin</h5>
            </a>
        </div>
        <ul class="sidebar-menu do-nicescrol">
            <li class="sidebar-header">MAIN NAVIGATION</li>
            <li class="{{ Request::is('admin_/dashboard') ? 'active' : '' }}'">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="{{ Request::is('admin_/category') ? 'active' : '' }}">
                <a href="{{ route('admin.category') }}">
                    <i class="zmdi zmdi-format-list-bulleted"></i> <span>Category</span>
                </a>
            </li>

            <li class="{{ Request::is('admin_/course') ? 'active' : '' }}">
                <a href="{{ route('admin.courses') }}">
                    <i class="fa-sharp fa-solid fa-person-chalkboard"></i><span>Courses</span>
                </a>
            </li>

            <li class="{{ Request::is('admin_/order') ? 'active' : '' }}">
                <a href=" {{ route('admin.orders') }}">
                    <i class="fa-sharp fa-solid fa-comment"></i><span>Order</span>
                    @livewire('admin.order-count-badge')
                </a>
            </li>

            <li class="sidebar-header">User Management</li>
            <li class="{{ Request::is('admin_/list') ? 'active' : '' }}">
                <a href="{{ route('admin.list') }}">
                    <i class="fa-solid fa-users"></i>
                    Admins
                </a>
            </li>

            <li class="{{ Request::is('admin_/user-list') ? 'active' : '' }}">
                <a href="{{ route('admin.user-list') }}">
                    <i class="fa-solid fa-users"></i>
                    Users
                </a>
            </li>

            <li class="sidebar-header">SETTINGS <i class="fa-solid fa-gear text-success"></i></li>
            <li class="{{ Request::is('admin_/account/profile') ? 'active' : '' }}">
                <a href="{{ route('admin.profile', Auth::user()->id) }}">
                    <i class="fa-solid fa-user-circle"></i> <span>Profile</span>
                </a>
            </li>

            <li class="{{ Request::is('admin_/account/change/password') ? 'active' : '' }}"><a
                    href="{{ route('admin.changePasswordPage') }}"><i class="fa-solid fa-lock"></i>
                    <span>Change Password</span></a>
            </li>

            <li class="{{ Request::is('admin_/account/themes') ? 'active' : '' }}">
                <a href="{{ route('admin.themes') }}">
                    <i class="fa-solid fa-mountain-sun"></i> <span>Themes</span>
                </a>
            </li>
        </ul>

    </div>
    <!--End sidebar-wrapper-->
</div>
