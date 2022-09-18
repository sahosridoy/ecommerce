<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gogi - @yield('page_title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/media/image/favicon.png')}}"/>

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('backend/vendors/bundle.css') }}" type="text/css">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Daterangepicker -->
    {{-- <link rel="stylesheet" href="{{ asset('backend/vendors/datepicker/daterangepicker.css') }}" type="text/css"> --}}

    <!-- DataTable -->
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('backend/vendors/select2/css/select2.min.css') }}" type="text/css">



    <link rel="stylesheet" href="{{ asset('backend/vendors/dataTable/datatables.min.css') }}" type="text/css">
    @yield('exta_css')

<!-- App css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/app.min.css') }}" type="text/css">

    <style>
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 36px;
        }

        .select2-container .select2-selection--single {
            height: 36px;
        }
    </style>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Preloader -->
{{-- @include('include.backend.preloader') --}}
<!-- ./ Preloader -->



<!-- Layout wrapper -->
<div class="layout-wrapper">


    <!-- Header -->
   @include('include.admin.header')
    <!-- ./ Header -->

    <!-- Content wrapper -->
    <div class="content-wrapper">


        <!-- begin::navigation -->
          @include('include.admin.nav')
        <!-- end::navigation -->

        <!-- Content body -->
        <div class="content-body">
               <!-- Content -->
            <div class="content ">



            @yield('content')

            <!-- Modal -->
               {{-- @include('include.backend.model') --}}
            </div>
            <!-- ./ Content -->

            <!-- Footer -->
            @include('include.admin.footer')
            <!-- ./ Footer -->


        </div>
        <!-- ./ Content body -->
    </div>
    <!-- ./ Content wrapper -->
</div>
<!-- ./ Layout wrapper -->



    <!-- Main scripts -->
    <script src="{{ asset('backend/vendors/bundle.js') }}"></script>

    <!-- Select 2 -->
    <script src="{{ asset('backend/vendors/select2/js/select2.min.js') }}"></script>

    <!-- Apex chart -->
    <script src="{{ asset('backend/vendors/charts/apex/apexcharts.min.js') }}"></script>

    <!-- Daterangepicker -->
    <script src="{{ asset('backend/vendors/datepicker/daterangepicker.js') }}"></script>

    <!-- DataTable -->
    <script src="{{ asset('backend/vendors/dataTable/datatables.min.js') }}"></script>

    <!-- Dashboard scripts -->
    <script src="{{ asset('backend/assets/js/examples/pages/dashboard.js') }}"></script>
    <!-- App scripts -->
    <script src="{{ asset('backend/assets/js/app.min.js') }}"></script>
    @yield('exta_js')
</body>
</html>
