@php
    $is_route = \Route::is('project-list') || \Route::is('project-details');
@endphp
<div
    class="mobile-menu fixed top-0 -right-full w-full max-w-mobilemenu bg-flashWhite dark:bg-nightBlack z-999 h-full xl:hidden transition-all duration-300 [&.is-menu-open]:right-0 py-12 px-8 overflow-y-scroll">
    <button
        class="absolute flex items-center justify-center w-9 h-9 text-sm text-white rounded-full close-menu top-4 right-4 bg-greyBlack" aria-label="Close Menu">
        <i class="fal fa-times"></i>
    </button>
    <div class="mb-6 text-lg font-medium text-black dark:text-white menu-title">
        Menu
    </div>
    <ul class="space-y-5 font-normal main-menu">
        <li data-scroll-nav="0" class="relative group active">
            <a href="#home"  @if($is_route)
                onclick="window.location.href='{{ route('home.index') }}#home'; return false;"
               @endif class="flex items-center space-x-2 group">
                            <span class="w-5 text-black dark:text-white group-[&.active]:text-theme">
                                <i class="fal fa-home"></i>
                            </span>
                <span class="group-[&.active]:text-theme dark:group-[&.active]:text-white group-hover:text-theme transition-colors">
                                Home
                            </span>
            </a>
        </li>
        <li data-scroll-nav="1" class="relative group">
            <a href="#about" @if($is_route)
                onclick="window.location.href='{{ route('home.index') }}#about'; return false;"
               @endif class="flex items-center space-x-2 group">
                            <span class="w-5 text-black dark:text-white group-[&.active]:text-theme">
                                <i class="fal fa-user"></i>
                            </span>
                <span class="group-[&.active]:text-theme dark:group-[&.active]:text-white group-hover:text-theme transition-colors">
                                About
                            </span>
            </a>
        </li>
        <li data-scroll-nav="2" class="relative group">
            <a href="#skill" @if($is_route)
                onclick="window.location.href='{{ route('home.index') }}#skill'; return false;"
               @endif class="flex items-center space-x-2 group">
                            <span class="w-5 text-black dark:text-white group-[&.active]:text-theme">
                                <i class="fal fa-graduation-cap"></i>
                            </span>
                <span class="group-[&.active]:text-theme dark:group-[&.active]:text-white group-hover:text-theme transition-colors">
                                Skills
                            </span>
            </a>
        </li>

        <li data-scroll-nav="3" class="relative group">
            <a href="#service"  @if($is_route)
                onclick="window.location.href='{{ route('home.index') }}#service'; return false;"
               @endif class="flex items-center space-x-2 group">
                            <span class="w-5 text-black dark:text-white group-[&.active]:text-theme">
                                <i class="fal fa-briefcase"></i>
                            </span>
                <span class="group-[&.active]:text-theme dark:group-[&.active]:text-white group-hover:text-theme transition-colors">
                                Service
                            </span>
            </a>
        </li>

        <li data-scroll-nav="4" class="relative group">
            <a href="#resume"  @if($is_route)
                onclick="window.location.href='{{ route('home.index') }}#resume'; return false;"
               @endif class="flex items-center space-x-2 group">
                            <span class="w-5 text-black dark:text-white group-[&.active]:text-theme">
                                <i class="fal fa-file-alt"></i>
                            </span>
                <span class="group-[&.active]:text-theme dark:group-[&.active]:text-white group-hover:text-theme transition-colors">
                                Resume
                            </span>
            </a>
        </li>



        <li data-scroll-nav="5" class="relative group">
            <a href="#portfolio"  @if($is_route)
                onclick="window.location.href='{{ route('home.index') }}#portfolio'; return false;"
               @endif class="flex items-center space-x-2 group">
                            <span class="w-5 text-black dark:text-white group-[&.active]:text-theme">
                                <i class="fal fa-tasks-alt"></i>
                            </span>
                <span class="group-[&.active]:text-theme dark:group-[&.active]:text-white group-hover:text-theme transition-colors">
                                Poftfolio
                            </span>
            </a>
        </li>

{{--        <li data-scroll-nav="7" class="relative group">--}}
{{--            <a href="#testimonial" class="flex items-center space-x-2 group">--}}
{{--                            <span class="w-5 text-black dark:text-white group-[&.active]:text-theme">--}}
{{--                                <i class="fal fa-comment-alt-lines"></i>--}}
{{--                            </span>--}}
{{--                <span class="group-[&.active]:text-theme dark:group-[&.active]:text-white group-hover:text-theme transition-colors">--}}
{{--                                Testimonial--}}
{{--                            </span>--}}
{{--            </a>--}}
{{--        </li>--}}
        <li data-scroll-nav="6" class="relative group">
            <a href="#contact"  @if($is_route)
                onclick="window.location.href='{{ route('home.index') }}#contact'; return false;"
               @endif class="flex items-center space-x-2 group">
                            <span class="w-5 text-black dark:text-white group-[&.active]:text-theme">
                                <i class="fal fa-envelope"></i>
                            </span>
                <span class="group-[&.active]:text-theme dark:group-[&.active]:text-white group-hover:text-theme transition-colors">
                                Contact
                            </span>
            </a>
        </li>
    </ul>
    <br><br>
    <div class="mb-4 font-medium text-black dark:text-white menu-title text-md">
        Get in Touch
    </div>
    <!-- Social Share Icon Start  -->
    <div class="flex items-center space-x-4 social-icons *:flex">

        <a href="{{$settingData['linkedin']}}" title="Share with Linkedin">
            <i class="fab fa-linkedin-in"></i>
        </a>
        <a href="{{$settingData['git']}}" title="Share with Git">
            <i class="fab fa-github"></i>
        </a>

    </div>
    <!-- Social Share Icon End  -->
</div>
