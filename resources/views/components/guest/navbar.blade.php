<div>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="{{ route('guest.index') }}">Courseyanmar</a></h1>
            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="{{ Request::is('/') ? 'active' : '' }}" href="/">Home</a></li>
                    <li><a class="{{ Request::is('about') ? 'active' : '' }}"
                            href="{{ route('guest.about') }}">About</a></li>
                    <li><a class="{{ Request::is('courses') ? 'active' : '' }}"
                            href="{{ route('guest.courses') }}">Courses</a></li>

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <a href="{{ route('guest.login') }}" class="get-started-btn">Log In</a>
            <a href="{{ route('guest.register') }}" class="get-started-btn">Register</a>


        </div>
    </header><!-- End Header -->

</div>
