@extends('frontend.layouts.app')

@section('title','Project Details')

@section('content')

    <!-- Project Details Section Start -->
    <div class="py-3.5 max-w-content xl:max-2xl:max-w-50rem max-xl:mx-auto xl:ml-auto">

        <div class="px-5 py-8 md:p-8 bg-white dark:bg-nightBlack rounded-2xl lg:p-10 2xl:p-13">
            <div
                class="inline-flex items-center gap-2 px-4 py-2 text-xs tracking-wide text-black dark:text-white border lg:px-5 section-name border-platinum dark:border-greyBlack200 rounded-4xl">
                <i class="fal fa-tasks-alt text-theme"></i>
                Project Details
            </div>

            <h2 class="text-2xl font-semibold leading-normal text-black dark:text-white mt-7 lg:mt-10 article-title lg:text-3xl lg:leading-normal">
                {{$projectsDetails->title}}
            </h2>
            <div class="mb-4 overflow-hidden mt-7 xl:my-8 thumb rounded-xl xl:rounded-2xl">
                <img src="{{asset('storage/'.$projectsDetails->img)}}" class="w-full"
                     alt=" {{$projectsDetails->title}}">
            </div>

            <div>
                <h3 class="mb-3 text-lg font-medium text-black dark:text-white xl:text-2xl">Project Description</h3>
                <p class="text-regular !leading-[2]">
                    {!! $projectsDetails->description !!}
                </p>

                <div class="grid gap-5 my-8 sm:grid-cols-2 md:gap-8">
                    @foreach($projectsDetails->images as $img)
                        <div class="aspect-[16/9] overflow-hidden rounded-xl xl:rounded-2xl">
                            <img src="{{ asset('storage/'.$img->image) }}"
                                 alt="{{ $projectsDetails->title }}"
                                 class="w-full h-full object-cover">
                        </div>
                    @endforeach
                </div>

                <h3 class="mt-12 mb-10 text-2xl font-medium text-black dark:text-white">Technologies</h3>
                <div class="flex flex-wrap justify-start gap-8">
                    @foreach($projectsDetails->technology as $technology)
                        <div class="flex flex-col items-center w-24">
                            <div class="w-12 h-12 mb-2">
                                <img src="{{ asset('storage/'.$technology->skill->logo) }}" alt="{{ $technology->skill->name }}" class="w-full h-full object-contain">
                            </div>
                            <h5 class="text-center text-black dark:text-white text-sm">
                                {{ $technology->skill->name }}
                            </h5>
                        </div>
                    @endforeach
                </div>


                <div class="project-links d-flex align-items-center gap-5 mt-10">

                    @if($projectsDetails->live_url)
                        <!-- Live Demo -->
                        <a href="{{$projectsDetails->live_url}}" target="_blank"
                           class="text-decoration-none text-success d-flex align-items-center gap-2">
                            <i class="fas fa-external-link-alt fa-lg"></i>
                            <span>Live Demo</span>
                        </a>

                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    @endif

                    <!-- GitHub -->
                    @if($projectsDetails->repo_url)
                        <a href="{{$projectsDetails->repo_url}}" target="_blank" class="text-decoration-none text-dark d-flex align-items-center gap-2">
                            <i class="fab fa-github fa-lg"></i>
                            <span>GitHub</span>
                        </a>

                    @endif


                </div>


            </div>
        </div>

    </div>
    <!-- Project Details Section End -->

@endsection
