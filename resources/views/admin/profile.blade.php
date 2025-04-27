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
                    <h4 class="page-title mb-0 me-3">Profile</h4>

                </div>

                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">{{ env('APP_NAME') }}</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>

        </div><!--end col-->
    </div><!--end row-->

    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <div class="card"><!--end card-header-->
                <div class="card-body">
                    <form method="post" action="{{route('update-profile')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" name="email" value="{{auth()->user()->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Old Password</label>
                            <input type="password" name="old_pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        @error('old_pass') <span class="text-danger">{{$message}}</span> @enderror
                        <div class="mb-3">
                            <label for="exampleInputPassword1"  class="form-label">New Password</label>
                            <input type="password" name="new_pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        @error('new_pass') <span class="text-danger">{{$message}}</span> @enderror
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div><!--end card-body-->
            </div><!--end card-->
        </div>
    </div>

@endsection

@push('script')

@endpush
