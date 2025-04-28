@extends('frontend.layouts.app')

@section('title','Home')

@push('front-style')
    <style>
        .progress-circle {
            transition: stroke-dashoffset 1.5s ease-out;
        }
    </style>
@endpush


@section('content')
    <!-- Hero/Introduction Section Start -->
    <div data-scroll-index="0" id="home">

        <div class="hero-section px-5 py-8 md:p-8 bg-white dark:bg-nightBlack rounded-2xl lg:p-10 2xl:p-13">
            <div
                class="inline-flex items-center gap-2 px-4 py-2 text-xs tracking-wide text-black dark:text-white border lg:px-5 section-name border-platinum dark:border-greyBlack200 rounded-4xl">
                <i class="fal fa-home text-theme"></i>
                INTRODUCE
            </div>
{{--            @dd($settingData)--}}
            <div class="items-center gap-6 hero-content md:flex xl:gap-10">
                <div class="text-content pt-7 lg:pt-8 max-lg:max-w-[30rem]">
                    <h1
                        class="text-[32px] lg:text-5xl xl:text-4xl 2xl:text-5xl font-semibold text-black dark:text-white leading-1.27 lg:leading-1.27 xl:leading-1.27 2xl:leading-1.27 mb-4 lg:mb-5">
                        I Craft The <br>
                        <span class="text-theme">Digital Landscape</span>
                    </h1>
                    <p>{!! $settingData['about_me1'] ?? '' !!}</p>
                    <ul class="flex items-center mt-4 -mx-3 lg:mt-5 *:flex *:items-center *:mx-3 *:text-regular">
                        <li>
                            <i class="mr-2 fal fa-check-double text-theme"></i>
                            Available for work
                        </li>
                        <li>
                            <i class="mr-2 fal fa-check-double text-theme"></i>
                            Full Time Job
                        </li>
                    </ul>
                    <ul class="mt-7 buttons">
                        <li data-scroll-nav="6">
                            <a href="#contact" class="btn-theme inline-flex items-center gap-2 bg-theme py-4 md:py-4.5 lg:px-9 px-7 rounded-4xl leading-none transition-all duration-300 hover:shadow-theme_shadow text-white font-medium text-[15px] md:text-base">
                                <i class="fal fa-paper-plane"></i>
                                HIRE ME
                            </a>
                        </li>
                    </ul>

                </div>
                <div class="hero-image flex-[0_0_20.3rem] max-md:hidden">
{{--                    <img src="{{asset('img/pngwing.png')}}" class="hidden dark:block" alt="Hero Image - Dark Mode">--}}
                    <lottie-player
                        src="{{asset('img/coder-animation.json')}}"
{{--                        src="https://assets10.lottiefiles.com/packages/lf20_pprxh53t.json"--}}
                        background="transparent"
                        speed="1"
                        style="width: 300px; height: 300px;"
                        loop
                        autoplay>
                    </lottie-player>

                </div>
            </div>
        </div>

    </div>
    <!-- Hero/Introduction Section End -->


    <!-- About Me Section Start -->
    <div data-scroll-index="1" id="about">

        <div class="about-section px-5 py-8 md:p-8 bg-white dark:bg-nightBlack rounded-2xl lg:p-10 2xl:p-13">
            <div
                class="inline-flex items-center gap-2 px-4 py-2 text-xs tracking-wide text-black dark:text-white border lg:px-5 section-name border-platinum dark:border-greyBlack200 rounded-4xl">
                <i class="fal fa-user text-theme"></i>
                ABOUT ME
            </div>
            <div class="mt-7 md:mt-10 section-title">
                <h2
                    class="title text-[32px] md:text-4xl lg:text-5xl font-extralight text-black dark:text-white leading-1.27">
                    About <span class="font-semibold text-theme">Me</span>
                </h2>

                <p class="max-w-2xl mt-4 md:mt-6 subtitle">{!! $settingData['about_me2'] ?? '' !!}</p>

            </div>
            <div class="mt-6 section-content">

                <ul class="grid mt-4 mb-10 text-sm lg:mt-6 md:grid-cols-2 gap-x-8 gap-y-3 *:flex *:items-center">
                    <li>
                        <span class="flex-[0_0_6rem]">Phone</span>
                        <span class="flex-[0_0_2rem]">:</span>
                        <span class="text-black dark:text-white">{{$settingData['phone'] ?? ''}}</span>
                    </li>
                    <li>
                        <span class="flex-[0_0_6rem]">Email</span>
                        <span class="flex-[0_0_2rem]">:</span>
                        <span class="text-black dark:text-white">{{$settingData['email'] ?? ''}}</span>
                    </li>
                    <li>
                        <span class="flex-[0_0_6rem]">Linkedin</span>
                        <span class="flex-[0_0_2rem]">:</span>
                        <span class="text-black dark:text-white">{{$settingData['linkedin'] ?? ''}}</span>
                    </li>
                    <li>
                        <span class="flex-[0_0_6rem]">Github</span>
                        <span class="flex-[0_0_2rem]">:</span>
                        <span class="text-black dark:text-white">{{$settingData['git'] ?? ''}}</span>
                    </li>
                    <li>
                        <span class="flex-[0_0_6rem]">Language</span>
                        <span class="flex-[0_0_2rem]">:</span>
                        <span class="text-black dark:text-white">{{$settingData['language'] ?? ''}}</span>
                    </li>
                    <li>
                        <span class="flex-[0_0_6rem]">Hobby</span>
                        <span class="flex-[0_0_2rem]">:</span>
                        <span class="text-black dark:text-white">{{$settingData['hobby'] ?? ''}}</span>
                    </li>
                </ul>

                <ul class="grid grid-cols-2 gap-6 counters md:grid-cols-4 xl:gap-8">
                    <li>
                        <div class="mb-1 text-2xl font-semibold md:text-3xl number text-theme 2xl:text-4xl">
                            <span>{{$settingData['experience'] ?? 0}}</span>+
                        </div>
                        <div class="text-sm">Years Of Experience</div>
                    </li>
                    <li>
                        <div class="mb-1 text-2xl font-semibold md:text-3xl number text-theme 2xl:text-4xl">
                            <span>{{$settingData['project_completed'] ?? 0}}</span>+
                        </div>
                        <div class="text-sm">Handled Projects</div>
                    </li>
                </ul>

            </div>
        </div>

    </div>
    <!-- About Me Section End -->


    <!-- Skills Section Start -->
    <div data-scroll-index="2" id="skill">

        <div class="service-section relative px-5 py-8 md:p-8 bg-white dark:bg-nightBlack rounded-2xl lg:p-10 2xl:p-13">
            <div
                class="inline-flex items-center gap-2 px-4 py-2 text-xs tracking-wide text-black dark:text-white border lg:px-5 section-name border-platinum dark:border-greyBlack200 rounded-4xl">
                <i class="fal fa-graduation-cap text-theme"></i>
                SKILLS
            </div>
            <div class="mb-8 mt-7 md:my-10 section-title">
                <h2
                    class="title text-[32px] md:text-4xl lg:text-5xl font-extralight text-black dark:text-white leading-1.27">
                    My <span class="font-semibold text-theme">Advantages</span>
                </h2>
                <p class="mt-4 md:mt-6 subtitle">
                    I create simple, effective designs that are easy to use and look great. My focus is on making products that people enjoy using.
                </p>
            </div>

            @php
                $skills = \App\Models\Skill::where('status',ACTIVE_STATUS)->get();
            @endphp

