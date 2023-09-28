@extends('user.layouts.app')
@section('content')
@if ($lessons->count() != 0 && $firstData)
   <x-video-gallery-component :course="$course" :lessons="$lessons" :firstData="$firstData" :enrolledCourses="$enrolledCourses"/>
@else
    <h1 class="text-center my-5 text-danger">No Lessons at the moment!</h1>
@endif
@endsection
