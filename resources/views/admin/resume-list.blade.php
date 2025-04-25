@extends('admin.layouts.app')

@section('title','My Resumes')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2">
                    <h4 class="page-title mb-0 me-3">Resume List</h4>

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fas fa-plus"></i> Add New Resume
                    </button>
                </div>

                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">{{ env('APP_NAME') }}</a></li>
                        <li class="breadcrumb-item active">Resume List</li>
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
                                <th>File</th>
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
                    <h5 class="mb-2">Upload Resume (PDF Only)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row" id="action_modal">
                        <form method="post" action="{{route('create-resume')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="pdfFile" class="form-label">Select PDF File</label>
                                <input class="form-control" type="file" id="pdfFile" name="file" accept="application/pdf" required>
                            </div>
                            @error('file') <span class="text-danger">{{$message}}</span> @enderror

                            <div class="mb-3">
                                <iframe id="pdfPreview" style="width: 100%; height: 500px;" class="border d-none"></iframe>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
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
                    <h5 class="mb-2">Upload Resume (PDF Only)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form id="pdfForm" method="post" action="{{ route('update-resume') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" class="form-control"  id="resumeId" name="id" >

                        <div class="mb-3">
                            <label for="pdfFile2" class="form-label">Select PDF File</label>
                            <input class="form-control" type="file" id="pdfFile2" name="file" accept="application/pdf" required>
                            @error('file') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <iframe id="pdfPreview2" style="width: 100%; height: 500px;" class="border d-none"></iframe>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
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
                    url: '{{ route("resume-list") }}',
                    type: 'GET',
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'preview', name: 'preview'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'status', name: 'status',orderable: false, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                columnDefs: [
                    {
                        targets: 2,
                        render: function(data, type, row) {
                            return type === 'display' ? moment(data).format('DD-MMM-YYYY') : data;
                        }
                    },
                    {
                        targets: 3,
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
            const resumeId = checkbox.getAttribute('data-id');
            const newStatus = checkbox.checked ? '{{ ACTIVE_STATUS }}' : '{{ INACTIVE_STATUS }}';


            $.ajax({
                url: '{{ route("update-resume-status") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    portfolio_id: resumeId,
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
        document.getElementById('pdfFile').addEventListener('change', function (event) {
            const file = event.target.files[0];
            const preview = document.getElementById('pdfPreview');

            if (file && file.type === 'application/pdf') {
                const fileURL = URL.createObjectURL(file);
                preview.src = fileURL;
                preview.classList.remove('d-none');
            } else {
                preview.src = '';
                preview.classList.add('d-none');
                alert('Please upload a valid PDF file.');
                event.target.value = ''; // Reset the input
            }
        });

    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const exampleModal = document.getElementById('exampleModal2');
            const previewFrame = document.getElementById('pdfPreview2');
            const fileInput = document.getElementById('pdfFile2');
            const resumeId = document.getElementById('resumeId');

            // When the modal opens, show existing PDF preview from data-fileUrl
            exampleModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                const fileUrl = button.getAttribute('data-fileUrl');
                resumeId.value = button.getAttribute('data-id');

                if (fileUrl) {
                    previewFrame.src = fileUrl;
                    previewFrame.classList.remove('d-none');
                } else {
                    previewFrame.src = '';
                    previewFrame.classList.add('d-none');
                }

                // Clear the file input every time modal opens
                fileInput.value = '';
            });

            // When new file is selected, update the preview
            fileInput.addEventListener('change', function (event) {
                const file = event.target.files[0];

                if (file && file.type === 'application/pdf') {
                    const fileURL = URL.createObjectURL(file);
                    previewFrame.src = fileURL;
                    previewFrame.classList.remove('d-none');
                } else {
                    previewFrame.src = '';
                    previewFrame.classList.add('d-none');
                    alert('Only PDF files are allowed.');
                    fileInput.value = '';
                }
            });
        });
    </script>


@endpush
