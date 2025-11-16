@extends('admin.layouts.app')

@section('title','Update Experience')

@push('style')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
@endpush

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2">
                    <h4 class="page-title mb-0 me-3">Update Work Experience</h4>
                </div>

                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">{{ env('APP_NAME') }}</a></li>
                        <li class="breadcrumb-item active">Update Work Experience</li>
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
                        <form method="post" id="myForm" action="{{route('update-experience',$experience->id)}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Company Name</label>
                                        <input type="text" value="{{$experience->company_name}}" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter company name">
                                    </div>
                                    @error('name')<span class="text-danger">{{$message}}</span>  @enderror

                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Company Position</label>
                                        <input type="text" value="{{$experience->position}}" name="position" class="form-control" id="exampleInputPassword1" placeholder="Company Position">
                                    </div>
                                    @error('position')<span class="text-danger">{{$message}}</span>  @enderror

                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect1">Status</label>
                                        <select name="status" class="form-select" id="exampleFormControlSelect1">
                                            <option {{$experience->status == ACTIVE_STATUS ? 'selected':''}} value="{{ACTIVE_STATUS}}">Active</option>
                                            <option {{$experience->status == INACTIVE_STATUS ? 'selected':''}} value="{{INACTIVE_STATUS}}">Inactive</option>
                                        </select>
                                    </div>
                                    @error('status')<span class="text-danger">{{$message}}</span>  @enderror

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Start Date</label>
                                        <input type="date" value="{{ \Carbon\Carbon::parse($experience->start_date)->format('Y-m-d') }}" name="start_date" class="form-control" placeholder="Enter start date">
                                    </div>
                                    @error('status')<span class="text-danger">{{$message}}</span>  @enderror
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">End Date</label>
                                        <input type="date" value="{{ \Carbon\Carbon::parse($experience->end_date)->format('Y-m-d') }}" name="end_date" class="form-control" placeholder="Enter end date">
                                    </div>
                                    @error('end_date')<span class="text-danger">{{$message}}</span>  @enderror

                                    <div class="form-check mt-5">
                                        <input class="form-check-input" name="is_working" type="checkbox" {{$experience->is_working ? 'checked':''}} id="flexCheckDefault">
                                        <label class="form-label" for="flexCheckDefault">
                                            Currently working Hear?
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect1">Description</label>
                                        <div id="editor">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="description" id="contentInput">

                            <button type="submit" class="btn btn-primary">Update</button>

                        </form>
                    </div>

                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!--end col-->
    </div>

@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
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

        document.getElementById('myForm').addEventListener('submit', function(e) {
            const content = quill.root.innerHTML;
            document.getElementById('contentInput').value = content;
        });

        const dbContent = `{!! $experience->description ?? '' !!}`;

        quill.root.innerHTML = dbContent;

    </script>
@endpush
