@extends('admin.layouts.app')
@section('content')
    <div class="container" data-aos="fade-up">
        <div class="d-flex justify-content-between bg-light rounded align-items-center p-3 mb-3">
            <h5><span class="d-none d-lg-inline-block">Total - </span><span
                    class="badge badge-light">{{ $courses->count() }}</span></h5>
            <h3 class="h3 text-center">Courses</h3>
            <h5><a href="{{ route('admin.createCoursePage') }}"
                    class="btn btn-light {{ $courses->count() == 0 ? 'bounce' : '' }}">+Create New Course</a></h5>
        </div>
        @if ($courses->count() != 0)
            <div class="d-flex justify-content-between">
                <div>
                    @if (request('searchKey'))
                        Result for - {{ request('searchKey') }}
                    @endif
                </div>
                <div class="d-flex justify-content-between">
                    <div class="form-line mx-2">
                        <form action="" method="get" id="statusForm">
                            <select class="form-control " name="status" id="statusBox">
                                <option value="">Select</option>
                                <option value="latest" @if (request('status') == 'latest') selected @endif>Latest</option>
                                <option value="earliest"@if (request('status') == 'earliest') selected @endif>Earliest</option>
                                <option value="trending"@if (request('status') == 'trending') selected @endif>Trending</option>
                            </select>
                        </form>
                    </div>
                    <form class="d-flex" role="search" method="get">
                        <input class="form-control me-2 my-input" name="searchKey" type="search" placeholder="Search"
                            aria-label="Search">
                        <button class="btn btn-outline-success my-btn" type="submit">Search</button>
                    </form>
                </div>

            </div>
            @foreach ($courses as $c)
                @php
                    // Create an array of classes based on your conditions
                    $colors = ['blue', 'yellow', 'green', 'red'];
                    $colorIndex = $loop->index % count($colors);
                    $colorClass = $colors[$colorIndex];
                @endphp
                <section class="">
                    <div class="container py-4">
                        <article class="postcard dark {{ $colorClass }}">
                            <a class="postcard__img_link" href="#">
                                <img class="postcard__img" src="{{ asset('storage/' . $c->image) }}" alt="Image Title" />
                            </a>
                            <div class="postcard__text">
                                <h1 class="postcard__title blue"><a
                                        href="{{ route('admin.lessons', $c->id) }}">{{ $c->name }} ({{$c->lessons_count}} lessons)</a></h1>
                                <div class="postcard__subtitle small">
                                    <time datetime="2020-05-25 12:00:00">
                                        <i class="fas fa-calendar-alt mr-2"></i>{{ $c->created_at->format('j-F-Y') }}
                                    </time>
                                </div>
                                <div class="postcard__bar"></div>
                                <div class="postcard__preview-txt">{{ $c->description }}</div>
                                <ul class="postcard__tagbox">
                                    <li class="tag__item text-uppercase"><i class="fas fa-tag mr-2"></i>{{ $c->category->name }}</li>

                                    <li class="tag__item"><i class="fas fa-person mr-2"></i>{{ $c->buyer_count }}</li>
                                    <li class="tag__item"><i class="fas fa-eye mr-2"></i>{{ $c->view_count }}</li>


                                    <li class="tag__item play yellow ml-4">
                                        <a href="{{ route('admin.courseEdit', $c->id) }}"><i
                                                class="fas fa-pen mx-2"></i></a>
                                    </li>
                                    <li class="tag__item play red">
                                        <a href="{{route('admin.courseDelete',$c->id)}}"><i class="fas fa-trash mx-2"></i></a>
                                    </li>
                                    <li class="tag__item play green">
                                        <a href="{{ route('admin.createLessonPage', $c->id) }}"><i
                                                class="fas fa-plus mx-2"></i>Add Lessons</a>
                                    </li>
                                </ul>
                            </div>
                        </article>
                    </div>

                </section>
            @endforeach
            <div class="mt-2 px-2">
                {{ $courses->links() }}
            </div>
        @else
            <div class="container-fluid">
                <h4 class="text-warning text-center">No Courses yet!</h4>
            </div>
        @endif
    </div>
@endsection
@section('myScript')
    <script>
        $(document).ready(function() {
            const statusBox = $('#statusBox');
            statusBox.change(function() {
                $('#statusForm').submit()
            })
        })
    </script>
@endsection
