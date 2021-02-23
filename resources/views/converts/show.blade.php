@extends('layouts.app')

@section('content')
    <!--Container-->
    <div class="container w-full md:w-12/12 xl:w-12/12 mx-auto py-6">
        <div class="bg-gray-800 rounded-t-md justify-center p-4 ">
            <p class="text-2xl text-white font-bold text-center">VIEW CONVERT </p>
        </div>
        <!--Card-->
        <div id='recipients' class="px-3 py-6 rounded-b-md shadow bg-white">

            <table id="converts-table" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th data-priority="1">ID</th>
                        <th data-priority="1">Name</th>
                        <th data-priority="2">Name known and called at home</th>
                        <th data-priority="3">Phone Number</th>
                        <th data-priority="4">Gender</th>
                        <th data-priority="5">Marital Status</th>
                        <th data-priority="6">Age</th>
                        <th data-priority="7">Residential Address</th>
                        <th data-priority="8">Nearest bus stop</th>
                        <th data-priority="9">Email Address</th>
                        <th data-priority="10">Business or office address</th>
                        <th data-priority="11">Want to continue worshipping?</th>
                        <th data-priority="12">Prayer Request</th>
                        <th data-priority="13">Date</th>
                        <th data-priority="14">Follow-up Status</th>
                        <th data-priority="15">Created At</th>
                        <th data-priority="16">Updated At</th>
                        <th data-priority="17">Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>

            </table>
        </div>
        <!--/Card-->
    </div>
    <!--/container-->

    <!-- Edit Follow-up Status Modal -->
    <div id="EditStatusModal"
        class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center edit">
        <div onclick="toggleModal()" class="modal-overlay absolute w-full h-full bg-gray-800 opacity-50"></div>

        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

            <div
                class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                    viewBox="0 0 18 18">
                    <path
                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                    </path>
                </svg>
                <span class="text-sm">(Esc)</span>
            </div>

            <!-- Add margin if you want to see some of the overlay behind the modal-->
            <div class="modal-content text-left">
                <!--Title-->
                <div class="flex justify-between items-center px-4 py-2 bg-gray-800">
                    <p class="text-2xl font-bold text-white">Edit Converts Details</p>
                    <div onclick="toggleModal()" class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>

                <!--Body-->
                <div class="m-5">
                    <label for="role" class="sr-only">Update Follow-up Status</label>
                    <div id="EditConvertModalBody">
                    </div>
                    <div class="bg-green-500 text-white my-3 p-2 text-lg rounded-md" id="alert-success"
                        style="display: none;" role="alert">
                        <strong>Follow Up Status Updated Successfully</strong>
                    </div>
                </div>

                <!--Footer-->
                <div class="flex justify-start pt-2 m-5">
                    <button id="updateStatus" class="py-3 px-4 bg-green-500 rounded hover:bg-green-400 mr-2">Update</button>
                    {{-- <button onclick="toggleModal()"
                        class="modal-close px-4 bg-gray-500 p-3 rounded-lg text-white hover:bg-gray-500">Close</button> --}}
                </div>

            </div>
        </div>
    </div>

    <!-- Delete Convert Modal -->
    <div id="DeleteModal"
        class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center delete">
        <div onclick="toggleDeleteModal()" class="modal-overlay absolute w-full h-full bg-gray-800 opacity-50"></div>

        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

            <div
                class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                    viewBox="0 0 18 18">
                    <path
                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                    </path>
                </svg>
                <span class="text-sm">(Esc)</span>
            </div>

            <!-- Add margin if you want to see some of the overlay behind the modal-->
            <div class="modal-content text-left">
                <!--Title-->
                <div class="flex justify-between items-center px-4 py-2 bg-gray-800">
                    <p class="text-2xl font-bold text-white">Delete Converts</p>
                    <div onclick="toggleDeleteModal()" class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>

                <!--Body-->
                <div class="m-5">
                    <h4>Are you sure want to delete this Article?</h4>
                    <div class="bg-green-500 text-white my-3 p-2 text-lg rounded-md" id="alert-success"
                        style="display: none;" role="alert">
                        <strong>Convert Deleted Successfully</strong>
                    </div>
                </div>

                <!--Footer-->
                <div class="flex justify-end pt-2 m-5">
                    <button id="deleteConvert" class="py-2 px-4 bg-green-500 rounded hover:bg-green-600 mr-2">Yes</button>
                    <button onclick="toggleDeleteModal()"
                        class="modal-close py-2 px-4 bg-red-500 rounded text-white hover:bg-red-600">No</button>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <!--Datatables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js">
    </script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
            //init datatable
            var table = $('#converts-table').DataTable({
                responsive: true,
                // processing: true,
                serverSide: true,
                ajax: {
                    "url": "{{ route('getConverts') }}",
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    }, {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'known_name',
                        name: 'known_name'
                    },
                    {
                        data: 'phone_no',
                        name: 'phone_no'
                    },
                    {
                        data: 'sex',
                        name: 'sex'
                    },
                    {
                        data: 'marital_status',
                        name: 'marital_status'
                    },
                    {
                        data: 'age',
                        name: 'age'
                    },
                    {
                        data: 'residential_address',
                        name: 'residential_address'
                    },
                    {
                        data: 'nearest_bustop',
                        name: 'nearest_bustop'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'office_address',
                        name: 'office_address'
                    },
                    {
                        data: 'prayer_request',
                        name: 'prayer_request'
                    },
                    {
                        data: 'want_to_worship',
                        name: 'want_to_worship'
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'follow_up_status',
                        name: 'follow_up_status'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                    },
                ]
            });

            // Get single article in EditModel
            var id;
            $('body').on('click', '#getEditdata', function(e) {
                // e.preventDefault();
                id = $(this).data('id');
                $.ajax({
                    url: "/getConvert/" + id + "/edit",
                    method: 'GET',
                    // data: {
                    //     id: id,
                    // },
                    success: function(result) {
                        console.log(id);
                        console.log(result);
                        $('#EditConvertModalBody').html(result.html);
                        $('#EditConvertModalBody').show();
                    }
                });
            });

            // Update follow-up status AJAX request
            $('#updateStatus').click(function(e) {
                e.preventDefault();
                console.log(id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "/updateConvert/" + id,
                    method: 'PUT',
                    data: {
                        follow_up_status: $('#follow_up_status').val(),
                    },
                    success: function(result) {
                        $('#alert-success').show();
                        $('#converts-table').DataTable().ajax.reload();
                        setInterval(function() {
                            $('#alert-success').hide();
                            $('#EditStatusModal').hide();
                            location.reload();
                        }, 1000);
                    }
                });
            });

            // Update follow-up status AJAX request
            var deleteID;
            $('body').on('click', '#getDeleteID', function() {
                deleteID = $(this).data('id');
            })
            $('#deleteConvert').click(function(e) {
                e.preventDefault();
                var id = deleteID;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "/deleteConvert/" + id,
                    method: 'DELETE',
                    success: function(result) {
                        setInterval(function() {
                            $('.datatable').DataTable().ajax.reload();
                            $('#DeleteArticleModal').hide();
                            location.reload();
                        }, 1000);
                    }
                });
            });
        });

    </script>
    <script>
        document.onkeydown = function(evt) {
            evt = evt || window.event
            var isEscape = false
            if ("key" in evt) {
                isEscape = (evt.key === "Escape" || evt.key === "Esc")
            } else {
                isEscape = (evt.keyCode === 27)
            }
            if (isEscape && document.body.classList.contains('modal-active') && document.body.classList.contains(
                    'edit')) {
                toggleModal()
            } else if (isEscape && document.body.classList.contains('modal-active') && document.body.classList.contains(
                    'delete')) {
                toggleDeleteModal()
            }
        };

        function toggleModal() {
            const body = document.querySelector('body')
            const modal = document.querySelector('.modal.edit')
            modal.classList.toggle('opacity-0')
            modal.classList.toggle('pointer-events-none')
            body.classList.toggle('modal-active')
        }

        function toggleDeleteModal() {
            const body = document.querySelector('body')
            const modal = document.querySelector('#DeleteModal.delete')
            modal.classList.toggle('opacity-0')
            modal.classList.toggle('pointer-events-none')
            body.classList.toggle('modal-active')

        }

    </script>
@endsection
