@extends('user.layouts.app')
@section('content')
    <style>
        .my-bg {
            backdrop-filter: blur(5px) !important;
            background-size: cover !important;
            background-position: center !important;
            height: 150px !important;
        }
        .blur-background{
            background-size: cover; /* Ensure the background image covers the element */
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 0%, rgba(0, 0, 0, 0.5) 100%);
            height: 100%;
            width: 100%;
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
                                        <div class="card-body my-bg "
                                            style=" background: url('{{ asset('storage/' . $course->image) }}');">
                                            <div class="d-flex justify-content-between p-2 blur-background">
                                                <div class="text-white">
                                                    <h3 class="font-weight-bold mb-0">{{ $course->name }}</h3>
                                                    <h6>{{ $course->lessons_count }} lessons</h6>
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
