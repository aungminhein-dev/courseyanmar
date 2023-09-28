<div>
    <div class="owl-carousel category-carousel owl-theme my-2">
        @foreach ($courses as $course)
            <div class="item card">
                <div class="card-body p-0 user-course-img-container">
                    <img class="img-fluid user-course-img" src="{{ asset('storage/' . $course->image) }}" alt="" />
                </div>
                <div class="card-body px-3 text-dark">
                    <div class="d-flex justify-content-between">
                        <p class="text-muted font-13 mb-0">{{ $course->category->name }}</p>

                        @php
                            $enrolledCourse = $enrolledCourses->where('id', $course->id)->first();
                        @endphp

                        @if ($enrolledCourse)
                            @if ($enrolledCourse->pivot->status == 1)
                                <a href="{{ route('user.play', $course->id) }}" class="text-success">Watch</a>
                            @else
                                <span class="text-warning">Pending</span>
                            @endif
                        @else
                            <a href="{{ route('user.buyPage', $course->id) }}" class="text-primary">Purchase</a>
                        @endif
                    </div>
                    <a class="font-weight-semibold" href="{{ route('user.courseDetails', $course->id) }}">{{ $course->name }}</a>
                    <div class="d-flex justify-content-between font-weight-semibold">
                        <p class="mb-0">
                            <i class="fa-solid fa-video text-muted"></i> {{ $course->lessons_count }} Lessons
                        </p>
                        <p class="mb-0">{{ $course->price }} Kyats</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
