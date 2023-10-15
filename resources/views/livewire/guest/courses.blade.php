<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">
            <h2>Courses</h2>
            <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit
                quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
        </div>
    </div><!-- End Breadcrumbs -->
    @if ($categories->count() != 0)
        <!-- ======= Features Section ======= -->
        <section id="features" class="features">
            <div class="container">
                <div class="row mt-2">
                    @foreach ($categories as $category)
                        <div class="col-lg-3 col-md-2 col-sm-4 mt-2">
                            <button wire:click="sortByCategory({{ $category->id }})"
                                class="btn {{ $category->id == $categoryId ? 'btn-success' : 'btn-outline-success' }} btn-block w-100">{{ $category->name }} ({{ $category->courses_count }})</button>
                        </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Features Section -->
    @endif
    <div class="col-lg-8 offset-2">
        <div class="">
            <ul>
                <li class="nav-item nav-search d-none d-lg-block">
                    <div class="input-group">
                        <div class="btn btn-success btn-sm" id="navbar-search-icon">
                            <span class="input-group-text" wire:click="search">
                                <i class="fa-solid  fa-search-plus"></i>
                            </span>
                        </div>
                        <input type="text" wire:model.live.debounce.300ms="search" class="form-control" aria-expanded="false"
                            id="navbar-search-input" placeholder="Search" aria-label="search" aria-describedby="search" />
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- ======= Courses Section ======= -->
    <section id="courses" class="courses">
        <div class="container">
            @if ($courses->count() != 0)
                <div class="row">
                    @foreach ($courses as $course)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch my-2">
                            <div class="course-item">
                                @if ($course->image)
                                    <img src="{{ asset('storage/' . $course->image) }}"
                                        style="height: 300px;width:100%;object-fit:cover" class="img-fluid"
                                        alt="...">
                                @else
                                    <img src="{{ asset('images/satellite-image-of-globe.jpg') }}"
                                        style="height: 300px;width:100%;object-fit:cover" class="img-fluid"
                                        alt="...">
                                @endif
                                <div class="course-content">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-uppercase">{{ $course->category->name }}</h4>
                                        <p class="price">{{ $course->price }} Kyats</p>
                                    </div>

                                    <h3><a
                                            href="{{ route('guest.courseDetails', $course->id) }}">{{ $course->name }}</a>
                                    </h3>
                                    <p>{{ Str::limit($course->description, 100, '...') }} <a
                                            href="{{ route('guest.courseDetails', $course->id) }}"
                                            class="text-success">see
                                            more</a> </p>
                                    <div class="trainer d-flex justify-content-between align-items-center">
                                        <div class="trainer-profile d-flex align-items-center">
                                            <span>{{ $course->instructor }}</span>
                                        </div>
                                        <div class="trainer-rank d-flex align-items-center">
                                            <i class="fa-solid fa-eye"></i>&nbsp;{{ $course->view_count }}
                                            &nbsp;&nbsp;
                                            @if ($course->lessons_count != 0)
                                            <i class="fa-solid fa-photo-film"></i>&nbsp;{{ $course->lessons_count }}
                                            @else
                                            <span class="text-warning">Coming Soon</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- End Course Item-->
                </div>
            @else
                <h3 class="text-danger">No Posts Found!</h3>
            @endif

        </div>
        {{ $courses->links() }}
    </section><!-- End Courses Section -->

</main><!-- End #main -->
