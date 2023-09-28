@extends('admin.layouts.app')
@section('content')
    <style>


        #paymentScreenshot {
            cursor: pointer;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <i class="fa-solid fa-arrow-left my-2" onclick="history.back()"></i>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Order</h5>
                    @switch($enrollment->status)
                        @case(1)
                            <h5 class="text-success  card-action">Accepted <i class="fa-solid fa-check"></i></h5>
                        @break

                        @case(2)
                            <h5 class="text-danger card-action">Denied!</h5>
                        @break

                        @default
                            <h5 class="text-warning  card-action">Pending <i class="fa-solid fa-spinner spin"></i></h5>
                    @endswitch
                </div>
                <div class="card-body">
                    <div class="course-img d-flex justify-content-between">
                        <div class="d-none d-lg-block">
                            <h4 class="text-white">Course</h4>
                            <img src="{{ asset('storage/' . $enrollment->course_image) }}" alt=""
                                class="img-fluid rounded d-block mx-start" style="height: 300px">
                        </div>
                        <div class="">
                            <h4 class="text-white">Payment Screenshot</h4> <span>tap to view</span>
                            <img id="paymentScreenshot" data-bs-toggle="modal" data-bs-target="#screenShot"
                                src="{{ asset('storage/payment_screenshots/' . $enrollment->payment_screenshot) }}"
                                alt="" class="img-fluid rounded d-block mx-start"style="height: 300px">
                        </div>
                    </div>
                    <h5 class="my-2">User Name : {{ $enrollment->user_name }}</h5>
                    <h5 class="my-2">Order Course : {{ $enrollment->course_name }}</h5>
                    <h5 class="my-2">Paid Amount : {{ $enrollment->course_price }}</h5>
                    @if ($enrollment->deny_description)
                           <h5 class="my-2">Reason : {{$enrollment->deny_description}}</h5>
                    @endif
                    @if ($enrollment->status == 0)
                        <div class="action my-2 d-flex ">
                            <form action="{{ route('admin.orderAccept') }}" class="me-2" method="post">
                                @csrf
                                <input type="hidden" name="enrollmentId" value="{{ $enrollment->id }}">
                                <button class="btn btn-primary profile-btn">Accept</button>
                            </form>
                            <button type="button" class="btn btn-danger profile-btn" data-bs-toggle="modal"
                                data-bs-target="#reasonModal">Deny</button>
                        </div>
                    @endif

                    <!-- Modal -->
                    <div class="modal fade" id="reasonModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <form action="{{ route('admin.orderDeny') }}" method="post">
                                    @csrf
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">Write Some Reasons to
                                            Your Customer</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <input type="hidden" name="enrollmentId" value="{{$enrollment->id}}">
                                    <div class="modal-body">
                                        <label for="" class="text-black">Description :</label>
                                        <textarea name="description" id="" class="form-control border" cols="30" rows="10"
                                            style="color:black !important"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    {{-- Image modal --}}
                    <div class="modal fade" id="screenShot" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-dark">Payment Screenshot</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ asset('storage/payment_screenshots/' . $enrollment->payment_screenshot) }}"
                                        alt="" class="img-fluid rounded d-block mx-auto"style="height: 500px">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
