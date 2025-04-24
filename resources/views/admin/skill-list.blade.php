@extends('admin.layouts.app')

@section('title','My Skills')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2">
                    <h4 class="page-title mb-0 me-3">Skill List</h4>

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fas fa-plus"></i> Add New Skill
                    </button>
                </div>

                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">{{ env('APP_NAME') }}</a></li>
                        <li class="breadcrumb-item active">Task List</li>
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
                                <th>Name</th>
                                <th>Logo</th>
                                <th>Percentage</th>
                                <th>Reg Date</th>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="action_modal_level">Create Skill</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row" id="action_modal">
                        <form method="post" action="{{route('add-skill')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Left side: All input fields -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Name</label>
                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="title" placeholder="Enter name">
                                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="slug" class="form-label">Percentage</label>
                                        <input  type="text" name="percentage" value="{{ old('percentage') }}" class="form-control" id="slug" placeholder="Title percentage">
                                        @error('percentage')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select name="status" class="form-select">
                                            <option value="{{ ACTIVE_STATUS }}">Active</option>
                                            <option value="{{ INACTIVE_STATUS }}">Inactive</option>
                                        </select>
                                        @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>

                                <!-- Right side: File uploader -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="inputEmail4">Skill Logo</label>
                                        <div>
                                            <img id="profileImage2" src="{{!empty($site_favicon) ? asset('/storage/'.$site_favicon) : asset('img/no-image.png')}}"
                                                 class="img-responsive" width="318" height="190">
                                            <div class="mt-2">
                                                <label class="btn btn-primary">
                                                    <i class="fas fa-upload"></i> Upload
                                                    <input type="file" id="imageUpload2" name="logo" style="display: none;" accept="image/*">
                                                </label>
                                            </div>
                                        </div>
                                        @error('logo')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="action_modal_level">Update Skill</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row" id="action_modal">
                        <form method="post" action="{{route('update-skill')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Left side: All input fields -->
                                <input type="hidden" name="id" value="" class="form-control" id="id" placeholder="Enter name">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Name</label>
                                        <input type="text" name="name" value="" class="form-control" id="name" placeholder="Enter name">
                                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="slug" class="form-label">Percentage</label>
                                        <input  type="text" name="percentage" value="" class="form-control" id="percentage" placeholder="Title percentage">
                                        @error('percentage')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select name="status" class="form-select" id="status">
                                            <option value="{{ ACTIVE_STATUS }}">Active</option>
                                            <option value="{{ INACTIVE_STATUS }}">Inactive</option>
                                        </select>
                                        @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>

                                <!-- Right side: File uploader -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="inputEmail4">Skill Logo</label>
                                        <div>
                                            <img id="profileImage3" src=""
                                                 class="img-responsive" width="318" height="190">
                                            <div class="mt-3">
                                                <label class="btn btn-primary">
                                                    <i class="fas fa-upload"></i> Upload
                                                    <input type="file" id="imageUpload3" name="site_favicon" style="display: none;" accept="image/*">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
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
                    url: '{{ route("skill-list") }}',
                    type: 'GET',
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'logo', name: 'logo'},
                    {data: 'percentage', name: 'percentage'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'status', name: 'status',orderable: false, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                columnDefs: [
                    {
                        targets: 4,
                        render: function(data, type, row) {
                            return type === 'display' ? moment(data).format('DD-MMM-YYYY') : data;
                        }
                    },
                    {
                        targets: 5,
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
        function toggleUserStatus(checkbox) {
            const skillId = checkbox.getAttribute('data-id');
            const newStatus = checkbox.checked ? '{{ ACTIVE_STATUS }}' : '{{ INACTIVE_STATUS }}';


            $.ajax({
                url: '{{ route("update-skill-status") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    skill_id: skillId,
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

        function updateModal(el) {
            const id = el.getAttribute('data-id');
            const name = el.getAttribute('data-name');
            const percentage = el.getAttribute('data-percentage');
            const status = el.getAttribute('data-status');
            const logo = el.getAttribute('data-logo');

            console.log(percentage)

            document.getElementById('id').value = id;
            document.getElementById('name').value = name;
            document.getElementById('percentage').value = percentage;
            document.getElementById('status').value = status;
            document.getElementById('profileImage3').src = logo;
        }
    </script>
    <script>
        document.getElementById('imageUpload2').addEventListener('change', function(event) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profileImage2').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
        document.getElementById('imageUpload3').addEventListener('change', function(event) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profileImage3').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>

@endpush
