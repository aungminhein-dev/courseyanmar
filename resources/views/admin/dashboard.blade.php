@extends('admin.layouts.app')
@section('content')
    <div class=" my-3">
        <div class="row">
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Courses ({{ $courseCount }})</h5>
                                <div class="d-inline-flex justify-content-between">
                                    <span class=" font-weight-bold mb-0 me-1">{{ $thisMonthCourseCount }} <span
                                            class="text-nowrap">This Month </span></span>
                                    <span class=" font-weight-bold mb-0">{{ $lastMonthCourseCount }} <span
                                            class="text-nowrap">Last Month</span></span>
                                </div>

                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                    <i class="fas fa-chart-bar"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-muted text-sm">
                            @if ($courseCount != 0 && $thisMonthCourseCount != 0 && $lastMonthCourseCount != 0)
                                @if ($thisMonthCourseCount > $lastMonthCourseCount)
                                    <span class="text-success mr-2"><i
                                            class="fa fa-arrow-up"></i>{{ round(($thisMonthCourseCount / $lastMonthCourseCount) * 100, 2) }}%</span>
                                @else
                                    <span class="text-danger mr-2"><i
                                            class="fa fa-arrow-down"></i>{{ round(($thisMonthCourseCount / $lastMonthCourseCount) * 100, 2) }}%</span>
                                @endif
                                <span class="text-nowrap">Since last month</span>
                            @else
                                No Calculations Yet!
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Users ({{ $userCount }})</h5>
                                <div class="d-inline-flex justify-content-between">
                                    <span class=" font-weight-bold mb-0 me-1">{{ $thisMonthUserCount }} <span
                                            class="text-nowrap">This Month </span></span>
                                    <span class=" font-weight-bold mb-0">{{ $lastMonthUserCount }} <span
                                            class="text-nowrap">Last Month</span></span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-muted text-sm">
                            @if ($userCount != 0 && $thisMonthUserCount != 0 && $lastMonthUserCount != 0)
                                @if ($thisMonthUserCount > $lastMonthUserCount)
                                    <span class="text-success mr-2"><i
                                            class="fa fa-arrow-up"></i>{{ round(($thisMonthUserCount / $lastMonthUserCount) * 100, 2) }}%</span>
                                @else
                                    <span class="text-danger mr-2"><i
                                            class="fa fa-arrow-down"></i>{{ round(($thisMonthUserCount / $lastMonthUserCount) * 100, 2) }}%</span>
                                @endif
                                <span class="text-nowrap">Since last month</span>
                            @else
                                No Calculations Yet!
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Enrollments ({{ $enrollmentCount }})
                                </h5>
                                <div class="d-inline-flex justify-content-between">
                                    <span class=" font-weight-bold mb-0 me-1">{{ $thisMonthEnrollmentCount }} <span
                                            class="text-nowrap">This Month </span></span>
                                    <span class=" font-weight-bold mb-0">{{ $lastMonthEnrollmentCount }} <span
                                            class="text-nowrap">Last Month</span></span>
                                </div>

                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                    <i class="fas fa-chart-pie"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-muted text-sm">
                            @if ($enrollmentCount != 0 && $lastMonthEnrollmentCount != 0 && $thisMonthEnrollmentCount != 0)
                                @if ($thisMonthEnrollmentCount > $lastMonthEnrollmentCount)
                                    <span class="text-success mr-2"><i
                                            class="fa fa-arrow-up"></i>{{ round(($thisMonthEnrollmentCount / $lastMonthEnrollmentCount) * 100, 2) }}%</span>
                                @else
                                    <span class="text-danger mr-2"><i
                                            class="fa fa-arrow-down"></i>{{ round(($thisMonthEnrollmentCount / $lastMonthEnrollmentCount) * 100, 2) }}%</span>
                                @endif
                                <span class="text-nowrap">Since last month</span>
                            @else
                                No Calculations Yet!
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                                <span class="h2 font-weight-bold mb-0">49,65%</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                    <i class="fas fa-percent"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-muted text-sm">
                            <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-8 col-xl-8">
            <div class="card">
                <div class="card-header">User Statistics
                    <div class="card-action">
                        <div class="dropdown">
                            <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret"
                                data-toggle="dropdown">
                                <i class="icon-options"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="javascript:void();">Action</a>
                                <a class="dropdown-item" href="javascript:void();">Another action</a>
                                <a class="dropdown-item" href="javascript:void();">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void();">Separated link</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-inline">
                        <li class="list-inline-item"><i class="fa fa-circle mr-2 text-white"></i>This Year
                            User</li>
                        <li class="list-inline-item"><i class="fa fa-circle mr-2 text-light"></i>Last Year
                            User</li>
                    </ul>
                    <div class="chart-container-1">
                        <canvas id="chart1"></canvas>
                    </div>
                </div>

                <div class="row m-0 row-group text-center border-top border-light-3">
                    <div class="col-12 col-lg-4">
                        <div class="p-3">
                            <h5 class="mb-0">{{ $userCount }} Users In total</h5>
                            <small class="mb-0">Overall
                                @if ($userCountCurrentYear != 0)
                                    <span>
                                        @if ($userCountCurrentYear > $userCountLastYear)
                                            <i class="fa fa-arrow-up"></i>
                                        @else
                                            <i class="fa fa-arrow-down"></i>
                                        @endif
                                        {{ round(($userCountLastYear / $userCountCurrentYear) * 100, 2) }} % than last year
                                    </span>
                                @endif

                            </small>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="p-3">
                            <h5 class="mb-0">{{ $userCountCurrentYear }} Users</h5>
                            <small class="mb-0">This Year <span>
                                </span></small>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="p-3">
                            <h5 class="mb-0">{{ $userCountLastYear }} Users</h5>
                            <small class="mb-0"> Last Year<span>
                                </span></small>
                        </div>
                    </div>
                </div>

            </div>
        </div>

       @if ($enrollmentCount != 0)
       <div class="col-12 col-lg-4 col-xl-4">
        <div class="card">
            <div class="card-header">Yearly sales
                <div class="card-action">
                    <div class="dropdown">
                        <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret"
                            data-toggle="dropdown">
                            <i class="icon-options"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javascript:void();">Action</a>
                            <a class="dropdown-item" href="javascript:void();">Another action</a>
                            <a class="dropdown-item" href="javascript:void();">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void();">Separated link</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-container-2">
                    <canvas id="chart2"></canvas>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center">
                    <tbody>
                        <tr>
                            <td><i class="fa fa-circle text-white mr-2"></i> {{ $thisYear }}</td>
                            <td>{{ $thisYearEnrollment }}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-circle text-light-1 mr-2"></i>{{ $thisYear - 1 }}</td>
                            <td>{{ $lastYearEnrollment }}</td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
       @endif
    </div>
    <!--End Row-->

    @if ($recentOrders->total() != 0)
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-header">Recent Order Tables
                        <div class="card-action">
                            <div class="dropdown">
                                <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret"
                                    data-toggle="dropdown">
                                    <i class="icon-options"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="javascript:void();">Action</a>
                                    <a class="dropdown-item" href="javascript:void();">Another action</a>
                                    <a class="dropdown-item" href="javascript:void();">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void();">Separated link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush table-borderless">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Photo</th>
                                    <th>Order Status</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Shipping</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recentOrders as $order)
                                    <tr>
                                        <td>{{ $order->user->name }}</td>
                                        <td><img src="{{ asset('storage/paymant_screenshots/' . $order->image) }}"
                                                class="product-img" alt="product img">
                                        </td>
                                        <td>{{ $order->order_status }}</td>
                                        <td>{{ $order->course->price }} Kyats</td>
                                        <td>{{ $order->created_at->format('j-F-Y') }}</td>
                                        <td>
                                            <div class="">
                                                <a href="{{ route('admin.orderDetail', $order->id) }}"
                                                    class="btn btn-warning">View</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @else
        <h3 class="text-muted">No Recent Orders</h3>
    @endif
    <!--End Row-->
    <!--End Dashboard Content-->
@endsection
@section('myScript')
    <script>
        $.ajax({
            method: 'get',
            url: '/admin_/dashboard',
            success: function(data) {
                var ctx = document.getElementById('chart1').getContext('2d');

                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: data.xData,
                        datasets: [{
                            label: 'This Year Users',
                            data: data.yDataThisYear,
                            backgroundColor: '#fff',
                            borderColor: "transparent",
                            pointRadius: "0",
                            borderWidth: 3
                        }, {
                            label: 'Last Year Users',
                            data: data.yDataLastYear,
                            backgroundColor: "rgba(255, 255, 255, 0.25)",
                            borderColor: "transparent",
                            pointRadius: "0",
                            borderWidth: 1
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        legend: {
                            display: false,
                            labels: {
                                fontColor: '#ddd',
                                boxWidth: 40
                            }
                        },
                        tooltips: {
                            displayColors: false
                        },
                        scales: {
                            xAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    fontColor: '#ddd'
                                },
                                gridLines: {
                                    display: true,
                                    color: "rgba(221, 221, 221, 0.08)"
                                },
                            }],
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    fontColor: '#ddd'
                                },
                                gridLines: {
                                    display: true,
                                    color: "rgba(221, 221, 221, 0.08)"
                                },
                            }]
                        }

                    }
                });
                var ctx = document.getElementById("chart2").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: [data.thisYear, data.lastYear],
                        datasets: [{
                            backgroundColor: [
                                "#ffffff",
                                "rgba(255, 255, 255, 0.70)",

                            ],
                            data: [data.thisYearEnrollment, data.lastYearEnrollment],
                            borderWidth: [0, 0, 0, 0]
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        legend: {
                            position: "bottom",
                            display: false,
                            labels: {
                                fontColor: '#ddd',
                                boxWidth: 15
                            }
                        },
                        tooltips: {
                            displayColors: false
                        }
                    }
                });

            }
        })


    </script>
@endsection
