@extends('user.layouts.app')
@section('content')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title text-primary">Course Enrollment</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Enroll</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Course </li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <div class="card border p-3">
                            <div class="img mb-2">
                                <img src="{{ asset('storage/' . $course->image) }}" alt="" class="img-fluid">
                            </div>
                            <h5 class="text-success"><span class="text-muted">Name : </span>{{ $course->name }}</h5>
                            <h5 class="text-success"><span class="text-muted">Duration : </span>{{ $course->duration }}</h5>
                            <h5 class="text-success"><span class="text-muted">Instructor : </span>{{ $course->instructor }}
                            </h5>
                            <h5 class="text-success"><span class="text-muted">Price : </span>{{ $course->price }}</h5>
                            <h5 class="text-success"> <i class="fa-solid fa-photo-film text-muted"></i>
                                {{ $course->lessons_count }}
                            </h5>
                            <h5 class="text-success"><span class="text-muted">Views : </span>{{ $course->view_count }}</h5>
                            <h5 class="text-danger">KBZ - 09797957976 </h5>
                            <h5 class="text-danger">Wave Money - 09797957976</h5>
                        </div>
                    </div>
                    <div class="col-lg-8 col-12  grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Basic form elements</h4>
                                <p class="card-description">Firstly, cash the amount in KBZ PAY or WAVE MONEY. Then attach a
                                    screenshot. Admin team will provide your course within 24 hours.</p>
                                @if ($enrolledData->enrolledCourses)
                                    @php
                                        $enrollment = $enrolledData->enrolledCourses->where('id', $course->id)->first();
                                    @endphp
                                    @if ($enrollment)
                                        @if ($enrollment->pivot->status == 1)
                                            <div class="alert alert-success fade show" role="alert">
                                                <i class="fa-solid fa-check me-2"></i><strong>Congratulatins! Your
                                                    enrollment has
                                                    been approved! </strong>
                                            </div>
                                        @elseif($enrollment->pivot->status == 0)
                                            <div class="alert alert-warning fade show" role="alert">
                                                <i class="fa-solid fa-spinner spin me-2"></i><strong>You've enrolled this
                                                    course!
                                                    Waiting for admins' approval.</strong>
                                            </div>
                                        @else
                                            <div class="alert alert-warning fade show" role="alert">
                                                <i class="fa-solid fa-cross-circle"></i><strong>Looks like the enrollment
                                                    has
                                                    been
                                                    rejected. <a
                                                        href="{{ route('user.denyReason', $enrollment->pivot->id) }}">See
                                                        the
                                                        reason!</a></strong>
                                            </div>
                                        @endif
                                    @endif
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger form-group py-2">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form class="forms-sample" action="{{ route('user.buy') }}" enctype="multipart/form-data"
                                    method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $course->id }}" name="courseId">
                                    <div class="form-group">
                                        <label for="exampleInputName1">Course Name</label>
                                        <input type="text" class="form-control" value="{{ $course->name }}" disabled
                                            placeholder="Name" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail3">Email address</label>
                                        <input type="email" class="form-control"
                                            id="exampleInputEmail3"@if ($enrolledData->enrolledCourses->contains($course->id)) disabled @endif
                                            placeholder="Enter your email" name="email" />
                                    </div>

                                    <div class="form-group">
                                        <label for="Image" class="form-label">Attach Screenshot</label>
                                        <input class="form-control" type="file" id="formFile"
                                            @if ($enrolledData->enrolledCourses->contains($course->id)) disabled @endif
                                            onchange="preview()"name="image">
                                        <img id="frame" src="" class="img-fluid" />
                                    </div>


                                    <button type="submit" @if ($enrolledData->enrolledCourses->contains($course->id)) disabled @endif
                                        class="btn btn-primary mr-2"> Submit </button>
                                    <button type="reset" onclick="clearImage()" class="btn btn-light">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>

            <!-- page-body-wrapper ends -->
        @endsection
