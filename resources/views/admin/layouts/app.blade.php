<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Courseyanmar Admin Panel</title>
    <!--favicon-->
    <!-- Vector CSS -->
    <link href="{{ asset('admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <!-- simplebar CSS-->
    <link href="{{ asset('admin/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="{{ asset('admin/assets/css/animate.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="{{ asset('admin/assets/css/icons.css ') }}"rel="stylesheet" type="text/css" />
    <!-- Sidebar CSS-->

    <link href="{{ asset('admin/assets/css/sidebar-menu.css') }}" rel="stylesheet" />
    <!-- Custom Style-->
    <link href="{{ asset('admin/assets/css/app-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/css/mystyle.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/mstyle.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/video-gallery.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .spin {
            animation: spin 1s infinite linear;
        }

        .loader {
            position: sticky;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            z-index: 999999999999999999;
        }


        @keyframes spin {
            0% {
                transform: 0;
            }

            25% {
                transform: rotate(90deg)
            }

            50% {
                transform: rotate(180deg)
            }

            75% {
                transform: rotate(270deg)
            }

            100% {
                transform: rotate(360deg)
            }
        }
    </style>

</head>

<body class="{{ Auth::user()->background == '' ? 'bg-theme bg-theme2' : Auth::user()->background }}"
    style="position:relative;">
    {{-- loader --}}
    {{-- <div class="loader bg-black" id="myLoader">
        <div class="d-flex justify-content-center align-items-center" style=" height: 100vh;">
            <div class="text ">
                <h5 class="text-center">
                    <i class="fa-solid fa-spinner spin text-white"></i>
                </h5>
                <h5 class="text-white">Loading</h5>
            </div>
        </div>
    </div> --}}
    <!-- Start wrapper-->
    <div id="wrapper">

        {{-- sidebar component --}}
        <x-admin.sidebar />

        {{-- navbar component --}}
        <x-admin.navbar />

        <div class="clearfix"></div>

        <div class="content-wrapper">
            <div class="container-fluid" style="height: 100vh;">


                @yield('content')

                <!--start overlay-->
                <div class="overlay toggle-menu"></div>
                <!--end overlay-->
            </div>
            <!-- End container-fluid-->

        </div>
        <!--End content-wrapper-->
        <!--Start Back To Top Button-->
        <a href="" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>
        <!--End Back To Top Button-->

        {{-- Footer Component --}}

        {{-- Right Sidebar --}}

    </div>
    <!--End wrapper-->

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>

    <!-- simplebar js -->
    <!-- sidebar-menu js -->
    <script src="{{ asset('admin/assets/js/sidebar-menu.js') }}"></script>
    <!-- loader scripts -->
    <script src="{{ asset('admin/assets/js/jquery.loading-indicator.js') }}"></script>
    <!-- Custom scripts -->
    <script src="{{ asset('admin/assets/js/app-script.js') }}"></script>
    <!-- Chart js -->

    <script src="{{ asset('admin/assets/plugins/Chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/Chart.js/chartjs-script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"
        integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('admin/assets/js/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('admin/assets/js/additional.js') }}"></script>
    <script src="{{ asset('admin/assets/js/video-gallery.js') }}"></script>
    @yield('myScript')
</body>
<script>
    $(document).ready(function() {
        $(window).on('load', function() {
            $('#myLoader').hide();
        });
    });
</script>

</html>
