@extends('guest.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-md-8">
                <div class="content">
                    <div class="img">
                        @if ($category->image)
                            <img src="{{$category->image}}" alt="" class="img-fliud d-block mx-auto">
                        @else
                            <img src="{{asset('images/satellite-image-of-globe.jpg')}}" alt="" class="img-fliud d-block mx-auto">
                        @endif
                    </div>
                    <ul class="post-meta list-inline">
                        <li class="list-inline-item">
                            <i class="fa fa-bookmark text-muted"></i> <a href="#">{{ $category->name }}</a>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-calendar-o text-muted"></i> <a
                                href="#">{{ $category->created_at->format('j-F-Y') }}</a>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-tags text-muted"></i> <a href="#">{{ $category->course_count }}</a>
                        </li>
                    </ul>
                    <div class="">
                        <p class="text-muted">{{$category->description}}</p>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection
