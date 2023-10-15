<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Courseyanmar</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('user/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <!-- endinject -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('user/assets/css/demo_2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/demo_2/video-gallery.css') }}" />
    <link rel="stylesheet" href="{{ asset('user/assets/css/demo_2/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/demo_2/style.css') }}" />

    <link href="{{ asset('admin/assets/css/mystyle.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('user/assets/css/demo_2/custom.css') }}" />
    <!-- End layout styles -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .active a i,
        .active a span {
            color: rgb(58, 219, 14) !important;
        }

        .spin {
            animation: spin 1s infinite linear;
        }

        .loader {
            position: sticky;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            z-index: 99999999999999999999999999;
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
        /* .footer{
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 99;
        } */
    </style>
    @livewireStyles
</head>

<body >
    <div class="container-scroller position-relative" >

        <x-user.horizontal-menu />
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="p-5" style="min-height: 100vh;">
                    @yield('content')
                </div>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- image card row starts here -->

        <!-- table row starts here -->
        <x-user.footer />
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
    integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('user/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <script src="{{ asset('user/assets/js/misc.js') }}"></script>
    <script src="{{ asset('user/assets/js/settings.js') }}"></script>
    <script src="{{ asset('user/assets/js/owl.carousel.min.js') }}"></script>

    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('user/assets/js/dashboard.js') }}"></script>
    @yield('myScript')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.owl-carousel').owlCarousel({
            loop: false,
            margin: 10,
            nav: true,
            dots: true,
            slideBy: 2,
            autoplay: true,
            autoplayHoverPause: true,
            smartSpeed: 300,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 3
                }
            }
        })

        function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
        }

        function clearImage() {
            document.getElementById('formFile').value = null;
            frame.src = "";
        }
    </script>
    @livewireScripts
    <!-- End custom js for this page -->
</body>

</html>
