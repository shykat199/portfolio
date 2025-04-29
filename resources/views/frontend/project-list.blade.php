@extends('frontend.layouts.app')

@section('title','Project List')

@section('content')
    <!-- Blog Section Start -->
    <div class="py-5 xl:py-3.5 max-w-content xl:max-2xl:max-w-50rem max-xl:mx-auto xl:ml-auto">

        <div class="px-5 py-8 md:p-8 bg-white dark:bg-nightBlack rounded-2xl service-section lg:p-10 2xl:p-13">
            <div class="inline-flex items-center gap-2 px-4 py-2 text-xs tracking-wide text-black dark:text-white border lg:px-5 section-name border-platinum dark:border-greyBlack200 rounded-4xl">
                <i class="fal fa-blog text-theme"></i>
                MY Projects
            </div>
            <div class="mt-5 mb-8 md:my-10 section-title">
                <h2
                    class="title text-[32px] md:text-4xl lg:text-5xl font-extralight text-black dark:text-white leading-1.27">
                    Latest <span class="font-semibold text-theme">Insights</span>
                </h2>
                <p class="mt-4 md:mt-6 subtitle">
                    Here are some of the featured projects I've worked on, showcasing my skills, creativity, and commitment to delivering high-quality results.
                </p>
            </div>

            <div class="blog-list grid grid-cols-1 md:grid-cols-2 gap-7.5 *:overflow-hidden *:bg-flashWhite dark:*:bg-metalBlack *:items-center *:rounded-2xl">

                @foreach($projects as $project)
                    <div class="article group">

                        <div class="flex col-span-12 overflow-hidden thumbnail sm:col-span-6 md:col-span-5">
                            <a href="{{route('project-details',$project->slug)}}" class="block w-full overflow-hidden rounded-xl">
                                <img src="{{asset('storage/'.$project->img)}}"
                                     class="object-cover object-center w-full h-full min-h-[288px] max-h-60 md:min-h-60 transition-all duration-300 ease-in-out group-hover:scale-105"
                                     alt="Post Title">
                            </a>
                        </div>

                        <div class="relative flex flex-col col-span-12 p-5 post-content sm:col-span-6 md:col-span-7">
                            <div class="post-title mt-3 md:mt-4.5 mb-6 md:mb-8">
                                <a href="{{route('project-details',$project->slug)}}"
                                   class="text-xl font-semibold leading-normal text-black dark:text-white transition-colors line-clamp-2 2xl:text-2xl 2xl:leading-normal hover:text-theme">
                                    {{$project->title}}
                                </a>
                                @php
                                    $limitedText = \Illuminate\Support\Str::limit(strip_tags($project->description), 150, '.....');
                                @endphp
                                <p class="mt-4 md:mt-6 subtitle">
                                    {!! $limitedText !!}
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
        </div>
    </div>
    <!-- Blog Section End -->
@endsection
