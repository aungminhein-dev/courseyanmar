    <div class="horizontal-menu">
        <nav class="navbar top-navbar col-lg-12 col-12 p-0">
            <div class="container">
                @livewire('course-search-bar')
            </div>
        </nav>
        <nav class="bottom-navbar">
            <div class="container">
                <ul class="nav page-navigation">
                    <li class="nav-item {{ Request::is('user_/home') ? 'active' : '' }}">
                        <a class="nav-link " href="{{ route('user.home') }}">
                            <i class="mdi mdi-home menu-icon"></i>
                            <span class="menu-title"> Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('user_/courses/enrolled') ? 'active' : '' }}" href="{{ route('user.enrolledCourses') }}">
                            <i class="mdi mdi-clipboard-text menu-icon"></i>
                            <span class="menu-title">Enrolled Courses</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('user_/courses/'.'*') ? 'active' : '' }}" href="{{ route('user.courses') }}">
                            <i class="mdi mdi-clipboard-text menu-icon"></i>
                            <span class="menu-title">Courses</span>
                        </a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link {{ Request::is('user_/profile') ? 'active' : ''}}" href="{{ route('user.profile') }}">
                            <i class="mdi mdi-account menu-icon "></i>
                            <span class="menu-title">Profile</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light  bg-warning w-100 m-0 p-0 ">
            <h6 class="text-white w-100 text-center">
                Welcome to Courseyanmar
            </h6>
        </nav>
    </div>
