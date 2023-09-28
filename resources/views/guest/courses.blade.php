@extends('guest.layouts.app')
@section('title', 'Courses')
@section('content')
    <main id="main" data-aos="fade-in">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <h2>Courses</h2>
                <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit
                    quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Courses Section ======= -->
        <section id="courses" class="courses">
            <div class="container" data-aos="fade-up">

                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    @foreach ($courses as $course)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="course-item">
                                @if ($course->image)
                                    <img src="{{ asset('storage/' . $course->image) }}"
                                        style="height: 300px;width:100%;object-fit:cover" class="img-fluid" alt="...">
                                @else
                                    <img src="{{ asset('images/satellite-image-of-globe.jpg') }}"
                                        style="height: 300px;width:100%;object-fit:cover" class="img-fluid" alt="...">
                                @endif
                                <div class="course-content">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4>{{ $course->category->name }}</h4>
                                        <p class="price">{{ $course->price }} Kyats</p>
                                    </div>

                                    <h3><a href="course-details.html">{{ $course->name }}</a></h3>
                                    <p>{{ Str::limit($course->description, 100, '...') }} <a
                                            href="{{ route('guest.courseDetails', $course->id) }}" class="text-success">see
                                            more</a> </p>
                                    <div class="trainer d-flex justify-content-between align-items-center">
                                        <div class="trainer-profile d-flex align-items-center">
                                            <span>{{ $course->instructor }}</span>
                                        </div>
                                        <div class="trainer-rank d-flex align-items-center">
                                            <i class="bx bx-user"></i>&nbsp;50
                                            &nbsp;&nbsp;
                                            <i class="bx bx-heart"></i>&nbsp;65
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- End Course Item-->
                </div>

            </div>
        </section><!-- End Courses Section -->

    </main><!-- End #main -->

@endsection
