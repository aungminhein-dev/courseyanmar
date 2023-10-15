@extends('admin.layouts.app')
@section('content')
    <div class="container rounded bg-light mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                        width="150px" src="{{ asset('storage/' . $course->image) }}"><span
                        class="font-weight-bold">{{ $course->name }}</span><span class="text-black-50"></span>
                    <div class="mt-5 text-center">
                        <a href="{{ route('admin.courses') }}" class="btn btn-primary profile-button" type="submit">
                            <i class="fa-solid fa-arrow-left"></i>
                            Back to Courses
                        </a>
                        <a href="{{ route('admin.lessons', $course->id) }}" class="btn btn-primary profile-button mt-2"
                            type="submit">
                            <i class="fa-solid fa-arrow-right"></i>
                            View this course
                        </a>
                    </div>
                    <video src="" class="mt-2 rounded" id="lessonVideo" style="width: 100%">

                    </video>
                </div>
            </div>
            <div class="col-md-9 ">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Add lessons to <span class="text-primary">{{ $course->name }}</span>.</h4>
                    </div>
                    @if ($errors->any())
                        <div class="alert bg-light form-group py-2">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.createLesson') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="courseId" value="{{ $course->id }}">
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Title</label><input type="text"
                                    class="form-control" name="title" placeholder="Title">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">What's on your mind?</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6"><label class="labels">Media</label><input type="file"
                                    class="form-control" name="media" id="mediaInput" placeholder="Attach file"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="position-relative has-icon-right">

                                        <label for="">Audience Type</label>
                                        <div class="form-line">
                                            <select class="form-control" name="audienceType">
                                                <option value="all_users">All Users</option>
                                                <option value="members">Only Members</option>
                                            </select>
                                        </div>

                                        <div class="form-control-position">
                                            <i class="zmdi zmdi-male-female"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit"><i
                                    class="fa-solid fa-check"></i> Create</button></div>
                    </form>
                </div>

            </div>

        </div>
    </div>
@endsection
@section('myScript')
    <script>
        const video = $('#lessonVideo');
        const mediaInput = $('#mediaInput');

        mediaInput.change(function(event) {
            const selectedFile = event.target.files[0];

            // Check if a file was selected
            if (selectedFile) {
                // Update the video source to the selected file
                video.attr('src', URL.createObjectURL(selectedFile));
            } else {
                // Clear the video source if no file is selected
                video.attr('src', '');
            }
        });
    </script>
@endsection
