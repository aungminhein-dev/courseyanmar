@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="h4"><i class="fa-solid fa-pen"></i> Edit theme</div>
        <div class="row">
             <div class="right-sidebar-content">

                <p class="mb-0">Gaussion Texture</p>
                <hr>

                <ul class="switcher">
                    <li id="theme1" class="{{Auth::user()->background == 'bg-theme bg-theme1' ? 'border' : ''}}"></li>
                    <li id="theme2" class="{{Auth::user()->background == 'bg-theme bg-theme2' ? 'border' : ''}}"></li>
                    <li id="theme3" class="{{Auth::user()->background == 'bg-theme bg-theme3' ? 'border' : ''}}"></li>
                    <li id="theme4" class="{{Auth::user()->background == 'bg-theme bg-theme4' ? 'border' : ''}}"></li>
                    <li id="theme5" class="{{Auth::user()->background == 'bg-theme bg-theme5' ? 'border' : ''}}"></li>
                    <li id="theme6" class="{{Auth::user()->background == 'bg-theme bg-theme6' ? 'border' : ''}}"></li>
                </ul>

                <p class="mb-0">Gradient Background</p>
                <hr>

                <ul class="switcher">
                    <li id="theme7" class="{{Auth::user()->background == 'bg-theme bg-theme7' ? 'border' : ''}}"></li>
                    <li id="theme8" class="{{Auth::user()->background == 'bg-theme bg-theme8' ? 'border' : ''}}"></li>
                    <li id="theme9" class="{{Auth::user()->background == 'bg-theme bg-theme9' ? 'border' : ''}}"></li>
                    <li id="theme10" class="{{Auth::user()->background == 'bg-theme bg-theme10' ? 'border' : ''}}"></li>
                    <li id="theme11" class="{{Auth::user()->background == 'bg-theme bg-theme11' ? 'border' : ''}}"></li>
                    <li id="theme12" class="{{Auth::user()->background == 'bg-theme bg-theme12' ? 'border' : ''}}"></li>
                    <li id="theme13" class="{{Auth::user()->background == 'bg-theme bg-theme13' ? 'border' : ''}}"></li>
                    <li id="theme14" class="{{Auth::user()->background == 'bg-theme bg-theme14' ? 'border' : ''}}"></li>
                    <li id="theme15" class="{{Auth::user()->background == 'bg-theme bg-theme15' ? 'border' : ''}}"></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
