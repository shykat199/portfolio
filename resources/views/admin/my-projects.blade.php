@extends('admin.layouts.app')

@section('title','My Projects')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2">
                    <h4 class="page-title mb-0 me-3">All Projects</h4>

                    <a href="{{route('create-project')}}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add New Project
                    </a>
                </div>

                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">{{ env('APP_NAME') }}</a></li>
                        <li class="breadcrumb-item active">All Projects</li>
                    </ol>
                </div>
            </div>

        </div><!--end col-->
    </div><!--end row-->

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Created Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!--end col-->
    </div>

@endsection


@push('script')
    <script src="{{asset('admin/assets/js/moment.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ordering: true,
                searching: true,
                order: [[0, 'desc']],
                ajax: {
                    url: '{{ route("my-projects") }}',
                    type: 'GET',
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'img', name: 'img'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'status', name: 'status',orderable: false, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                columnDefs: [

                    {
                        targets: 3,
                        render: function(data, type, row) {
                            return type === 'display' ? moment(data).format('DD-MMM-YYYY') : data;
                        }
                    },
                    {
                        targets: 4,
                        render: function(data, type, row) {
                            if (type !== 'display') return row.status;

                            if (row.status == '{{ACTIVE_STATUS}}') {
                                return '<span class="badge bg-success">Active</span>';
                            } else if (row.status == '{{PENDING_STATUS}}') {
                                return '<span class="badge bg-warning">Pending</span>';
                            } else if (row.status == '{{INACTIVE_STATUS}}') {
                                return '<span class="badge bg-warning">Inactive</span>';
                            } else {
                                return '<span class="badge bg-danger">Delete</span>';
                            }
                        }
                    }
                ]
            });

            $(function() {
                showSwal = function(type,url) {
                    'use strict';
                    if (type === 'passing-parameter-execute-cancel') {
                        const swalWithBootstrapButtons = Swal.mixin({
                            customClass: {
                                confirmButton: 'btn btn-success',
                                cancelButton: 'btn btn-danger me-2'
                            },
                            buttonsStyling: false,
                        })

                        swalWithBootstrapButtons.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonClass: 'me-2',
                            confirmButtonText: 'Yes, delete it!',
                            cancelButtonText: 'No, cancel!',
                            reverseButtons: true
                        }).then((result) => {
                            if (result.value) {

                                window.location.href = url;
                                // swalWithBootstrapButtons.fire(
                                //     'Deleted!',
                                //     'Your file has been deleted.',
                                //     'success'
                                // ).then(() => {
                                //     window.location.href = url;
                                // });

                            } else if (
                                result.dismiss === Swal.DismissReason.cancel
                            ) {
                                swalWithBootstrapButtons.fire(
                                    'Cancelled',
                                    'Your imaginary file is safe :)',
                                    'error'
                                )
                            }
                        })
                    }
                }

            });

        });
    </script>
    <script>
        function toggleStatus(checkbox) {
            const projectId = checkbox.getAttribute('data-id');
            const newStatus = checkbox.checked ? '{{ ACTIVE_STATUS }}' : '{{ INACTIVE_STATUS }}';


            $.ajax({
                url: '{{ route("update-project-status") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    project_id: projectId,
                    status: newStatus
                },
                success: function(response) {
                    Swal.fire({
                        title: "Good job!",
                        text: "Status Has Been Changed!",
                        icon: "success"
                    });

                    setTimeout(function (){
                        location.reload(true);
                    },2000)
                },
                error: function(xhr) {
                    Swal.fire({
                        title: "Error",
                        text: "Some thing went wrong!",
                        icon: "error"
                    });
                }
            });
        }
    </script>

@endpush
