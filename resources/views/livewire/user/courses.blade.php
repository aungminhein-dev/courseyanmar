<div>
    <div class="container-lg">
        <!-- chart row starts here -->
        <div class="mt-3">
            <div class="row">
                <div class="col-md-3">
                    <button class="btn btn-block btn-success" wire:click="sortData(0)">All</button>
                </div>
                @foreach ($categories as $category)
                    <div class="col-md-3 mt-2">
                        <button class="btn btn-block {{ $categoryId == $category->id ? 'btn-light' : 'btn-dark' }}"
                            wire:click="sortData({{ $category->id }})">{{ $category->name }}
                            ({{ $category->courses_count }})
                        </button>
                    </div>
                @endforeach
            </div>
        </div>

        @if (count($courses) != 0)
            <div class="row mt-3">
                @foreach ($courses as $course)
                    <div class="col-xl-4 mt-2">
                        <div class="item card">
                            <div class="card-body p-0 user-course-img-container">
                                @if ($course->image)
                                    <img class="img-fluid user-course-img"
                                        src="{{ asset('storage/' . $course->image) }}" alt="" />
                                @else
                                    <img src="{{ asset('images/satellite-image-of-globe.jpg') }}" wire:loading.d-block
                                        alt="" class="img-fluid user-course-img">
                                @endif
                            </div>
                            <div class="card-body px-3 text-dark">
                                <div class="d-flex justify-content-between">
                                    <p class="text-muted  font-13 mb-0 text-uppercase">{{ $course->category->name }}</p>
                                    @php
                                        $enrolledCourse = $enrolledCourses->where('id', $course->id)->first();
                                    @endphp

                                    @if ($enrolledCourse)
                                        @if ($enrolledCourse->pivot->status == 1)
                                            <a href="{{ route('user.play', $course->id) }}"
                                                class="text-success">Watch</a>
                                        @elseif($enrolledCourse->pivot->status == 0)
                                            <span class="text-warning">Pending</span>
                                        @else
                                            <a class="text-danger">Denied!</a>
                                        @endif
                                    @else
                                        <a href="{{ route('user.buyPage', $course->id) }}"
                                            class="text-primary">Purchase</a>
                                    @endif
                                </div>
                                <a class="font-weight-semibold"
                                    href="{{ route('user.courseDetails', $course->id) }}">{{ $course->name }}</a>
                                <div class="d-flex justify-content-between font-weight-semibold">
                                    <p class="mb-0">
                                        @if ($course->lessons_count == 0)
                                            <span class="text-warning">Coming Soon</span>
                                        @else
                                        <i class="fa-solid fa-photo-film text-muted"></i> {{ $course->lessons_count }}
                                        @endif
                                    </p>
                                    <p class="mb-0">{{ $course->price }} Kyats</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="d-flex align-items-center justify-content-center" style="height: 70vh">
                <h2 class="text-danger text-center">No posts found!</h2>
            </div>
        @endif
    </div>
    {{ $courses->links() }}
</div>
