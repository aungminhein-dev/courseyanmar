@extends('guest.layouts.app')
@section('title', 'Home')
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex justify-content-center align-items-center">
        <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
            <h1>Learning Today,<br>Leading Tomorrow</h1>
            <h2>We are team of talented teachers with great technology!</h2>
            <a href="{{ route('guest.login') }}" class="btn-get-started">Sign In</a>
        </div>
    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                        <img src="{{ asset('guest/assets/img/about.jpg') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                        <h3>This website meant to be for the people with office,school,household or other stuffs and want to
                            upgrade their skills without giving too
                            much times with long lessons.
                        </h3>
                        <p class="fst-italic">
                            The lessons are very straight forward and short to the point and also give a good coverage of
                            sholuds.
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i>Easy to pay for myanmar users. We accept KBZ Pay,Wave
                                Money etc.</li>
                            <li><i class="bi bi-check-circle"></i>Very good and talented instructors that would help your
                                learning process faster.</li>
                            <li><i class="bi bi-check-circle"></i>High quality videos.</li>
                        </ul>
                        <p>
                            You can report if something makes you feel uncomfortable.
                        </p>

                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts section-bg">
            <div class="container">

                <div class="row counters">

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $studentCount }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Active Students</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $courseCount }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Effective Courses</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $lessonCount }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>High Quality Lessons</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $categoryCount }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Various Categories</p>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->

        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="content">
                            <h3>Why Choose Mentor?</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                                Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus
                                optio ad corporis.
                            </p>
                            <div class="text-center">
                                <a href="about.html" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-boxes d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-receipt"></i>
                                        <h4>Corporis voluptates sit</h4>
                                        <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut
                                            aliquip</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-cube-alt"></i>
                                        <h4>Ullamco laboris ladore pan</h4>
                                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                            deserunt</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-images"></i>
                                        <h4>Labore consequatur</h4>
                                        <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End .content-->
                    </div>
                </div>

            </div>
        </section><!-- End Why Us Section -->

        @if ($categories->count() != 0)
            <!-- ======= Features Section ======= -->
            <section id="features" class="features">
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <h2>Categories</h2>
                        <p>Available</p>
                    </div>
                    <div class="row" data-aos="zoom-in" data-aos-delay="100">
                        @foreach ($categories as $category)
                            <div class="col-lg-3 col-md-4 mt-2">
                                <div class="icon-box">
                                    <h3><span>{{ $category->name }}</span></h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section><!-- End Features Section -->
        @endif

        <!-- ======= Popular Courses Section ======= -->
        <section id="popular-courses" class="courses">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Courses</h2>
                    <p>Popular Courses</p>
                </div>

                <div class="row" data-aos="zoom-in" data-aos-delay="100">

                    @foreach ($popularCourses as $course)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="course-item">
                                @if ($course->image)
                                    <img src="{{ asset('storage/' . $course->image) }}"
                                        style="height: 300px;width:100%;object-fit:cover" class="img-fluid" alt="...">
                                @else
                                    <img src="{{ asset('images/satellite-image-of-globe.jpg') }}"
                                        style="height: 300px;width:100%;object-fit:cover" class="img-fluid"
                                        alt="...">
                                @endif
                                <div class="course-content">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4>{{ $course->category->name }}</h4>
                                        <p class="price">{{ $course->price }} Kyat</p>
                                    </div>

                                    <h3><a href="{{ route('guest.courseDetails',$course->id) }}">{{ $course->name }}</a></h3>
                                    <p>{{ Str::limit($course->description, 100, '...') }}<a
                                            href="{{ route('guest.courseDetails', $course->id) }}"> see more</a></p>
                                    <div class="trainer d-flex justify-content-between align-items-center">
                                        <div class="trainer-profile d-flex align-items-center">
                                            <span>{{ $course->instructor }}</span>
                                        </div>
                                        <div class="trainer-rank d-flex align-items-center">
                                            <i class="fa-solid fa-eye text-muted"></i>&nbsp;{{ $course->view_count }}
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
                        </div> <!-- End Course Item-->
                    @endforeach
                </div>

            </div>
        </section><!-- End Popular Courses Section -->

        <!-- ======= Trainers Section ======= -->
        <section id="trainers" class="trainers">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Our Team</h2>
                    <p>Members</p>
                </div>

                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <img src="{{ asset('guest/assets/img/trainers/trainer-1.jpg') }}" class="img-fluid"
                                alt="">
                            <div class="member-content">
                                <h4>Walter White</h4>
                                <span>Web Development</span>
                                <p>
                                    Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis
                                    quaerat qui aut aut aut
                                </p>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <img src="{{ asset('guest/assets/img/trainers/trainer-2.jpg') }}" class="img-fluid"
                                alt="">
                            <div class="member-content">
                                <h4>Sarah Jhinson</h4>
                                <span>Marketing</span>
                                <p>
                                    Repellat fugiat adipisci nemo illum nesciunt voluptas repellendus. In architecto rerum
                                    rerum temporibus
                                </p>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <img src="{{ asset('guest/assets/img/trainers/trainer-3.jpg') }}" class="img-fluid"
                                alt="">
                            <div class="member-content">
                                <h4>William Anderson</h4>
                                <span>Content</span>
                                <p>
                                    Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum
                                    toro des clara
                                </p>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Trainers Section -->

    </main><!-- End #main -->
@endsection
