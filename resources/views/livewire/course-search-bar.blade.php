<div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <h2 class="text-primary">Courseyanmar</h2>
    <ul class="navbar-nav mr-lg-2">
        <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group position-relative">
                <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                    <span class="input-group-text" id="search" wire:click="search">
                        <i class="mdi mdi-magnify"></i>
                    </span>
                </div>
                <input type="text" wire:model.live.debounce.300ms="search" class="form-control" aria-expanded="false"
                    wire:model.live.debounce.500ms="search" id="navbar-search-input" placeholder="Search"
                    aria-label="search" aria-describedby="search" />
                <div class="col-md-12" style="position: relative; z-index:9999">
                    <div class="list-group w-100">
                        @if (sizeof($courses) > 0)
                            @foreach ($courses as $course)
                                <a href="{{route('user.courseDetails',$course->id)}}" class="list-item list-group-item-action border-1 bg-white p-3">{{$course->name}}</a>
                            @endforeach
                        @endif

                    </div>
                </div>


            </div>
        </li>
    </ul>
    <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item nav-profile dropdown">
            <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                    <img src="{{ asset('user/assets/images/faces/face1.jpg') }}" alt="image" />
                </div>
                <div class="nav-profile-text">
                    <p class="text-black font-weight-semibold m-0">{{ Auth::user()->name }}</p>
                    <span class="font-13 online-color">online <i class="mdi mdi-chevron-down"></i></span>
                </div>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="#">
                    <i class="mdi mdi-cached mr-2 text-success"></i> Activity Log </a>
                <a class="dropdown-item" href="{{ route('user.profile') }}">
                    <i class="fa-solid fa-user-circle"></i> Profile
                </a>
                <div class="dropdown-divider"></div>
                <span class="dropdown-item" href="#">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            <i class="mdi mdi-logout mr-2"></i> Log Out
                        </button>
                    </form>
                </span>
            </div>
        </li>
    </ul>
</div>
