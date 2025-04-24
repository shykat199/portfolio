@extends('admin.layouts.app')

@section('title','Dashboard')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h4 class="page-title">Dashboard</h4>
                <div class="">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">{{env('APP_NAME')}}</a>
                        </li><!--end nav-item-->
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-3">
                    <div class="card report-card">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col">
                                    <p class="text-dark mb-0 fw-semibold">Total User</p>
                                    <h3 class="my-1 fs-20"></h3>
                                </div>
                                <div class="col-auto align-self-center">
                                    <div class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                        <i class="iconoir-user fs-4"></i>
                                    </div>
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div> <!--end col-->
                <div class="col-md-6 col-lg-3">
                    <div class="card report-card">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col">
                                    <p class="text-dark mb-0 fw-semibold">Total User</p>
                                    <h3 class="my-1 fs-20"></h3>
                                </div>
                                <div class="col-auto align-self-center">
                                    <div class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                        <i class="iconoir-user fs-4"></i>
                                    </div>
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div> <!--end col-->
                <div class="col-md-6 col-lg-3">
                    <div class="card report-card">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col">
                                    <p class="text-dark mb-0 fw-semibold">Total User</p>
                                    <h3 class="my-1 fs-20"></h3>
                                </div>
                                <div class="col-auto align-self-center">
                                    <div class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                        <i class="iconoir-user fs-4"></i>
                                    </div>
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div> <!--end col-->
                <div class="col-md-6 col-lg-3">
                    <div class="card report-card">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col">
                                    <p class="text-dark mb-0 fw-semibold">Total Inactive/Block User</p>
                                    <h3 class="my-1 fs-20"></h3>
                                </div>
                                <div class="col-auto align-self-center">
                                    <div class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                        <i class="iconoir-user fs-4"></i>
                                    </div>
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div> <!--end col-->

            </div><!--end row-->
        </div><!--end col-->
    </div><!--end row-->
@endsection

@push('script')


@endpush
