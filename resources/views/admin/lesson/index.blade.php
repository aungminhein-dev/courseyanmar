@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-12">
                <x-admin.lesson-table :course="$course" :lessons="$lessons"/>
            </div>
        </div>
    </div>
@endsection
