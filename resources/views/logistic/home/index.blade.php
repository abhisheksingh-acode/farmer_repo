@extends('logistic.layout.index')
@section('title', 'fcenter')
@section('content')
    <div class=" main-content flex-wrap flex-md-nowrap p-4 ">
        <div class=" mx-5">
            <div class="col-12 uppercol my-5 d-flex justify-content-between">
                <h4 class="text-nowrap">Logistics Pickup</h4>
                <div class="d-flex ms-2 mx-sm-5">
                    <a class="btn btn-primary ms-2" role="button">Print All</a>
                </div>
            </div>

            <!-- model start-->
            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
                tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header" style="padding-left: 30px;">
                            <h5 class="modal-title" id="exampleModalLabel">Logistics Pickup</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                style="
                                                                                                                                                                                                                            float: right;    font-size: 10px;"></button>
                        </div>
                        <div class="modal-body" style="padding: 20px 30px;">
                            <form class="col-12">
                                <div class="my-3 col-12">
                                    <input type="text" class="form-control" placeholder="Facilitator Center" />
                                </div>
                                <div class="my-3 col-12">
                                    <input type="text" class="form-control" placeholder="Warehouse" />
                                </div>
                                <div class="my-3 col-12">
                                    <input type="text" class="form-control" placeholder="Weight" />
                                </div>
                                <div class="my-3 col-12">
                                    <input type="text" class="form-control" placeholder="Type" />
                                </div>
                                <div class=" my-3 d-flex">
                                    <div class="col-5">
                                        <label>Pickup Time</label>
                                    </div>
                                    <div class="col-7">
                                        <input type="time" class="form-control" />
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="container row">
                            <div class="mb-3 col-9">
                                <a href="#" class="btn btn-primary allocate-permission px-3 px-sm-5 pt-0 fs-4 py-0 my-2"
                                    style="
                                                                                                                                                                                                                                    padding: 5px 20px !important;font-size: 15px !important;float: right;background: #000 !important;color: #fff !important;">Cancel</a>
                            </div>
                            <div class="mb-3 col-3">
                                <a href="#" class="btn btn-primary allocate-permission px-3 px-sm-5 pt-0 fs-4 py-0 my-2"
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


            <div class="col-12 mx-auto" id="navscroll">
                <div class="notify text-success"></div>
                <table class="table bg-white custab mt-5">
                    <thead class="text-center">
                        <tr>
                            <th class="text-nowrap">Facilitator Center</th>
                            <th class="text-nowrap">Warehouse</th>
                            <th class="text-nowrap">Weight</th>
                            <!-- <th class="text-nowrap">Type </th> -->
                            <th class="text-nowrap">9r No</th>
                            <th class="text-nowrap">Date</th>
                            <th class="text-nowrap">Action</th>
                            <th class="text-nowrap">Print</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($recent as $item)
                            <tr>
                                <td>{{ $item->fc->name }} - {{ $item->fc->address }}</td>
                                <td>{{ $item->warehouse->name }} - {{ $item->warehouse->address }}</td>
                                <td>{{ $item->nine_r }}</td>
                                <td>{{ $item->nr->qty_total }} ltr</td>
                                <td>{{ $item->created_at }}</td>
                                <td class="active text-center">
                                    <select class="form-select" onchange="pickup(this.value,{{ $item->id }})"
                                        name="status" aria-label="Default select example">
                                        <option value="">Open this select menu</option>
                                        <option value="1" {{ $item->status == 1 ? 'selected' : '' }}>Approved</option>
                                        <option value="2" {{ $item->status == 2 ? 'selected' : '' }}>Picked Up</option>
                                        <option value="3" {{ $item->status == 3 ? 'selected' : '' }}>Disapproved</option>
                                        <option value="4" {{ $item->status == 4 ? 'selected' : '' }}>Delivered</option>
                                    </select>
                                </td>
                                <td><a href="#"><i class="fa-solid fa-print"></i></a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">no data found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection


@push('js')
    <script>
        function pickup(val, id) {

            let token = "{{ csrf_token() }}";

            $.ajax({
                type: "post",
                url: "{{ route('logistic.update') }}/" + id,
                data: {
                    'status': val,
                    '_token': token
                },
                success: function(data) {
                    console.log(data);
                    $('.notify').html('order status changed to ' + data);
                },
                error: function(err) {
                    console.log(err);
                },
                complete: function() {}
            })
        }
    </script>
@endpush
