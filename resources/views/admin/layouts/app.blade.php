<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="dark" data-bs-theme="dark">

<head>

    <meta charset="utf-8" />
    <title>{{env('APP_NAME')}} | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.ico')}}">
    <!-- App css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="{{asset('admin/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">

    <style>
        .swal2-popup {
            background-color: #1e1e1e !important;
            color: #ffffff !important;
        }
        .swal2-title {
            color: #ffffff !important;
        }
        .swal2-content {
            color: #dcdcdc !important;
        }
        .swal2-confirm {
            background-color: #4CAF50 !important;
            border-color: #4CAF50 !important;
        }
        .swal2-cancel {
            background-color: #d33 !important;
            border-color: #d33 !important;
        }
    </style>

    @stack('style')

</head>

<body>
@include('sweetalert::alert')
@include('admin.layouts.header')
@include('admin.layouts.sidebar')

<div class="page-wrapper">
    <div class="page-content">
        <div class="container-fluid">

            @section('content')

            @show
        </div>
        @include('admin.layouts.footer')
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('admin/assets/js/app.js')}}"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="{{asset('admin/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

@stack('script')

</body>
<!--end body-->
</html>
