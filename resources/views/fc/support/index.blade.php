@extends('fc.layout.index')
@section('title', 'fcenter')
@section('content')
    <div class=" main-content flex-wrap flex-md-nowrap p-4 ">
        <div class=" mx-5">
            <div class="col-12 uppercol mt-5">
                <!-- <p>Logistics <span>/ Support</span></p> -->
                <div class="d-flex justify-content-between">
                    <h4>Support</h4>
                    <div class="d-flex ">
                        <a class="btn btn-secondary px-3 py-2" data-bs-toggle="modal" href="#exampleModalToggle"
                            role="button">Add Ticket</a>
                    </div>
                </div>
            </div>

            <!-- model start-->
            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
                tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header" style="padding-left: 30px;">
                            <h5 class="modal-title" id="exampleModalLabel">Add ticket</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                style="float: right;font-size: 10px;"></button>
                        </div>
                        <div class="modal-body" style="padding: 20px 30px;">
                            <form action="{{ route('fcenter.support.create') }}" enctype="multipart/form-data"
                                method="POST" class="col-12" id="ticket-form">
                                @csrf

                                <div class="row mb-3 mx-0 px-0">
                                    <textarea class="form-control" required placeholder="your query or issue describe here" name="query"
                                        style="height: 80px"></textarea>
                                </div>
                                <div class="input-group mb-4">
                                    <input type="file" name="file" class="form-control" id="inputGroupFile02">
                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                </div>
                            </form>
                        </div>
                        <div class="container row align-items-center">
                            <div class="mb-3 col-9">
                                <a href="#"
                                    class="btn btn-primary allocate-permission rounded-pill px-3 px-sm-5 pt-0 fs-4 py-0 my-2"
                                    style="
                                                                                                                                                                                                                            padding: 5px 20px !important;font-size: 15px !important;float: right;background: #000 !important;color: #fff !important;">Cancel</a>
                            </div>
                            <div class="mb-3 col-3">
                                <button type="submit" class="btn btn-primary rounded-pill px-3"
                                    form="ticket-form">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- model end-->
        @include('admin.include.fail')
        @include('admin.include.success')
        <table class="table bg-white custab mt-5">
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
                        <td>{{ auth()->user()->name }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->status_format }}</td>
                        <td class="text-center">
                            <a href="#" onclick="fetchview({{ $item->id }})" class="btn btn-info view px-3 py-0"
                                data-bs-toggle="modal" data-bs-target="#sview">View</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">no tickets available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="sview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
            style="top: 174px;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> View Ticket </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            style="float: right; font-size: 10px;"></button>
                    </div>
                    <div class="modal-body px-5">
                        <form class="col-12">
                            <div class="form-group">
                                <label for="id">Ticket ID</label>
                                <p class="py-2" style="color:#c7c7c7;">2355163</p>
                            </div>
                            <div class="form-group">
                                <!-- <label for="exampleFormControlInput1">Ticket ID</label> -->
                                <h5 style="">Heading<p></p>
                                </h5>
                            </div>
                            <div class="form-group">
                                <label for="id">Description</label>
                                <p class="pt-2" style="color: #c7c7c7 !important;font-size: 14px;">Lorem ipsum
                                    dolor sit amet consectetur adipisicing elit. Adipisci enim corrupti necessitatibus
                                    tenetur, porro quaerat accusamus nemo in et blanditiis voluptatum quia ullam dolorem
                                    praesentium.</p>
                            </div>
                            <div class="form-group">
                                <label for="id">Reply</label>
                                <p class="pt-2" style="color:#c7c7c7;font-size: 14px;">Adipisci enim corrupti
                                    necessitatibus tenetur, porro quaeratAdipisci enim corrupti necessitatibus tenetur,
                                    porro quaeratAdipisci enim corrupti necessitatibus tenetur, porro quaerat</p>
                            </div>
                        </form>
                    </div>
                    <div class="container row">
                        <div class="mb-3 col-9 ms-auto">
                            <a href="#"
                                class="btn btn-primary allocate-permission rounded-pill px-3 px-sm-5 pt-0 fs-4 py-0 my-2"
                                style="padding: 5px 20px !important;font-size: 15px !important;float: right;">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- model end-->
    </div>


    </div>
    </div>

@endsection

@push('js')
    <script>
        function fetchview(id) {

            $.ajax({
                type: "get",
                url: "{{ route('fcenter.support.view') }}/" + id,
                success: function(data) {
                    console.log(data);
                    loadview(data);
                },
                error: function(err) {
                    console.log(err);
                }
            })

        }

        function loadview(data) {
            $("#sview .modal-body").html(data);
        }
    </script>
@endpush
