@extends('user.layouts.app')
@section('content')
    <div class="container">
        <div class="card shadow-sm bg-light">
            <h3 class="card-header text-dark">Dear Customer ({{ Auth::user()->name }})</h3>
            <div class="card-body">
                <h5 class="text-muted">
                    The enrollment you've made at <span class="text-primary">{{ $reason->created_at->format('j-F-Y') }}
                    </span> for the course <a href="{{ route('user.courseDetails', $reason->enrollment->course->id) }}"
                        class="text-primary">{{ $reason->enrollment->course->name }}</a> has been rejected by our admin
                    team due to several reasons below :
                </h5>
                <span class="text-dark">
                    {{ $reason->description }}
                </span>
                <h6 class="text-muted text-end">
                    With respect <span class="text-primary">{{ $reason->admin_name }}</span>
                </h6>
            </div>
            <div class="card-footer">
                <h6>
                    <a href="{{ route('user.deleteEnrollment', $reason->enrollment->id) }}" class="text-danger underline"
                        href="">delete</a>?
                </h6>
            </div>

        </div>
    </div>
@endsection