{{--            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4 sm:gap-6 md:gap-8 text-center">--}}
{{--                @foreach ($skills as $skill)--}}
{{--                    <div class="group">--}}
{{--                        <div class="flex flex-col items-center p-2 sm:p-4 hover:transform hover:scale-105 transition-all">--}}
{{--                            <!-- Skill Logo -->--}}
{{--                            <div class="mb-3 w-16 h-16 sm:w-16 sm:h-16 rounded-full bg-gray-100 dark:bg-gray-800 flex items-center justify-center">--}}
{{--                                <img src="{{ asset('storage/'.$skill->logo) }}" alt="{{ $skill->name }}" class="w-14 h-14 sm:w-10 sm:h-10">--}}
{{--                            </div>--}}

{{--                            <!-- Circular Progress -->--}}
{{--                            <div class="relative w-20 h-20 sm:w-24 sm:h-24 overflow-visible">--}}
{{--                                <svg class="w-full h-full transform -rotate-90" viewBox="0 0 100 100">--}}
{{--                                    <!-- Background Circle -->--}}
{{--                                    <circle cx="50" cy="50" r="47" stroke-width="6" fill="none"/>--}}
{{--                                    <!-- Progress Circle -->--}}
{{--                                    <circle cx="50" cy="50" r="47"--}}
{{--                                            stroke="#00BC91"--}}
{{--                                            stroke-width="6"--}}
{{--                                            fill="none"--}}
{{--                                            stroke-linecap="round"--}}
{{--                                            stroke-dasharray="295"--}}
{{--                                            stroke-dashoffset="295"--}}
{{--                                            data-percentage="{{ $skill->percentage }}"--}}
{{--                                            class="progress-circle"/>--}}
{{--                                </svg>--}}
{{--                                <span class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-base sm:text-lg font-semibold text-gray-800 dark:text-white">--}}
{{--                                    {{ $skill->percentage }}%--}}
{{--                                </span>--}}
{{--                            </div>--}}

{{--                            <!-- Skill Name -->--}}
{{--                            <h3 class="text-base sm:text-lg font-medium text-gray-800 dark:text-white mt-2">{{ $skill->name }}</h3>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4 sm:gap-6 md:gap-8 text-center">
                @foreach ($skills as $skill)
                    <div class="group">
                        <div class="flex flex-col items-center p-2 sm:p-4 hover:transform hover:scale-105 transition-all">
                            <!-- Skill Logo -->
                            <div class="mb-3 w-16 h-16 sm:w-16 sm:h-16 rounded-full bg-gray-100 dark:bg-gray-800 flex items-center justify-center">
                                <img src="{{ asset('storage/'.$skill->logo) }}" alt="{{ $skill->name }}" class="w-14 h-14 sm:w-10 sm:h-10">
                            </div>

                            <!-- Circular Progress -->
                            <div class="relative w-20 h-20 sm:w-24 sm:h-24 overflow-visible">
                                <svg class="w-full h-full transform -rotate-90" viewBox="0 0 100 100">
                                    <!-- Background Circle -->
                                    <circle cx="50" cy="50" r="47" stroke-width="6" fill="none" stroke="#2B2C2C"/>
                                    <!-- Progress Circle -->
                                    <circle cx="50" cy="50" r="47"
                                            stroke="#00BC91"
                                            stroke-width="6"
                                            fill="none"
                                            stroke-linecap="round"
                                            stroke-dasharray="295"
                                            stroke-dashoffset="295"
                                            data-percentage="{{ $skill->percentage }}"
                                            class="progress-circle"/>
                                </svg>
                                <span class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-base sm:text-lg font-semibold text-gray-800 dark:text-white">
                                    {{ $skill->percentage }}%
                                </span>
                            </div>

                            <!-- Skill Name -->
                            <h3 class="text-base sm:text-lg font-medium text-gray-800 dark:text-white mt-2">{{ $skill->name }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>



        </div>

    </div>
    <!-- Skills Section End -->

    {{--  Services start  --}}
    <div data-scroll-index="3" id="service">

        <div class="service-section px-5 py-8 md:p-8 bg-white dark:bg-nightBlack rounded-2xl lg:p-10 2xl:p-13">
            <div class="inline-flex items-center gap-2 px-4 py-2 text-xs tracking-wide text-black dark:text-white border lg:px-5 section-name border-platinum dark:border-greyBlack200 rounded-4xl">
                <i class="fal fa-briefcase text-theme"></i>
                SERVICES
            </div>
            <div class="mb-8 mt-7 md:my-10 section-title">
                <h2 class="title text-[32px] md:text-4xl lg:text-5xl font-extralight text-black dark:text-white leading-1.27">
                    My <span class="font-semibold text-theme">Services</span>
                </h2>
            </div>

            <div class="grid gap-5 md:gap-6 service-card-wrapper sm:grid-cols-2 lg:gap-7 2xl:gap-8 *:relative *:p-5 *:transition *:duration-300 *:border *:py-7 md:*:p-7 *:border-platinum dark:*:border-metalBlack *:rounded-2xl xl:*:p-8 2xl:*:p-10">
                <div class="card-item group hover:border-theme dark:hover:border-theme">
                    <div class="absolute transition duration-300 md:top-10 icon right-6 top-7 md:right-8 group-hover:-rotate-45 lg:top-11">
                        <img src="{{asset('img/code.svg')}}" alt="code">
                    </div>
                    <div class="text-5xl font-extrabold transition duration-300 md:text-6xl number lg:text-7xl text-greyBlack opacity-30 group-hover:opacity-100">
                        01
                    </div>
                    <h4 class="mt-5 mb-4 text-xl font-medium text-black dark:text-white xl:text-2xl">
                        Writing Code
                    </h4>
                </div>
                <div class="card-item group hover:border-theme dark:hover:border-theme">
                    <div class="absolute transition duration-300 md:top-10 icon right-6 top-7 md:right-8 group-hover:-rotate-45 lg:top-11">
                        <img src="{{asset('img/web-dev.svg')}}" alt="web">
                    </div>
                    <div class="text-5xl font-extrabold transition duration-300 md:text-6xl number lg:text-7xl text-greyBlack opacity-30 group-hover:opacity-100">
                        02
                    </div>
                    <h4 class="mt-5 mb-4 text-xl font-medium text-black dark:text-white xl:text-2xl">
                        Web Development
                    </h4>
                </div>
                <div class="card-item group hover:border-theme dark:hover:border-theme">
                    <div class="absolute transition duration-300 md:top-10 icon right-6 top-7 md:right-8 group-hover:-rotate-45 lg:top-11">
                        <img src="{{asset('img/api.svg')}}" alt="api">
                    </div>
                    <div class="text-5xl font-extrabold transition duration-300 md:text-6xl number lg:text-7xl text-greyBlack opacity-30 group-hover:opacity-100">
                        03
                    </div>
                    <h4 class="mt-5 mb-4 text-xl font-medium text-black dark:text-white xl:text-2xl">
                        API Development
                    </h4>
                </div>
                <div class="card-item group hover:border-theme dark:hover:border-theme">
                    <div class="absolute transition duration-300 md:top-10 icon right-6 top-7 md:right-8 group-hover:-rotate-45 lg:top-11">
                        <img src="{{asset('img/bug.svg')}}" alt="bug">
                    </div>
                    <div class="text-5xl font-extrabold transition duration-300 md:text-6xl number lg:text-7xl text-greyBlack opacity-30 group-hover:opacity-100">
                        04
                    </div>
                    <h4 class="mt-5 mb-4 text-xl font-medium text-black dark:text-white xl:text-2xl">
                        Produce And Fix Bug
                    </h4>
                </div>
            </div>
        </div>

    </div>
    {{--  Services end  --}}

    @php
        $workExperiences = \App\Models\WorkExperience::where('status',ACTIVE_STATUS)->get();
        $educationExperiences = \App\Models\EducationalExperience::where('status',ACTIVE_STATUS)->get();
    @endphp
    <!-- My Resume Section Start -->
    <div data-scroll-index="4" id="resume">

        <div class="resume-section px-5 py-8 md:p-8 bg-white dark:bg-nightBlack rounded-2xl lg:p-10 2xl:p-13">
            <div
                class="inline-flex items-center gap-2 px-4 py-2 text-xs tracking-wide text-black dark:text-white border lg:px-5 section-name border-platinum dark:border-greyBlack200 rounded-4xl">
                <i class="fal fa-folder-open text-theme"></i>
                RESUME
            </div>
            <div class="mb-8 mt-7 md:my-10 section-title">
                <h2
                    class="title text-[32px] md:text-4xl lg:text-5xl font-extralight text-black dark:text-white leading-1.27">
                    Work <span class="font-semibold text-theme">Experience</span>
                </h2>
                <p class="mt-4 md:mt-6 subtitle">
                    Below is a list of companies I have worked with, showcasing my professional journey and experience.
                    Each role has helped me sharpen my skills and grow as a developer.
                </p>
            </div><!--./section-title-->

            <div class="experience">
                <ul class="space-y-5 md:space-y-11 relative md:before:content-[''] md:before:absolute md:before:left-64 md:before:border-r md:before:border-platinum md:dark:before:border-metalBlack md:before:h-[calc(100%_-1.5rem)] md:before:top-1/2 md:before:-translate-y-1/2 *:p-5 *:border *:rounded-xl md:*:flex max-md:*:space-y-2 *:border-platinum dark:*:border-metalBlack md:*:border-0 md:*:p-0 md:*:rounded-none">
                    @foreach($workExperiences as $experience)
                        <li>
                            <div class="flex items-center justify-between mb-5 md:w-64 md:block md:mb-0">
                                <h6 class="text-sm font-medium text-black dark:text-white text-opacity-60 md:text-base md:text-opacity-100">
                                    {{$experience->company_name}}
                                </h6>
                                <p class="text-[13px] md:text-sm text-theme">
                                    {{\Carbon\Carbon::parse($experience->start_date)->format('M, Y')}} - {{\Carbon\Carbon::parse($experience->end_date)->format('M, Y')}}
                                </p>
                            </div>
                            <div class="md:flex-1 md:pl-16 relative md:before:content-[''] md:before:absolute md:before:-left-1 md:before:top-3 md:before:w-2 md:before:h-2 md:before:bg-theme md:before:rounded-full md:before:shadow-dots_glow">
                                <h4 class="text-xl xl:text-2xl font-medium xl:font-medium leading-7 text-black dark:text-white mb-2.5">
                                    {{$experience->position}}
                                </h4>
                                <p>
                                    {!! $experience->description !!}
                                </p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <br>
            <div class="mb-8 mt-7 md:my-10 section-title">
                <h2
                    class="title text-[32px] md:text-4xl lg:text-5xl font-extralight text-black dark:text-white leading-1.27">
                    My <span class="font-semibold text-theme">Education</span>
                </h2>
                <p class="mt-4 md:mt-6 subtitle">
                    Below is an overview of my educational background, which has built a strong foundation for my professional career.
                    Each milestone has shaped my skills and knowledge in the field.
                </p>

            </div>

            <div class="experience">
                <ul class="space-y-5 md:space-y-11 relative md:before:content-[''] md:before:absolute md:before:left-64 md:before:border-r md:before:border-platinum md:dark:before:border-metalBlack md:before:h-[calc(100%_-1.5rem)] md:before:top-1/2 md:before:-translate-y-1/2 *:p-5 *:border *:rounded-xl md:*:flex max-md:*:space-y-2 *:border-platinum dark:*:border-metalBlack md:*:border-0 md:*:p-0 md:*:rounded-none">
                    @foreach($educationExperiences as $experience)
                        <li>
                            <div class="flex items-center justify-between mb-5 md:w-64 md:block md:mb-0">
                                <h6 class="text-sm font-medium text-black dark:text-white text-opacity-60 md:text-base md:text-opacity-100">
                                    {{$experience->college_name}}
                                </h6>
                                <p class="text-[13px] md:text-sm text-theme">
                                    {{\Carbon\Carbon::parse($experience->start_date)->format('M, Y')}} - {{\Carbon\Carbon::parse($experience->end_date)->format('M, Y')}}
                                </p>
                            </div>
                            <div class="md:flex-1 md:pl-16 relative md:before:content-[''] md:before:absolute md:before:-left-1 md:before:top-3 md:before:w-2 md:before:h-2 md:before:bg-theme md:before:rounded-full md:before:shadow-dots_glow">
                                <h4 class="text-xl xl:text-2xl font-medium xl:font-medium leading-7 text-black dark:text-white mb-2.5">
                                    {{$experience->position}}
                                </h4>
                                <p>
                                    {!! $experience->description !!}
                                </p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>

    </div>
    <!-- My Resume Section End -->

    @php
        $projects = \App\Models\Project::where('status',ACTIVE_STATUS)->limit(3)->get();
    @endphp

    <!-- Portfolio Section Start -->
    <div data-scroll-index="5" id="portfolio">

        <div class="portfolio-section px-5 py-8 md:p-8 bg-white dark:bg-nightBlack rounded-2xl lg:p-10 2xl:p-13">
            <div
                class="inline-flex items-center gap-2 px-4 py-2 text-xs tracking-wide text-black dark:text-white border lg:px-5 section-name border-platinum dark:border-greyBlack200 rounded-4xl">
                <i class="fal fa-tasks-alt text-theme"></i>
                PORTFOLIO
            </div>
            <div class="mt-5 mb-8 md:my-10 section-title">
                <h2
                    class="title text-[32px] md:text-4xl lg:text-5xl font-extralight text-black dark:text-white leading-1.27">
                    Featured <span class="font-semibold text-theme">Projects</span>
                </h2>
                <p class="mt-4 md:mt-6 subtitle">
                    Here are some of the featured projects I've worked on, showcasing my skills, creativity, and commitment to delivering high-quality results.
                </p>

            </div><!--./section-title-->

            <div class="blog-list md:space-y-7.5 space-y-5 *:grid md:*:gap-2 *:grid-cols-12 *:overflow-hidden *:bg-flashWhite dark:*:bg-metalBlack *:items-center *:rounded-2xl *:p-3.5">
                @foreach($projects as $project)
                    <div class="article group">
                        <div class="thumbnail overflow-hidden flex col-span-12 sm:col-span-6 md:col-span-5">
                            <a href="{{route('project-details',$project->slug)}}" class="block w-full overflow-hidden rounded-xl">
                                <img src="{{asset('storage/'.$project->img)}}"
                                     class="object-cover object-center w-full h-full min-h-[288px] max-h-60 md:min-h-60 transition-all duration-300 ease-in-out group-hover:scale-105"
                                     alt="{{$project->title}}">
                            </a>
                        </div>
                        <div class="post-content relative px-3 pt-6 pb-2 md:p-5 flex flex-col col-span-12 sm:col-span-6 md:col-span-7">

                            <div class="post-title mt-3 md:mt-4.5 mb-6 md:mb-8">
                                <a href="{{route('project-details',$project->slug)}}"
                                   class="text-xl font-semibold leading-normal text-black dark:text-white transition-colors line-clamp-2 2xl:text-2xl 2xl:leading-normal hover:text-theme">
                                    {{$project->title}}
                                </a>
                                <p class="mt-4 md:mt-6 subtitle">
                                    {!! \Illuminate\Support\Str::limit($project->description,100,'...') !!}
                                </p>
                            </div>
                            <div class="read-details">
                                <a href="{{route('project-details',$project->slug)}}"
                                   class="inline-flex items-center gap-2 border border-theme text-theme text-sm py-3.5 px-6 rounded-3xl leading-none transition-all duration-300 hover:bg-themeHover hover:border-themeHover dark:font-medium hover:text-white">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>


            <div class="mt-10 text-center more-blogs md:mt-13">
                <a href="{{route('project-list')}}"
                   class="inline-flex items-center gap-2 text-[15px] font-medium border border-theme bg-theme text-white py-4.5 px-9 rounded-4xl leading-none transition-all duration-300 hover:bg-themeHover hover:border-themeHover">
                    More Projects
                </a>
            </div>
        </div>

    </div>
    <!-- Portfolio Section End -->



    <!-- Testimonial Section Start -->
{{--    <div data-scroll-index="7" id="testimonial">--}}

{{--        <div class="testimonial-section px-5 py-8 md:p-8 bg-white dark:bg-nightBlack rounded-2xl lg:p-10 2xl:p-13">--}}
{{--            <div--}}
{{--                class="inline-flex items-center gap-2 px-4 py-2 text-xs tracking-wide text-black dark:text-white border lg:px-5 section-name border-platinum dark:border-greyBlack200 rounded-4xl">--}}
{{--                <i class="fal fa-comment-alt-check text-theme"></i>--}}
{{--                TESTIMONIAL--}}
{{--            </div>--}}
{{--            <div class="mt-5 mb-8 md:my-10 section-title">--}}
{{--                <h2--}}
{{--                    class="title text-[32px] md:text-4xl lg:text-5xl font-extralight text-black dark:text-white leading-1.27">--}}
{{--                    What <span class="font-semibold text-theme">People Say</span>--}}
{{--                </h2>--}}
{{--                <p class="max-w-xl mt-4 md:mt-6 subtitle">--}}
{{--                    I design products that are more than pretty. I make them shippable and usable, tempor--}}
{{--                    non mollit dolor et do aute--}}
{{--                </p>--}}
{{--            </div><!--./section-title-->--}}

{{--            <div class="mt-12 testimonial-slider">--}}
{{--                <div class="swiper">--}}
{{--                    <div class="swiper-wrapper">--}}
{{--                        <div class="swiper-slide">--}}
{{--                            <div class="text-center slider-inner md:px-5">--}}
{{--                                <div class="image flex-center">--}}
{{--                                    <img src="assets/img/testimonial/author1.png" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="mt-6 mb-3 text-center rating text-lightOrange text-sm">--}}
{{--                                    <i class="fas fa-star"></i>--}}
{{--                                    <i class="fas fa-star"></i>--}}
{{--                                    <i class="fas fa-star"></i>--}}
{{--                                    <i class="fas fa-star"></i>--}}
{{--                                    <i class="fas fa-star"></i>--}}
{{--                                </div>--}}
{{--                                <div class="text-sm md:text-[15px] leading-loose content">--}}
{{--                                    Working with <span class="font-semibold text-theme">Reddick</span> is a game-changer. Their coding expertise and commitment to quality make every project a success.--}}
{{--                                </div>--}}
{{--                                <div class="mt-5 text-center author">--}}
{{--                                    <h6 class="text-lg font-medium text-black dark:text-white">Alex Johnson</h6>--}}
{{--                                    <p class="text-sm">Developer</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div><!--./testimonial-card-->--}}

{{--                        <div class="swiper-slide">--}}
{{--                            <div class="text-center slider-inner md:px-5">--}}
{{--                                <div class="image flex-center">--}}
{{--                                    <img src="assets/img/testimonial/author2.png" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="mt-6 mb-3 text-center rating text-lightOrange text-sm">--}}
{{--                                    <i class="fas fa-star"></i>--}}
{{--                                    <i class="fas fa-star"></i>--}}
{{--                                    <i class="fas fa-star"></i>--}}
{{--                                    <i class="fas fa-star"></i>--}}
{{--                                    <i class="fas fa-star"></i>--}}
{{--                                </div>--}}
{{--                                <div class="text-sm md:text-[15px] leading-loose content">--}}
{{--                                    <span class="font-semibold text-theme">Reddick</span> exceeds expectations with top-tier coding skills. Reliable, collaborative, and a true asset to any project. Highly recommended--}}
{{--                                </div>--}}
{{--                                <div class="mt-5 text-center author">--}}
{{--                                    <h6 class="text-lg font-medium text-black dark:text-white">Mily Martin</h6>--}}
{{--                                    <p class="text-sm">CEO-itTheme</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div><!--./testimonial-card-->--}}

{{--                        <div class="swiper-slide">--}}
{{--                            <div class="text-center slider-inner md:px-5">--}}
{{--                                <div class="image flex-center">--}}
{{--                                    <img src="assets/img/testimonial/author2.png" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="mt-6 mb-3 text-center rating text-lightOrange text-sm">--}}
{{--                                    <i class="fas fa-star"></i>--}}
{{--                                    <i class="fas fa-star"></i>--}}
{{--                                    <i class="fas fa-star"></i>--}}
{{--                                    <i class="fas fa-star"></i>--}}
{{--                                    <i class="fas fa-star"></i>--}}
{{--                                </div>--}}
{{--                                <div class="text-sm md:text-[15px] leading-loose content">--}}
{{--                                    <span class="font-semibold text-theme">Reddick</span> delivers excellence in every line of code. Dependable, innovative, and a key player in project success. Outstanding performance.--}}
{{--                                </div>--}}
{{--                                <div class="mt-5 text-center author">--}}
{{--                                    <h6 class="text-lg font-medium text-black dark:text-white">Alex Johnson</h6>--}}
{{--                                    <p class="text-sm">Developer</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div><!--./testimonial-card-->--}}
{{--                    </div>--}}

{{--                    <!-- Slider Controls Start -->--}}
{{--                    <div--}}
{{--                        class="testimonial-slider-navigation flex justify-center items-center gap-2.5 mt-10 lg:mt-12">--}}
{{--                        <button--}}
{{--                            class="transition border rounded-full button-prev w-11 h-11 group border-platinum dark:border-greyBlack flex-center hover:bg-theme hover:border-theme"--}}
{{--                            aria-label="Previous">--}}
{{--                            <svg width="18" height="10" viewBox="0 0 18 10" fill="none" class="text-[#A0A0A0] group-hover:text-white"--}}
{{--                                 xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <path fill-rule="evenodd" clip-rule="evenodd"--}}
{{--                                      d="M18 5.08006C18 4.77812 17.7121 4.5334 17.3571 4.5334L2.19486 4.5334L6.07553 0.933214C6.32659 0.719715 6.32659 0.373628 6.07553 0.160126C5.82448 -0.0533767 5.41745 -0.0533766 5.1664 0.160126L0.188289 4.69352C-0.0627618 4.90702 -0.0627618 5.2531 0.188289 5.4666L5.33115 9.83986C5.5822 10.0534 5.98923 10.0534 6.24028 9.83986C6.49134 9.62637 6.49134 9.28028 6.24028 9.06678L2.19486 5.62672L17.3571 5.62671C17.7121 5.62671 18 5.38199 18 5.08006Z" fill="currentcolor" />--}}
{{--                            </svg>--}}
{{--                        </button>--}}
{{--                        <div class="text-sm font-light text-center text-black dark:text-white counter w-7"></div>--}}
{{--                        <button--}}
{{--                            class="transition border rounded-full button-next w-11 h-11 group border-platinum dark:border-greyBlack flex-center hover:bg-theme hover:border-theme"--}}
{{--                            aria-label="Next">--}}
{{--                            <svg width="18" height="10" viewBox="0 0 18 10" fill="none" class="text-[#A0A0A0] group-hover:text-white"--}}
{{--                                 xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <path fill-rule="evenodd" clip-rule="evenodd"--}}
{{--                                      d="M4.44113e-07 4.91994C4.17717e-07 5.22187 0.287871 5.4666 0.642857 5.4666L15.8051 5.4666L11.9245 9.06678C11.6734 9.28028 11.6734 9.62637 11.9245 9.83987C12.1755 10.0534 12.5826 10.0534 12.8336 9.83987L17.8117 5.30648C18.0628 5.09298 18.0628 4.7469 17.8117 4.5334L12.6688 0.160134C12.4178 -0.0533766 12.0108 -0.0533766 11.7597 0.160134C11.5087 0.373633 11.5087 0.719718 11.7597 0.933218L15.8051 4.37328L0.642857 4.37328C0.287872 4.37328 4.70509e-07 4.61801 4.44113e-07 4.91994Z" fill="currentcolor"/>--}}
{{--                            </svg>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                    <!-- Slider Controls End -->--}}
{{--                </div>--}}
{{--            </div><!--./testimonial-slider-->--}}
{{--        </div>--}}

{{--    </div>--}}
    <!-- Testimonial Section End -->


    <!-- Contact Section Start -->
    <div data-scroll-index="6" id="contact">

        <div class="contact-section px-5 py-8 md:p-8 bg-white dark:bg-nightBlack rounded-2xl lg:p-10 2xl:p-13">
            <div
                class="inline-flex items-center gap-2 px-4 py-2 text-xs tracking-wide text-black dark:text-white border lg:px-5 section-name border-platinum dark:border-greyBlack200 rounded-4xl">
                <i class="fal fa-envelope-open text-theme"></i>
                CONTACT
            </div>
            <div class="mb-10 mt-7 section-title">
                <h2
                    class="title text-[32px] md:text-4xl lg:text-5xl font-extralight text-black dark:text-white leading-1.27">
                    Contact <span class="font-semibold text-theme">Me.</span>
                </h2>
            </div><!--./section-title-->

            <div class="grid mt-8 mb-10 md:my-12 md:grid-cols-12" style="gap: 2rem">
                <div class="md:col-span-5">
                    <ul class="contact-info space-y-6 md:space-y-10 2xl:space-y-12 *:flex *:flex-wrap *:items-center *:gap-5">
                        <li>
                            <div class="flex justify-center w-12 icon">
                                <svg width="41" height="42" viewBox="0 0 41 42" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M31.6257 9.60099V6.29746H27.5763L20.6254 0.64209L13.6843 6.29746H9.62601V9.57337L0.300781 17.1443V40.133C0.300781 40.7549 0.806087 41.261 1.42707 41.261H39.7609C40.3819 41.261 40.8872 40.7549 40.8872 40.133V17.1447L31.6257 9.60099ZM40.2455 40.2187L26.9416 28.7431L40.2536 17.9864V40.1326C40.2536 40.1622 40.2504 40.1907 40.2455 40.2187ZM40.0832 17.308L31.6257 24.1422V10.4195L40.0832 17.308ZM20.6258 1.46056L26.5706 6.29746H14.6888L20.6258 1.46056ZM30.9913 6.93233V24.6548L26.4529 28.3214L20.6262 23.2957L14.7643 28.3186L10.26 24.6791V6.93233H30.9913ZM0.936777 40.1663C0.935965 40.1553 0.935153 40.1444 0.935153 40.133V17.96L14.274 28.7386L0.936777 40.1663ZM9.62601 24.1665L1.12185 17.295L9.62601 10.3906V24.1665ZM1.37877 40.6237L20.625 24.1328L39.7463 40.6257H1.42707C1.41083 40.6261 1.3946 40.6253 1.37877 40.6237ZM26.1534 13.8802H15.0979V13.2453H26.1534V13.8802ZM26.1534 20.2789H15.0979V19.6436H26.1534V20.2789Z"
                                        fill="#00BC91" />
                                    <path
                                        d="M30.9531 7.00537L31.0128 24.7123L31.6389 24.2046L31.6389 7.00537L30.9531 7.00537Z"
                                        fill="white" />
                                    <rect x="15.1133" y="13.2266" width="11.0781" height="0.685791"
                                          fill="white" />
                                    <rect x="9.625" y="6.3042" width="22.0156" height="0.700928"
                                          fill="white" />
                                    <path
                                        d="M10.3125 7.00488L10.2528 24.7118L9.62671 24.2041L9.62671 7.00488L10.3125 7.00488Z"
                                        fill="white" />
                                    <path d="M15.0547 19.6567H26.1328V20.27H15.0547V19.6567Z"
                                          fill="white" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h6 class="text-lg text-black dark:text-white">E-mail</h6>
                                <p class="text-sm">{{$settingData['email']}}</p>
                            </div>
                        </li>
                        <li>
                            <div class="flex justify-center w-12 icon">
                                <svg width="41" height="42" viewBox="0 0 41 42" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M28.7321 41.2896C28.9475 41.3359 29.1625 41.3587 29.3795 41.3587C31.885 41.3583 34.5278 38.3392 37.6673 34.4367C38.2236 33.7461 38.1415 32.7236 37.4767 32.0582L31.1742 25.7508C30.4817 25.0581 29.4031 25.0065 28.7163 25.6328C25.6475 28.4315 24.916 28.2488 23.6753 27.6103C19.528 25.4754 16.0691 22.0138 13.9367 17.864C13.2987 16.6231 13.1162 15.8902 15.9126 12.819C16.5381 12.1317 16.4865 11.0514 15.7948 10.3592L9.4919 4.05133C8.82743 3.38593 7.80574 3.30459 7.11608 3.86017C2.87895 7.27501 -0.315768 10.1013 0.26823 12.8032C2.72899 24.1841 17.3602 38.8269 28.7321 41.2896ZM29.2771 26.2486C29.6286 25.9289 30.2155 25.9692 30.5857 26.3397L36.8882 32.6471C37.2454 33.0051 37.3031 33.5614 37.019 33.9141C36.4137 34.6666 35.8221 35.3909 35.2449 36.0686L27.1619 27.9789C27.7588 27.5708 28.4449 27.0077 29.2771 26.2486ZM7.6379 4.5093C7.78827 4.38809 7.97562 4.32912 8.16907 4.32912C8.42876 4.32912 8.69861 4.43527 8.90343 4.64026L15.2063 10.9481C15.5765 11.3186 15.6176 11.9063 15.2973 12.2578C14.5389 13.0908 13.9762 13.7775 13.5686 14.3748L5.4852 6.28504C6.16231 5.7073 6.88601 5.11521 7.6379 4.5093ZM4.85451 6.83173L13.1231 15.1069C12.4931 16.3176 12.6377 17.1583 13.1962 18.2447C15.4075 22.5482 18.994 26.1371 23.2949 28.3513C24.38 28.9106 25.2204 29.0554 26.4304 28.4247L34.6986 36.6998C32.5226 39.1709 30.5677 40.8352 28.9085 40.4753C17.791 38.0675 3.48774 23.7529 1.08184 12.6267C0.722586 10.9658 2.38527 9.00967 4.85451 6.83173Z"
                                        fill="#00BC91" />
                                    <path
                                        d="M23.3107 1.37642C32.5978 1.37642 40.1532 8.93738 40.1532 18.231C40.1532 18.4612 40.3393 18.6475 40.5693 18.6475C40.7993 18.6475 40.9855 18.4612 40.9855 18.231C40.9855 8.4782 33.0566 0.543457 23.3107 0.543457C23.0807 0.543457 22.8945 0.729736 22.8945 0.95994C22.8945 1.19014 23.0807 1.37642 23.3107 1.37642Z"
                                        fill="white" />
                                    <path
                                        d="M23.3107 8.02633C28.9336 8.02633 33.5081 12.604 33.5081 18.231C33.5081 18.4612 33.6942 18.6475 33.9242 18.6475C34.1543 18.6475 34.3404 18.4612 34.3404 18.231C34.3404 12.1448 29.3925 7.19336 23.3107 7.19336C23.0807 7.19336 22.8945 7.37964 22.8945 7.60984C22.8945 7.84005 23.0807 8.02633 23.3107 8.02633Z"
                                        fill="white" />
                                    <path
                                        d="M22.8945 14.2597C22.8945 14.4899 23.0807 14.6762 23.3107 14.6762C25.2691 14.6762 26.8626 16.271 26.8626 18.2314C26.8626 18.4616 27.0488 18.6479 27.2788 18.6479C27.5088 18.6479 27.6949 18.4616 27.6949 18.2314C27.6949 15.8118 25.7284 13.8433 23.3107 13.8433C23.0807 13.8433 22.8945 14.0295 22.8945 14.2597Z"
                                        fill="white" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h6 class="text-lg text-black dark:text-white">Phone</h6>
                                <p class="text-sm">{{$settingData['phone']}}</p>
                            </div>
                        </li>
                    </ul>
                </div><!-- Contact info end -->

                <div class="md:col-span-7">
                    <ul class="contact-info space-y-6 md:space-y-10 2xl:space-y-12 *:flex *:flex-wrap *:items-center *:gap-5">
                        <li>
                            <div class="flex justify-center w-12 icon">
                                <svg width="29" height="42" viewBox="0 0 29 42" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21.9647 14.6023C21.9647 13.1428 21.5323 11.7161 20.7221 10.5026C19.9119 9.28904 18.7603 8.34321 17.4129 7.78469C16.0656 7.22617 14.5831 7.08003 13.1527 7.36476C11.7224 7.6495 10.4086 8.35231 9.3774 9.38432C8.3462 10.4163 7.64394 11.7312 7.35943 13.1627C7.07492 14.5941 7.22095 16.0778 7.77903 17.4262C8.33711 18.7746 9.28219 19.9271 10.4947 20.738C11.7073 21.5488 13.1329 21.9816 14.5912 21.9816C16.5461 21.9793 18.4203 21.2011 19.8026 19.8177C21.1849 18.4343 21.9624 16.5587 21.9647 14.6023ZM8.19081 14.6023C8.19081 13.3354 8.56618 12.097 9.26947 11.0436C9.97276 9.99021 10.9724 9.1692 12.1419 8.68439C13.3114 8.19957 14.5983 8.07272 15.8399 8.31988C17.0815 8.56703 18.2219 9.1771 19.117 10.0729C20.0121 10.9687 20.6217 12.1101 20.8687 13.3526C21.1156 14.5952 20.9889 15.8831 20.5045 17.0536C20.02 18.224 19.1997 19.2244 18.1471 19.9283C17.0946 20.6321 15.8571 21.0078 14.5912 21.0078C12.8943 21.0059 11.2674 20.3304 10.0675 19.1296C8.86764 17.9287 8.1927 16.3005 8.19081 14.6023ZM24.2873 33.543C22.5204 32.783 20.65 32.2913 18.738 32.0842C20.9575 29.4709 23.0322 26.7378 24.9528 23.8972C27.4103 20.1273 28.6053 17.0871 28.6053 14.6013C28.6053 10.8818 27.1289 7.31453 24.5008 4.68439C21.8728 2.05426 18.3084 0.57666 14.5917 0.57666C10.8751 0.57666 7.31067 2.05426 4.68261 4.68439C2.05455 7.31453 0.578125 10.8818 0.578125 14.6013C0.578125 17.0871 1.77411 20.1273 4.23066 23.8967C6.15138 26.7371 8.22592 29.4701 10.445 32.0837C8.54054 32.2902 6.67728 32.7786 4.9162 33.5329C2.63665 34.5891 2.15778 35.7693 2.15778 36.5736C2.15778 37.9338 3.51546 39.1671 5.98063 40.0466C8.76145 40.9426 11.6708 41.374 14.5917 41.3235C17.5127 41.3739 20.422 40.9425 23.2028 40.0466C25.6675 39.1671 27.0252 37.9338 27.0252 36.5736C27.0252 35.7741 26.5511 34.5963 24.2873 33.543ZM1.5507 14.6023C1.5507 11.141 2.92461 7.82145 5.37018 5.37394C7.81576 2.92644 11.1327 1.55144 14.5912 1.55144C18.0498 1.55144 21.3667 2.92644 23.8123 5.37394C26.2579 7.82145 27.6318 11.141 27.6318 14.6023C27.6318 19.8104 21.5983 27.1016 17.1932 32.4255C16.2503 33.5655 15.3514 34.6518 14.5912 35.6209C13.8311 34.6518 12.9322 33.5655 11.9893 32.4255C7.5842 27.1016 1.5507 19.8104 1.5507 14.6023ZM14.5912 40.3506C7.83727 40.3506 3.13083 38.3609 3.13083 36.5751C3.13083 35.8397 3.91014 35.0736 5.32475 34.4206C7.19133 33.6402 9.16768 33.1547 11.1832 32.9814L11.2396 33.0494C12.3399 34.3813 13.3833 35.64 14.2057 36.7134C14.2511 36.7728 14.3095 36.8209 14.3765 36.854C14.4435 36.8871 14.5172 36.9043 14.592 36.9043C14.6667 36.9043 14.7404 36.8871 14.8074 36.854C14.8744 36.8209 14.9328 36.7728 14.9783 36.7134C15.7997 35.64 16.8411 34.3818 17.9443 33.0494L18.0007 32.9814C20.0231 33.1548 22.0061 33.6433 23.8778 34.4292C25.2805 35.0827 26.0531 35.8454 26.0531 36.5774C26.0516 38.3609 21.3452 40.3506 14.5912 40.3506Z"
                                        fill="#00BC91" />
                                    <circle cx="14.5889" cy="14.6548" r="3.69277" stroke="white"
                                            stroke-width="0.7" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h6 class="text-lg text-black dark:text-white">Location</h6>
                                <p class="text-sm">{{$settingData['location']}}</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="md:col-span-7">
                <iframe class="w-full overflow-hidden border-10 border-platinum dark:border-greyBlack embed-map h-80 2xl:h-96 rounded-2xl"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4745.506443487842!2d89.5280721986589!3d22.829273579354975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff9abf6db51e6d%3A0x4a79c2fe31de9367!2sSonadanga%2C%20Khulna!5e0!3m2!1sen!2sbd!4v1745826324462!5m2!1sen!2sbd" aria-label="Contact Map">
                </iframe>
            </div>
        </div>

    </div>
    <!-- Contact Section End -->
@endsection

@push('front-script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const circles = document.querySelectorAll('.progress-circle');
            circles.forEach(circle => {
                const percentage = circle.getAttribute('data-percentage');
                const offset = 295 - (295 * percentage) / 100;
                setTimeout(() => {
                    circle.style.strokeDashoffset = offset;
                }, 300); // small delay for smoother animation
            });
        });
    </script>
@endpush

