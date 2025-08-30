@extends('auth.layouts.app')

@section('content')
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4 mx-auto">
                <div class="card">
                    <div class="card-body p-0 bg-black auth-header-box rounded-top">
                        <div class="text-center p-3">
                            <h4 class="mt-3 mb-1 fw-semibold text-white fs-18">Admin Dashboard.</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="my-4" method="post" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group mb-2">
                                <label class="form-label" for="username">Email</label>
                                <input type="text" class="form-control" id="username" name="email" placeholder="Enter username">
                            </div><!--end form-group-->
                            @error('email') <span class="text-danger">{{$message}}</span>  @enderror

                            <div class="form-group">
                                <label class="form-label" for="userpassword">Password</label>
                                <input type="password" class="form-control" name="password" id="userpassword" placeholder="Enter password">
                            </div><!--end form-group-->
                            @error('password') <span class="text-danger">{{$message}}</span>  @enderror

                            <div class="form-group row mt-3">

                                <div class="col-sm-6 ">
                                    <a href="auth-recover-pw.html" class="text-muted font-13"><i class="dripicons-lock"></i> Forgot password?</a>
                                </div><!--end col-->
                            </div><!--end form-group-->

                            <div class="form-group mb-0 row">
                                <div class="col-12">
                                    <div class="d-grid mt-3">
                                        <button class="btn btn-primary" type="submit">Log In <i class="fas fa-sign-in-alt ms-1"></i></button>
                                    </div>
                                </div><!--end col-->
                            </div> <!--end form-group-->
                        </form><!--end form-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->
        </div><!--end row-->
    </div>
@endsection
