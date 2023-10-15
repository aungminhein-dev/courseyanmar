@extends('user.layouts.app')
@section('content')
    <style>
        .background-filter::after {
            -webkit-backdrop-filter: blur(5px);
            backdrop-filter: brightness(0.7) blur(2px);
            filter: brightness(0.7) blur(2px);
            content: "";
            display: block;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }

        .background-filter {
            position: relative;
        }

        .background {
            background-position: center;
            background-size: cover;
        }
        .u-non-blurred {
            position: relative;
            z-index: 1;
        }
    </style>
    <!-- partial -->

    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper pb-0">
                <!-- first row starts here -->
                @if (
                    $enrolledCourses->count() != 0 &&
                        $enrolledCourses->contains(function ($course) {
                            return $course->pivot->status == 1;
                        }))
                    <h4 class="text-muted">Your Courses</h4>
                    <hr>
                    <div class="row">
                        @foreach ($enrolledCourses as $course)
                            @if ($course->pivot->status == 1)
                                <div class="col-xl-4 grid-margin">
                                    <div class="card card-stat stretch-card mb-3">
                                        <div class="card-body background background-filter" style="background-image: url({{ asset('storage/' . $course->image) }}) !important;">
                                            <div class="d-flex justify-content-between ">
                                                <div class="text-white u-non-blurred">
                                                    <h3 class="font-weight-bold mb-0">{{ $course->name }}</h3>
                                                    <h6 class="mb-0">
                                                        @if ($course->lessons_count == 0)
                                                            <span class="text-warning">Coming Soon</span>
                                                        @else
                                                            <i class="fa-solid fa-photo-film"></i> {{ $course->lessons_count }}
                                                        @endif
                                                    </h6>
                                                    <a href="{{ route('user.play', $course->id) }}"
                                                        class="text-success">Watch</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @else
                    <h5 class="text-muted">You haven't enrolled any courses yet!</h5>
                @endif

                <!-- image card row starts here -->
                @if ($courses->count() != 0)
                    <h4 class="text-muted mt-5 ">Trending Courses</h4>
                    <hr>
                    <x-course-carousel :courses="$courses" :enrolledCourses="$enrolledCourses" />
                @else
                    <h3 class="text-muted fw-bold">No trending courses!</h3>
                @endif


            </div>
            <!-- content-wrapper ends -->

        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
@endsection
