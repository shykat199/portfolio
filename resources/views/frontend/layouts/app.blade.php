<!DOCTYPE html>
<html lang="en" class="dark">


<!-- Mirrored from html.themestransmit.com/minfo-tailwind/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Apr 2025 17:44:35 GMT -->
<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Specific Meta
    ================================================== -->
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="keyword"
          content="resume, cv, portfolio, vcard, responsive, retina, jquery, css3, tailwindcss, material CV, creative, designer, developer, online cv, online resume, powerful portfolio, professional, landing page">
    <meta name="description"
          content="Minfo vCard/Resume TailwindCSS HTML Template">
    <meta name="author"
          content="Themearray">

    <!-- Site Title
    ================================================== -->
    <title>@yield('title')</title>

    <!-- Site Favicon
    ================================================== -->
    <link rel="shortcut icon" href="{{asset('img/gears-gear-svgrepo-com.svg')}}" sizes="any">

    <!-- Google Fonts
    ================================================== -->
    <link rel="preconnect" href="../../fonts.googleapis.com/index.html">
    <link rel="preconnect" href="../../fonts.gstatic.com/index.html" crossorigin>
    <link href="../../fonts.googleapis.com/css2b831.css?family=Poppins:wght@200;300;400;500;600;700&amp;display=swap"
          rel="stylesheet">

    <!-- All CSS Here
    ================================================== -->
    <link rel="stylesheet" href="{{asset('assets/css/fontAwesome5Pro.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/cdheadline.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">

    @stack('front-style')

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <script>
        localStorage.setItem("theme", "dark");
    </script>

</head>

<body class="relative custom_cursor">
<!-- Custom Cursor Start -->
<div
    class="custom_cursor_one fixed top-0 left-0 w-8 h-8 border border-gray-400 rounded-full pointer-events-none">
</div>
<div
    class="custom_cursor_two w-1 h-1 rounded-full border border-gray-400 bg-metborder-gray-400 fixed pointer-events-none left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
</div>
<!-- Custom Cursor End -->


<!-- App Preloader Start -->
<div id="preloader">
    <div class="loader_line"></div>
    <div class="absolute w-20 h-20 transition-all delay-300 -translate-x-1/2 -translate-y-1/2 rounded-full logo top-1/2 left-1/2 bg-nightBlack border-greyBlack flex-center">
        <img src="{{asset('img/gears-gear-svgrepo-com.svg')}}" alt="Minfo">
    </div>
</div>
<!-- App Preloader End -->

@php
    $settingData = getSettingsData();
    $latestResume = DB::table('resumes')->where('status',ACTIVE_STATUS)->orderByDesc('id')->first();;
@endphp

<!-- App Start -->
<div class="relative pt-10 minfo__app max-xl:pt-20">
    <div
        class="menu-overlay fixed top-0 left-0 w-full h-full bg-black/60 transition-all duration-200 z-999 opacity-0 invisible [&.is-menu-open]:visible [&.is-menu-open]:opacity-100">
    </div>
    <div class="max-lg:px-4">

        <!-- Mobile Menu Bar Start -->
        @include('frontend.layouts.mobile-menu-bar')
        <!-- Mobile Menu Bar End -->


        <!-- Mobile Menu Sidebar Start -->
        @include('frontend.layouts.mobile-side-bar')
        <!-- Mobile Menu Sidebar End -->


        <!-- Sidebar Profile Start -->
        @include('frontend.layouts.side-bar')
        <!-- Sidebar Profile End -->


        <!-- Nav/Navigation Start -->
        @include('frontend.layouts.nav-bar')
        <!-- Nav/Navigation End -->


        <!-- Main Content Start -->
        <div
            class="minfo__contentBox relative mx-auto max-w-container xl:max-2xl:max-w-65rem *:py-5 xl:*:py-3.5 *:max-w-content max-xl:*:mx-auto xl:*:ml-auto xl:max-2xl:*:max-w-50rem">

            @section('content')

            @show

        </div>
        <!-- Main Content End -->

        <!-- Footer Start -->
        @include('frontend.layouts.footer')
        <!-- Footer End -->

    </div>
</div>
<!-- App End -->


<!-- Background Line and Animation -->
<div
    class="bg-lines fixed inset-0 -z-1 md:max-xl:max-w-[45rem] xl:max-w-60rem 2xl:max-w-container mx-auto max-sm:px-8 sm:max-xl:px-12">
    <div
        class="line-wrapper max-w-[1130px] w-full h-full ml-auto 2xl:-mr-24 relative flex justify-between *:w-px *:h-full *:border-r *:border-dashed *:border-slate-300 dark:*:border-metalBlack *:relative *:before:absolute *:before:bg-theme *:before:rotate-45 *:before:-left-1 *:before:w-2 *:before:h-2">
        <div class="line1 before:animate-top_bottom"></div>
        <div class="line2 before:bottom-0 before:animate-bottom_top before:animate-delay-3s"></div>
        <div class="line3 before:animate-top_bottom before:animate-delay-3s"></div>
        <div class="line4 before:bottom-0 before:animate-bottom_top before:animate-delay-2s"></div>
    </div>
</div>
<!-- Ends Here -->

<!-- Js Library Start -->
<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/waypoints.min.js')}}"></script>
<script src="{{asset('assets/js/tw-elements.umd.min.js')}}"></script>
<script src="{{asset('assets/js/cd-headline.js')}}"></script>
<script src="{{asset('assets/js/jquery.counterup.min.j')}}s"></script>
<script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/js/scrollIt.min.js')}}"></script>
<script src="{{asset('assets/js/circle-progress.min.j')}}s"></script>
<script src="{{asset('assets/js/script.js')}}"></script>
<script src="{{asset('assets/js/theme-mode.js')}}"></script>
@stack('front-script')
<!-- Js Library End -->
</body>


<!-- Mirrored from html.themestransmit.com/minfo-tailwind/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Apr 2025 17:45:21 GMT -->
</html>
