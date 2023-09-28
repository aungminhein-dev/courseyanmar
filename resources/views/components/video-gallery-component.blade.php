<!-- resources/views/components/video-gallery-component.blade.php -->
<div>
    <div class="video-container">
        <div class="main-video">
            <div class="video">
                <video src="{{ asset('storage/lessons/' . $firstData->media) }}" controls></video>
                <h3 class="text-success">
                    {{ $course->name }} <span class="badge badge-primary">{{ $lessons->count() }}</span>
                </h3>
                <h5 class="text-primary">
                    <a href="{{ route('admin.courseEdit', $course->id) }}" class="main-title">{{ $firstData->title }}</a>
                </h5>
                <span class="text-muted lesson-description">
                    {{ $firstData->description }}
                </span>
            </div>
        </div>
        <div class="video-list mt-2" style="background-color:rgba(127, 123, 123, 0.127)">
            @foreach ($lessons as $lesson)
                @if ($enrolledCourses->contains('id',$lesson->course_id))
                <div class="vid bg-light">
                    <video src="{{ asset('storage/lessons/' . $lesson->media) }}"></video>
                    <h3 class="lesson-title text-muted">
                        {{ $lesson->title }} <span class="duration badge badge-success"></span>
                    </h3>
                    <input type="hidden" name="" value="{{ $lesson->description }}" class="desc-hidden">
                    <span class="text-primary">bought</span>
                </div>
                @else
                    <div class="vid bg-light">
                    <video src="{{ asset('storage/lessons/' . $lesson->media) }}"></video>
                    <h3 class="lesson-title text-muted">
                        {{ $lesson->title }} <span class="duration badge badge-success"></span>
                    </h3>
                    <input type="hidden" name="" value="{{ $lesson->description }}" class="desc-hidden">
                    <span class="text-primary">not bought</span>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
<script>
let listedVideo = document.querySelectorAll('.video-list .vid');
let mainVideo = document.querySelector('.main-video .video video');
let title = document.querySelector('.video .main-title');
let description = document.querySelector('.lesson-description');
let durations = document.querySelectorAll('.duration');


listedVideo.forEach(video => {
    video.addEventListener('click', function () {
        listedVideo.forEach(vid => {
            vid.classList.remove('active');

        });
        video.classList.add('active');
        if (video.classList.contains('active')) {
            let src = video.children[0].getAttribute('src');
            mainVideo.setAttribute('src', src);
            mainVideo.autoplay = true;
            title.innerHTML = video.children[1].innerHTML;
            description.innerHTML = video.children[2].value;
        }
    })

    let childVideo = video.children[0];
    childVideo.addEventListener('loadedmetadata', function () {
        let durationInSeconds = childVideo.duration;
        video.children[1].children[0].innerHTML = formatDuration(durationInSeconds);
    });

});

function formatDuration(input) {
    input = parseInt(input);
    const hours = Math.floor(input / 3600);
    const minutes = Math.floor((input % 3600) / 60);
    const seconds = Math.floor(input % 60);
    if (!hours) {
        return minutes + 'm ' + seconds + 's';
    } else {
        return hours + 'H ' + minutes + 'm ' + seconds + 's';
    }
}

</script>
