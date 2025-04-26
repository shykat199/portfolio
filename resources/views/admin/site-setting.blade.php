@extends('admin.layouts.app')

@section('title','Site Settings')

@push('style')
    <link href="{{asset('admin/assets/css/quill.snow.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('admin/assets/css/dropify.css')}}"/>
    <style>
        .dropify-wrapper {
            height: 265px !important;
        }
    </style>
@endpush

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2">
                    <h4 class="page-title mb-0 me-3">Site Settings</h4>

                </div>

                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">{{ env('APP_NAME') }}</a></li>
                        <li class="breadcrumb-item active">Site Settings</li>
                    </ol>
                </div>
            </div>

        </div><!--end col-->
    </div><!--end row-->

    @php
        $allSetting = getSettingsData(['name','country','city','phone','age','about_me1','about_me2','language','hobby','location','email','git','linkedin','whatsapp','point_value','experience','project_completed','img']);
    @endphp

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{route('update-setting')}}" id="myForm" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="inputEmail4">Name</label>
                                <input type="text" value="{{@getSiteSettingsData($allSetting,'name')}}" name="name" class="form-control" id="inputText"
                                       placeholder="Name">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="inputEmail4">Email</label>
                                <input type="text" value="{{@getSiteSettingsData($allSetting,'email')}}" name="email" class="form-control" id="inputText" placeholder="Email">
                            </div>

                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="inputEmail4">Address</label>
                                <input type="text" value="{{@getSiteSettingsData($allSetting,'location')}}" name="location" class="form-control" id="inputText" placeholder="Address">
                            </div>

                        </div>

                        <div class="row">

                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="inputEmail4">Country</label>
                                <input type="text" value="{{@getSiteSettingsData($allSetting,'country')}}" name="country" class="form-control" id="inputText"
                                       placeholder="Country">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="inputEmail4">City</label>
                                <input type="text" value="{{@getSiteSettingsData($allSetting,'city')}}" name="city" class="form-control" id="inputText" placeholder="City">
                            </div>

                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="inputEmail4">Age</label>
                                <input type="text" value="{{@getSiteSettingsData($allSetting,'age')}}" name="age" class="form-control" id="inputText" placeholder="Age">
                            </div>

                        </div>

                        <div class="row">

                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="inputEmail4">Phone</label>
                                <input type="text" value="{{@getSiteSettingsData($allSetting,'phone')}}" name="phone" class="form-control" id="inputText"
                                       placeholder="Phone">
                            </div>

                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="inputEmail4">Year Of Experience</label>
                                <input type="text" value="{{@getSiteSettingsData($allSetting,'experience')}}" name="experience" class="form-control" id="inputText"
                                       placeholder="Year Of Experience">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="inputEmail4">Project Completed</label>
                                <input type="text" value="{{@getSiteSettingsData($allSetting,'project_completed')}}" name="project_completed" class="form-control" id="inputText"
                                       placeholder="Project Completed">
                            </div>

                        </div>
                        <div class="row">

                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="inputEmail4">Git</label>
                                <input type="text" value="{{@getSiteSettingsData($allSetting,'git')}}" name="git" class="form-control" id="inputText"
                                       placeholder="Git">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="inputEmail4">Linkedin</label>
                                <input type="text" value="{{@getSiteSettingsData($allSetting,'linkedin')}}" name="linkedin" class="form-control" id="inputText" placeholder="Linkedin">
                            </div>

                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="inputEmail4">Whatsapp</label>
                                <input type="text" value="{{@getSiteSettingsData($allSetting,'whatsapp')}}" name="whatsapp" class="form-control" id="inputText" placeholder="Whatsapp">
                            </div>

                        </div>

                        <div class="row">

                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="inputEmail4">Language</label>
                                <input type="text" value="{{@getSiteSettingsData($allSetting,'language')}}" name="language" class="form-control" id="inputText"
                                       placeholder="Language">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="inputEmail4">Hobby</label>
                                <input type="text" value="{{@getSiteSettingsData($allSetting,'hobby')}}" name="hobby" class="form-control" id="inputText" placeholder="Hobby">
                            </div>

                        </div>

                        <div class="row">

                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">About Me 1</label>
                                <div id="editor1">

                                </div>
                            </div>
                            <input type="hidden" name="about_me1" id="contentInput1">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">About Me 2</label>
                                <div id="editor2">

                                </div>
                            </div>
                            <input type="hidden" name="about_me2" id="contentInput2">

                        </div>

                        <div class="row mt-5">
                            <div class="mt-3 col-md-6">
                                <label class="form-label" for="inputEmail4">Image</label>
                                <input type="file" name="img" class="dropify" id="img" accept="image/*" data-allowed-file-extensions="pdf png psd svg" data-default-file="{{ asset('storage/' . @getSiteSettingsData($allSetting,'img')) }}">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!--end col-->
    </div>

@endsection

@push('script')
    <script src="{{asset('admin/assets/js/quill.js')}}"></script>
    <script src="{{asset('admin/assets/js/dropify.min.js')}}"></script>

    <script>
        const quill = new Quill('#editor1', {
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

        document.getElementById('myForm').addEventListener('submit', function(e) {
            const content = quill.root.innerHTML;
            document.getElementById('contentInput1').value = content;
        });

        const dbContent1 = `{!! @getSiteSettingsData($allSetting,'about_me1')  !!}`;

        quill.root.innerHTML = dbContent1;

        const quill2 = new Quill('#editor2', {
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

        const dbContent2 = `{!! @getSiteSettingsData($allSetting,'about_me2')  !!}`;

        quill2.root.innerHTML = dbContent2;

        document.getElementById('myForm').addEventListener('submit', function(e) {
            const content = quill.root.innerHTML;
            document.getElementById('contentInput2').value = content;
        });

    </script>
    <script>
        $('.dropify').dropify({
            messages: {
                default: 'Choose file'
            },
        });

        $('#img').on('change', function (e) {
            const input = this;
            if (input.files && input.files[0]) {
                const file = input.files[0];
                const fileType = file.type;

                if (fileType === 'image/svg+xml') {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const dropifyWrapper = $(input).closest('.dropify-wrapper');
                        dropifyWrapper.find('.dropify-preview .dropify-render').html(`<img src="${e.target.result}" style="max-width: 100%; max-height: 100%;">`);
                        dropifyWrapper.addClass('has-preview');
                    };
                    reader.readAsDataURL(file);
                }
            }
        });

    </script>

    <script>
        $(document).ready(function () {
            const $input = $('#img');
            const defaultFile = $input.attr('data-default-file');

            // Initialize dropify
            const drEvent = $input.dropify().data('dropify');

            // If default file is SVG, handle manually
            if (defaultFile && defaultFile.endsWith('.svg')) {
                // Wait a moment to ensure Dropify has initialized
                setTimeout(function () {
                    const wrapper = $input.closest('.dropify-wrapper');
                    wrapper.find('.dropify-render').html('<img src="' + defaultFile + '" style="max-width: 100%; max-height: 100%;">');
                    wrapper.addClass('has-preview');
                }, 200); // Delay ensures DOM is ready
            }

            // Also handle preview after file change (upload)
            $input.on('change', function () {
                const file = this.files[0];
                if (file && file.type === 'image/svg+xml') {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const wrapper = $input.closest('.dropify-wrapper');
                        wrapper.find('.dropify-render').html('<img src="' + e.target.result + '" style="max-width: 100%; max-height: 100%;">');
                        wrapper.addClass('has-preview');
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>

    <script>
        document.getElementById('imageUpload1').addEventListener('change', function(event) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profileImage1').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endpush
