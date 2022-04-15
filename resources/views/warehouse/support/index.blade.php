@extends('warehouse.layout.index')
@section('title', 'fcenter')
@section('content')
    <div class=" main-content flex-wrap flex-md-nowrap p-4 ">
        <div class=" mx-5">
            <div class="col-12 uppercol my-1" style="height:fit-content;">
                <p>Warehouse <span>/ Support</span></p>
                <div class="d-flex justify-content-between">
                    <h4 class="text-nowrap">Support</h4>
                    <div class="d-flex mx-2">
                        <!-- <a class="btn btn-secondary ticket-add rounded-pill px-4 py-2" style="white-space: pre">Add ticket</a> -->
                        <a class="btn btn-primary ticket-add px-4 py-2" data-bs-toggle="modal" href="#exampleModalToggle"
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
                            <h5 class="modal-title" id="exampleModalLabel">Support</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="
                                                                    float: right;    font-size: 10px;"></button>
                        </div>
                        <div class="modal-body" style="padding: 20px 30px;">
                            <form class="col-12">
                                <div class="my-3 col-12">
                                    <input type="text" class="form-control" placeholder="Heading" />
                                </div>
                                <div class="row mb-3 mx-0 px-0">
                                    <textarea placeholder="Description" style="height: 80px"></textarea>
                                </div>
                                <div class="input-group mb-4">
                                    <input type="file" class="form-control" id="inputGroupFile02">
                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                </div>
                            </form>
                        </div>
                        <div class="container row">
                            <div class="mb-3 col-9">
                                <a href="#"
                                    class="btn btn-primary allocate-permission rounded-pill px-3 px-sm-5 pt-0 fs-4 py-0 my-2"
                                    style="
                                                                            padding: 5px 20px !important;font-size: 15px !important;float: right;background: #000 !important;color: #fff !important;">Cancel</a>
                            </div>
                            <div class="mb-3 col-3">
                                <a href="#"
                                    class="btn btn-primary allocate-permission rounded-pill px-3 px-sm-5 pt-0 fs-4 py-0 my-2"
                                    style="
                                                                            float: right;padding: 5px 20px !important;
                                                                            font-size: 15px !important;background: #0d6efd !important;
                                                                            color: #fff !important; border-color: #0d6efd !important; ">Save</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- model end-->

            <div class="col-12 mx-auto mt-5">
                <table class="table bg-white custab">
                    <thead class="text-center">
                        <tr>
                            <th>Ticket ID</th>
                            <th>User</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->warehouse->name }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->status_format }}</td>
                                <td class="text-center">
                                    <a href="#" onclick="fetchview({{ $item->id }})" class="btn view px-3 py-0"
                                        data-bs-toggle="modal" data-bs-target="#sview">View</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">not data found</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="sview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
            style="    top: 174px;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> View Ticket </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="
                                                                        float: right; font-size: 10px;"></button>
                    </div>
                    <div class="modal-body px-5">
                        {{-- <form class="col-12">
                            <div class="form-group">
                                <label for="id">Ticket ID</label>
                                <p class="py-2" style="color:#c7c7c7;">2355163</p>
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
                            <!-- <div class="row mt-3">
                                                            <div class="col-md-3 col-4 col-sm-2">
                                                                <label for="inputbank name" class=""><b>Reply</b></label>
                                                            </div>
                                                            <div class="col-md-9 col-8 col-sm-2">
                                                                <p style="color:#c7c7c7;">Adipisci enim corrupti necessitatibus tenetur, porro quaeratAdipisci enim corrupti necessitatibus tenetur, porro quaeratAdipisci enim corrupti necessitatibus tenetur, porro quaerat</p>
                                                            </div>
                                                        </div> -->
                        </form> --}}
                    </div>
                    <div class="container row">
                        <div class="mb-3 col-9 ms-auto">
                            <a href="#" class="btn btn-primary allocate-permission px-3 px-sm-5 pt-0 fs-4 py-0 my-2"
                                style="
                                                                                padding: 5px 20px !important;font-size: 15px !important;float: right;">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- model end-->



        <!-- <div class="ticket-popup">
                                                    <form class="col-11">
                                                      <div class="my-3 col-12">
                                                        <input type="text" class="form-control" placeholder="Heading" />
                                                      </div>
                                                      <div class="row mb-3 mx-0 px-0">
                                                        <textarea placeholder="Description" style="height: 80px"></textarea>
                                                      </div>
                                                      <div class="input-group mb-4">
                                                        <input type="file" class="form-control" id="inputGroupFile02">
                                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                                      </div>
                                                      <div class="d-flex justify-content-between">
                                                        <a href="#" class="btn btn-primary ticket-permission rounded-pill px-3 px-sm-5 pt-0 fs-4 py-0">Save</a>
                                                        <a href="#" class="btn btn-primary ticket-permission rounded-pill px-3 px-sm-5 pt-0 fs-4 py-0">Cancel</a>
                                                      </div>
                                                    </form>
                                                  </div> -->
    </div>

@endsection

@push('js')
    <script>
        function fetchview(id) {

            $.ajax({
                type: "get",
                url: "{{ route('warehouse.support.view') }}/" + id,
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
