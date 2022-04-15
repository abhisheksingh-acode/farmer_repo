@extends('admin.layout.layout')
@section('title', 'create farmer')
@section('content')
    <div class=" main-content flex-wrap flex-md-nowrap p-4 ">
        <div class=" mx-5">
            <div class="col-12 uppercol mt-5">
                <p>Order <span>/ All Order</span></p>
                <div class="d-flex justify-content-between">
                    <h4>All Order</h4>
                    <div class="d-flex ">
                        <a href="{{ route('admin.order.create') }}" class="btn btn-secondary px-3 py-2">Add new order</a>
                    </div>
                </div>
            </div>

            <!--filter start -->
            <div class="accordion accordion-flush mt-5" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Filter
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="col-12 mb-2">
                                <form class="row" action="{{ route('admin.order.index') }}" method="post">
                                    @csrf
                                    <div class="col-md-4 col-12 my-3">
                                        <input type="text" name="search" class="form-control"
                                            placeholder="Search by name/sc no./product">
                                    </div>
                                    <div class="col-md-4 col-12 my-3">
                                        <input type="date" name="date" class="form-control">
                                    </div>
                                    <div class="col-md-4 col-12 my-3">
                                        <select class="form-select">
                                            <option selected>Payment mode</option>
                                            <option value="1">All</option>
                                            <option value="cash">Cash</option>
                                            <option value="online">online</option>
                                        </select>
                                    </div>

                                    <div class="col-12 mb-2 d-flex mx-auto">
                                        <form class="row">

                                            <div class="col-md-3 col-12 my-3 ms-4">
                                                <select class="form-select">
                                                    <option selected>Facilitator center</option>
                                                    <option value="1">F.C 1</option>
                                                    <option value="2">F.C 2</option>
                                                    <option value="2">F.C 3</option>
                                                    <option value="2">F.C 4</option>
                                                    <option value="2">F.C 5</option>
                                                    <option value="2">F.C 6</option>
                                                </select>
                                            </div>

                                        </form>

                                    </div>
                                    <div class="col-md-3 col-8 my-md-3 mx-auto">
                                        <button type="submit" class="btn btn-primary col-12 mb-3">Filter</button>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--filter end -->


            {{-- <div class="col-12 mx-auto overflow-auto mt-4">
                <!-- <div class="col-md-1 col-4 "> -->
                <!-- <a type="submit" class="btn btn-primary niner px-3" style="white-space:pre;">Create 9R</a> -->
                <!-- <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button" style="width: 160px;">Create 9R</a> -->
                <!-- </div> -->
                <!-- model start-->
                <div class="modal fade" id="exampleModalToggle" aria-hidden="true"
                    aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header" style="padding-left: 30px;">
                                <h5 class="modal-title" id="exampleModalLabel">Create 9R</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    style="
                                                                    float: right;    font-size: 10px;"></button>
                            </div>
                            <div class="modal-body" style="padding: 20px 30px;">
                                <form class="col-12">
                                    <div class="my-3 col-12">
                                        <input type="text" class="form-control" placeholder="Source">
                                    </div>
                                    <div class="mb-3 col-12 ">
                                        <input type="text" class="form-control" placeholder="Destination">
                                    </div>
                                    <div class="my-3 col-12">
                                        <input type="text" class="form-control" placeholder="Quantity">
                                    </div>
                                    <div class="row col-12 mx-0 mb-3 ">
                                        <div class="col-3 px-0 mt-1 mx-0 text-center">
                                            <p>Pickup Date</p>
                                        </div>
                                        <div class="col-9 px-0 mx-0">
                                            <input type="date" class="form-control">
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
        </div> --}}
            <!-- model end-->

        </div>

        <table class="table bg-white custab mt-5">
            <thead class="text-center">
                <tr>
                    <th></th>
                    <th>S.C. no.</th>
                    <th>Farmer ID</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Quantity Received</th>
                    <th>6R</th>
                    <th>Quality</th>
                    <th>Tax</th>
                    <th>Payment Mode</th>
                    <th>Details</th>
                    <th>Print</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                    <tr class="text-center">
                        <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                        <td>{{ $item->sc_number }}</td>
                        <td>{{ $item->sc_order->farmer->id }}</td>
                        <td>{{ $item->sc_order->farmer->name }}</td>
                        <td>{{ $item->g_qty }}</td>
                        <td>{{ $item->r_qty }}</td>
                        <td>{{ $item->six_r }}</td>
                        <td>
                            @if ($item->quality)
                                <i class="fa-solid fa-circle-check text-success"></i>
                            @else
                                <i class="fa-solid fa-circle-xmark text-danger"></i>
                            @endif
                        </td>
                        <td>
                            @if ($item->tax)
                                <i class="fa-solid fa-circle-check text-success"></i>
                            @else
                                <i class="fa-solid fa-circle-xmark text-danger"></i>
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-primary px-0 py-0">{{ $item->mode }}</button>
                        </td>
                        <td><a class="btn btn-info view px-0 py-0" id="{{ $item->id }}" data-bs-toggle="modal"
                                href="#view" onclick="getview(this.id)" role="button" style="width: 80px;">View</a></td>
                        <td><a href="javascript:void(0)"><i class="fa-solid fa-print"></i></a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="12">no data found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>


        <!-- model view start-->
        <div class="modal fade" id="view" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header" style="padding-left: 30px;">
                        <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            style="
                                                                                                                                                                                                                                                                                                                float: right;    font-size: 10px;"></button>
                    </div>
                    <div class="modal-body" id="viewModal" style="padding: 20px 30px;">
                        {{-- paste here form view --}}
                    </div>
                    <div class="container row">
                        <div class="mb-3 col-9">
                            <a href="#" class="btn btn-primary allocate-permission px-3 px-sm-5 pt-0 fs-4 py-0 my-2"
                                style="
                                                                                                                                                                                                                                                                                                                        padding: 5px 20px !important;font-size: 15px !important;float: right;background: #000 !important;color: #fff !important;">Cancel</a>
                        </div>
                        <!-- <div class="mb-3 col-3">
                                                                                                                                                                                                                                                                                                                    <a href="#" class="btn btn-primary allocate-permission rounded-pill px-3 px-sm-5 pt-0 fs-4 py-0 my-2" style="
                                                                                                                                                                                                                                                                                                                        float: right;padding: 5px 20px !important;
                                                                                                                                                                                                                                                                                                                        font-size: 15px !important;background: #0d6efd !important;
                                                                                                                                                                                                                                                                                                                        color: #fff !important; border-color: #0d6efd !important; ">Save</a>
                                                                                                                                                                                                                                                                                                                </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- model end-->

    <!-- model view start-->
    <div class="modal fade" id="cash" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="padding-left: 30px;">
                    <h5 class="modal-title" id="exampleModalLabel">Payment Mode</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="
                                                                                                                                                                                                                                                                                                                float: right;    font-size: 10px;"></button>
                </div>
                <div class="modal-body" style="padding: 20px 30px;">
                    <form class="col-12">
                        <div class="my-3 col-12">
                            <input type="text" class="form-control" placeholder="Total Amount">
                        </div>
                    </form>
                </div>
                <div class="container row">
                    <!-- <div class="mb-3 col-9">
                                                                                                                                                                                                                                                                                                                    <a href="#" class="btn btn-primary allocate-permission rounded-pill px-3 px-sm-5 pt-0 fs-4 py-0 my-2" style="
                                                                                                                                                                                                                                                                                                                        padding: 5px 20px !important;font-size: 15px !important;float: right;background: #000 !important;color: #fff !important;">Cancel</a>
                                                                                                                                                                                                                                                                                                                </div> -->
                    <div class="mb-3 col-3 ms-auto">
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
    </div>
    <!-- model end-->


    </div>
    </div>

@endsection

@push('js')
    <script>
        function getview(id) {

            let viewUrl = `{{ route('admin.order.view') }}/${id}`;
            $.ajax({
                type: "get",
                url: viewUrl,
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
            $("#viewModal").html(data);
        }
    </script>
@endpush
