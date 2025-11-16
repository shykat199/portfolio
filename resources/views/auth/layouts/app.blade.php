<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="light" data-bs-theme="light">


<!-- Mirrored from mannatthemes.com/dastone-bs5/default/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Mar 2025 19:21:20 GMT -->
<head>


    <meta charset="utf-8" />
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.ico')}}">


    <!-- App css -->
    <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

</head>

<body>
@include('sweetalert::alert')
<div class="container-xxl">
    <div class="row vh-100 d-flex justify-content-center">
        <div class="col-12 align-self-center">

            @section('content')

            @show

        </div><!--end col-->
    </div><!--end row-->
</div><!-- container -->
<script>
    document.querySelector('.toggle-password').addEventListener('click', function() {
        let input = document.querySelector(this.getAttribute('toggle'));

        if (input.type === "password") {
            input.type = "text";
            this.innerHTML = '<i class="fa fa-eye-slash"></i>';
        } else {
            input.type = "password";
            this.innerHTML = '<i class="fa fa-eye"></i>';
        }
    });

</script>
</body>
</html>
