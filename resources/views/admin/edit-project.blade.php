@extends('admin.layouts.app')

@section('title','Update Experience')

@push('style')
    <link href="{{asset('admin/assets/css/quill.snow.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/css/select2.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('admin/assets/css/dropify.css')}}"/>
    <style>
        .dropify-wrapper {
            height: 265px !important;
        }
        /* Dark theme fix for Select2 */
        .select2-container--default .select2-selection--multiple {
            background-color: #131621; /* Dark background */
            color: #fff; /* White text */
            border-color: #444;
        }

        .select2.select2-container.select2-container--default {
            width: 100% !important;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #2a2a3b;
            color: #fff;
            border-color: #444;
        }

        .select2-container--default .select2-results > .select2-results__options {
            background-color: #1e1e2d;
            color: #fff;
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #3a3a5a;
            color: white;
        }

    </style>
@endpush

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2">
                    <h4 class="page-title mb-0 me-3">Update Project</h4>
                </div>

                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">{{ env('APP_NAME') }}</a></li>
                        <li class="breadcrumb-item active">Update Project</li>
                    </ol>
                </div>
            </div>
        </div><!--end col-->
    </div><!--end row-->

    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <form method="post" id="myForm" action="{{route('update-project',$project->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Project Name</label>
                                        <input type="text" name="name" value="{{$project->title}}" class="form-control" id="exampleInputEmail1" placeholder="Enter project name">
                                    </div>
                                    @error('name')<span class="text-danger">{{$message}}</span>  @enderror

                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Slug</label>
                                        <input type="text" readonly value="{{$project->slug}}" name="slug" class="form-control" id="exampleInputPassword1" placeholder="Slug">
                                    </div>
                                    @error('slug')<span class="text-danger">{{$message}}</span>  @enderror

                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect1">Tech Stack</label> <br>
                                        <select name="tech_stack[]" class="form-select select2-without-search" multiple="multiple" id="exampleFormControlSelect1">
                                            @foreach($skills as $skill)
                                                <option value="{{ $skill->id }}" {{ in_array($skill->id, $selectedSkills) ? 'selected' : '' }}>
                                                    {{ $skill->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('tech_stack')<span class="text-danger">{{$message}}</span>@enderror

                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect1">Status</label>
                                        <select name="status" class="form-select" id="exampleFormControlSelect1">
                                            <option {{$project->status == ACTIVE_STATUS ?'selected':''}} value="{{ACTIVE_STATUS}}">Active</option>
                                            <option {{$project->status == INACTIVE_STATUS ?'selected':''}} value="{{INACTIVE_STATUS}}">Inactive</option>
                                        </select>
                                    </div>
                                    @error('status')<span class="text-danger">{{$message}}</span>  @enderror

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="live_url" class="form-label">Live Url</label>
                                            <input type="text" value="{{ $project->live_url }}" name="live_url" class="form-control" id="live_url" placeholder="Live Url">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="repo_url" class="form-label">Repository Url</label>
                                            <input type="text" value="{{ $project->repo_url }}" name="repo_url" class="form-control" id="repo_url" placeholder="Repository Url">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Featured Image</label>
                                        <input type="file" name="img" class="dropify" id="img" data-default-file="{{asset('storage/'.$project->img)}}" accept="image/*">
                                        @error('img')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect1">Description</label>
                                        <div id="editor">

                                        </div>
                                    </div>
                                    @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <input type="hidden" name="description" value="{{$project->description}}" id="contentInput">

                            </div>

                            <div class="row">
                                @for($i = 1; $i < 5; $i++)

                                    @php
                                        $existingImagePath = $existingImages[$i] ?? null;
                                    @endphp

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="image_{{ $i }}" class="form-label">Image {{ $i + 1 }}</label>
                                            <input
                                                type="file"
                                                name="image[{{ $i }}]"
                                                class="dropify"
                                                id="image_{{ $i }}"
                                                accept="image/*"
                                                @if($existingImagePath)
                                                    data-default-file="{{ asset('storage/' . $existingImagePath) }}"
                                                @endif
                                            >
                                        </div>
                                    </div>
                                @endfor
                            </div>


                            <button type="submit" class="btn btn-primary">Create</button>

                        </form>
                    </div>

                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!--end col-->
    </div>

@endsection

@push('script')
    <script src="{{asset('admin/assets/js/quill.js')}}"></script>
    <script src="{{asset('admin/assets/js/select2.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/dropify.min.js')}}"></script>

    <script>
        const quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline'],
                    ['image'], // Add image option
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'header': [1, 2, 3, false] }],
                    ['clean']
                ]
            }
        });


        const dbContent = `{!! $project->description ?? '' !!}`;

        quill.root.innerHTML = dbContent;

        document.getElementById('myForm').addEventListener('submit', function(e) {
            const content = quill.root.innerHTML;
            document.getElementById('contentInput').value = content;
        });

    </script>

    <script>
        $('.dropify').dropify({
            messages: {
                default: 'Choose file'
            },
        });
    </script>

    <script>
        $(document).ready(function () {
            $('input[name="name"]').on('input', function () {
                let title = $(this).val();
                let slug = title
                    .toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, '') // Remove non-alphanumeric chars
                    .replace(/\s+/g, '-')         // Replace spaces with dashes
                    .replace(/-+/g, '-');         // Replace multiple dashes with one
                $('input[name="slug"]').val(slug);
            });
        });
    </script>
    <script>
        $('.select2-without-search').select2({
            minimumResultsForSearch: Infinity
        });
    </script>

@endpush
