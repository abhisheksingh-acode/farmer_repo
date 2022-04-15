@extends('admin.layout.layout')
@section('title', 'fcenter')
@section('content')
    <div class=" main-content flex-wrap flex-md-nowrap p-4 ">
        <div class=" mx-5">
            <div class="col-12 uppercol my-1" style="height:fit-content;">
                <p>Support <span>/ Farmer Support</span></p>
                <div class="d-flex justify-content-between">
                    <h4 class="text-nowrap">Farmer Support</h4>
                </div>
            </div>

            <div class="col-12 mx-auto">
                @include('admin.include.fail')
                @include('admin.include.success')
                <table class="table bg-white custab mt-4">
                    <thead class="text-center">
                        <tr>
                            <th>Ticket ID</th>
                            <th>User</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr class="text-center">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->farmer->name }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->status_format }}</td>
                                <td class="text-center">
                                    <a href="#" onclick="fetchview({{ $item->id }})" class="btn btn-info view px-3 py-0"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal">View</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">no tickets available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
            style="top: 17%;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="padding-left: 30px;">
                        <h5 class="modal-title" id="exampleModalLabel">Farmer Support</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            style="float: right;font-size: 10px;"></button>
                    </div>
                    <div class="modal-body" style="padding: 20px 30px;">
                        {{-- {{paste data here }} --}}
                    </div>
                    <div class="container row">
                        <div class="mb-3 col-9">
                            <a href="#" class="btn btn-primary allocate-permission px-3 px-sm-5 pt-0 fs-4 py-0 my-2"
                                style="padding: 5px 20px !important;font-size: 15px !important;float: right;background: #000 !important;color: #fff !important;">Cancel</a>
                        </div>
                        <div class="mb-3 col-3">
                            <button type="submit" form="reply-form" class="btn btn-primary rounded-pill px-3"
                                form="ticket-form">Reply</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    @endsection


    @push('js')
        <script>
            function fetchview(id) {

                $.ajax({
                    type: "get",
                    url: "{{ route('admin.support.edit') }}/" + id,
                    success: function(data) {
                        loadview(data);
                    },
                    error: function(err) {
                        console.log(err);
                    }
                })

            }

            function loadview(data) {
                $("#exampleModal .modal-body").html(data);
            }
        </script>
    @endpush
