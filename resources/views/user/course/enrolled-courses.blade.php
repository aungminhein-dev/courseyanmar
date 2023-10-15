@extends('user.layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between my-2">
            <h3 class="h3 text-muted text-center">Enrolled Courses <span
                    class="badge badge-primary">{{ $filteredCourses->count() }}</span></h3>
            <div>
            </div>
            <div class="d-flex justify-content-between">
                <div class="form-line mx-2">
                    <form action="{{ route('user.enrolledCourses') }}" id="orderStatusForm">
                        <select class="form-control " name="status" id="orderStatusBox">
                            <option value="">Select</option>
                            <option value="1">Accepted</option>
                            <option value="0">Pending</option>
                        </select>
                    </form>
                </div>
                <form class="d-md-flex d-none" role="search" method="get">
                    <input class="form-control me-2 my-input" name="search" type="search" placeholder="Search"
                        aria-label="Search">
                    <button class="btn btn-outline-success my-btn" type="submit">Search</button>
                </form>
            </div>

        </div>
        <div>
            @if ($filteredCourses->count() != 0)
                @foreach ($filteredCourses as $c)
                    @php
                        $colors = ['blue', 'yellow', 'green', 'red'];
                        $colorIndex = $loop->index % count($colors);
                        $colorClass = $colors[$colorIndex];
                    @endphp
                    <section class="">
                        <div class="container py-4" id="course-container">
                            <article class="postcard light {{ $colorClass }}">
                                <a class="postcard__img_link" href="#">
                                    <img class="postcard__img" src="{{ asset('storage/' . $c->image) }}"
                                        alt="Image Title" />
                                    {{-- <img class="postcard__img" src="{{ asset('images/satellite-image-of-globe.jpg') }}"
                                        alt="Image Title" /> --}}
                                </a>
                                <div class="postcard__text t-dark">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h1 class="postcard__title blue">
                                            <a href="{{ route('user.courseDetails', $c->id) }}">{{ $c->name }}</a>
                                        </h1>
                                        @switch($c->pivot->status)
                                            @case(1)
                                                <h5 class="text-success postcard__status">
                                                    Accepted <i class="fa-solid fa-check"></i>
                                                </h5>
                                            @break

                                            @case(2)
                                                <a href="{{ route('user.denyReason',$c->pivot->id) }}" class="text-danger postcard__status">
                                                    Denied!
                                                </a>
                                            @break

                                            @default
                                                <h5 class="text-warning postcard__status">
                                                    Pending <i class="fa-solid fa-spinner spin"></i>
                                                </h5>
                                        @endswitch
                                    </div>

                                    <div class="postcard__subtitle small">
                                        <time datetime="2020-05-25 12:00:00">
                                            <i class="fas fa-calendar-alt mr-2"></i>{{ $c->created_at->format('j-F-Y') }}
                                        </time>
                                    </div>
                                    <div class="postcard__bar"></div>
                                    <div class="postcard__preview-txt">{{ $c->description }}</div>
                                    <ul class="postcard__tagbox">
                                        <li class="tag__item"><i class="fas fa-tag mr-2"></i>{{ $c->category->name }}</li>

                                        <li class="tag__item">{{ $c->price }} Kyats</li>
                                        @if ($c->pivot->status == 1)
                                            <li class="tag__item play {{ $colorClass }}"><a
                                                    href="{{ route('user.play', $c->id) }}"><i class="fas fa-play "></i>
                                                    Play</a></li>
                                        @endif

                                    </ul>
                                </div>
                            </article>
                        </div>

                    </section>
                @endforeach
            @else
                <div class="container-fluid">
                    @if ($searchQuery)
                        <div class="alert alert-success">Result for - {{ $searchQuery }}</div>
                    @endif
                    <h4 class="text-danger text-center mt-5">No Courses yet!</h4>
                </div>
            @endif
        </div>
    </div>
@endsection
@section('myScript')
    <script>
        $(document).ready(function() {
            const statusBox = $('#orderStatusBox');
            statusBox.change(function(e) {
                $('#orderStatusForm').submit()
            })
        })
    </script>
@endsection
