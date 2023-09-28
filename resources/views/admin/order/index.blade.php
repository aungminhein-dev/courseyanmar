@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">Recent Order Tables
                    <div class="card-action">
                        <div class="dropdown">
                            <a href="" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
                                <i class="icon-options"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="">Action</a>
                                <a class="dropdown-item" href="">Another action</a>
                                <a class="dropdown-item" href="">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="">Separated link</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush table-borderless">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Order Course</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($enrollments as $enrollment)
                                <tr>
                                    <td>
                                        <a
                                            href="{{ route('admin.profile', $enrollment->user_id) }}">{{ $enrollment->user_name }}</a>
                                        <img src="{{ asset('storage/' . $enrollment->user_image) }}"
                                            style="width:50px;height:50px;" class="rounded" alt="">
                                    </td>
                                    <td>
                                        <a
                                            href="{{ route('admin.courseEdit', '$enrollment->course_id') }}">{{ $enrollment->course_name }}</a>

                                    </td>
                                    <td>
                                        <img src="{{ asset('storage/payment_screenshots/' . $enrollment->payment_screenshot) }}"
                                            style="width: 50px;height :auto; border-radius:2px;" class="product-img"
                                            alt="product img">
                                    </td>
                                    <td>{{ $enrollment->course_price }}</td>
                                    <td>{{ $enrollment->created_at->format('j-F-Y') }}
                                        @if ($enrollment->order_status == 'new')
                                            <span class="badge badge-light">new</span>
                                        @endif
                                    </td>
                                    <td>
                                        @switch($enrollment->status)
                                            @case(1)
                                                <h5 class="text-success ">Accepted <i class="fa-solid fa-check"></i>
                                                </h5>
                                            @break

                                            @case(2)
                                                <h5 class="text-danger">Denied!</h5>
                                            @break

                                            @default
                                                <h5 class="text-warning ">Pending <i
                                                        class="fa-solid fa-spinner spin"></i></h5>
                                        @endswitch
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.orderDetail', $enrollment->id) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
