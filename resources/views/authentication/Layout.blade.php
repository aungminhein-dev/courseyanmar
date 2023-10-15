<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Courseyanmar Edu</title>
    <!-- loader-->
    <link href="{{ asset('admin/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('admin/assets/js/pace.min.js') }}"></script>
    <!--favicon-->
    <link rel="icon" href="{{ asset('admin/assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="{{ asset('admin/assets/css/animate.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="{{ asset('admin/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <!-- Custom Style-->
    <link href="{{ asset('admin/assets/css/app-style.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        *::placeholder{
            color: #999 !important;
            /* Change the text color */
            font-style: italic;
        }
        .opt{
            color: #999 !important;
            font-style: italic;
        }

    </style>
</head>

<body class="bg-white">
    <!-- Start wrapper-->
    <div id="wrapper">

        <div class="card card-authentication1 border-0 mx-auto my-5">
            @yield('content')

            <!--Start Back To Top Button-->
            <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
            <!--End Back To Top Button-->


            <!--end color switcher-->

        </div><!--wrapper-->

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>

        <!-- sidebar-menu js -->
        <script src="{{ asset('admin/assets/js/sidebar-menu.js') }}"></script>

        <!-- Custom scripts -->
        <script src="{{ asset('admin/assets/js/app-script.js') }}"></script>

</body>

</html>
