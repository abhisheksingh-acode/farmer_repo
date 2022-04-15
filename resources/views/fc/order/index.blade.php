@extends('fc.layout.index')
@section('title', 'fcenter')
@section('content')
    <div class=" main-content flex-wrap flex-md-nowrap p-4 ">
        <div class=" mx-5">
            <div class="col-12 uppercol mt-5">
                <p>Order <span>/ All Order</span></p>
                <div class="d-flex justify-content-between">
                    <h4>All Order</h4>
                    <div class="d-flex ">
                        <a href="{{ route('fcenter.order.create') }}" class="btn btn-secondary px-3 py-2">Add new order</a>
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
                                <form class="row">
                                    <div class="col-md-3 col-12 my-3">
                                        <input type="text" class="form-control"
                                            placeholder="Search by name/sc no./product">
                                    </div>
                                    <div class="col-md-3 col-12 my-3">
                                        <input type="date" class="form-control">
                                    </div>
                                    <div class="col-md-3 col-12 my-3">
                                        <select class="form-select">
                                            <option selected>Payment mode</option>
                                            <option value="1">All</option>
                                            <option value="2">Online</option>
                                            <option value="3">Offline</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-8 my-md-3 m-auto">
                                        <button type="submit" class="btn btn-primary col-12 mb-3">Filter</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--filter end -->

            <div class="col-12 mx-auto overflow-auto mt-4">
                <div class="col-md-1 col-4 ">
                    <a class="btn btn-primary" id="modal-niner-button" onclick="store()" data-bs-toggle="modal"
                        href="#exampleModalToggle" role="button" style="width: 160px;">Create 9R</a>
                </div>
                <!-- model start-->
                <div class="modal fade" id="exampleModalToggle" aria-hidden="true"
                    aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header" style="padding-left: 30px;">
                                <h5 class="modal-title" id="exampleModalLabel">Create 9R</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    style="float: right;font-size: 10px;"></button>
                            </div>
                            <div class="modal-body" style="padding: 20px 30px;">
                                <form class="col-12" id="nine_r_form" action="{{ route('fcenter.order.9r') }}"
                                    method="post">
                                    @csrf
                                    <div class="notify text-danger"></div>
                                    <div class="my-3 col-12">
                                        <label for="" class="form-label">Add 9r</label>
                                        <input type="text" name="nine_r" class="form-control" placeholder="Add 9r No."
                                            required>
                                    </div>
                                    <div class="my-3 col-12">
                                        <label for="" class="form-label">Gate Pass</label>
                                        <input type="text" name="gate_pass" class="form-control" placeholder="gate pass"
                                            required>
                                    </div>
                                    <input type="hidden" name="fc_order_id" value="">
                                    <div class="my-3 col-12">
                                        <label for="" class="form-label">logistic</label>
                                        <select class="form-select" name="source" aria-label="Default select example"
                                            required>
                                            @forelse ($logi as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name }} - {{ $item->address }}
                                                </option>
                                            @empty
                                                <option value="">logistic not available</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="mb-3 col-12 ">
                                        <label for="" class="form-label">warehouse</label>
                                        <select class="form-select" name="destiny" aria-label="Default select example"
                                            required>
                                            @forelse ($warehouse as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name }} - {{ $item->address }}
                                                </option>
                                            @empty
                                                <option value="">warehouse not available</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="container row">
                                <div class="mb-3 col-9">
                                    <a href="#" class="btn btn-primary allocate-permission px-3 px-sm-5 pt-0 fs-4 py-0 my-2"
                                        style="padding: 5px 20px !important;font-size: 15px !important;float: right;background: #000 !important;color: #fff !important;">Cancel</a>
                                </div>
                                <div class="mb-3 col-3">
                                    <button type="submit" id="save-button-niner" onclick="submit()"
                                        class="btn btn-primary px-3 px-sm-5 pt-0 fs-4 py-0 my-2"
                                        style="float: right;padding: 5px 20px !important;font-size: 15px !important;background: #0d6efd !important;color: #fff !important; border-color: #0d6efd !important; ">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- model end-->

        </div>

        <style>
            .overflow-x-scroll {
                overflow-x: scroll;
            }

        </style>

        <div class="overflow-x-scroll">
            @include('admin.include.fail')
            @include('admin.include.success')
            <table class="table table-nowrap bg-white custab mt-5">
                <thead class="text-center">
                    <tr>
                        <th></th>
                        <th class="text-nowrap">S.C. no.</th>
                        <th class="text-nowrap">Farmer ID</th>
                        <th class="text-nowrap">Name</th>
                        <th class="text-nowrap">G_QTY</th>
                        <th class="text-nowrap">6 R Code</th>
                        <th class="text-nowrap">R_QTY</th>
                        <th class="text-nowrap">Quality</th>
                        <th class="text-nowrap">Tax</th>
                        <th class="text-nowrap">Payment Mode</th>
                        <th class="text-nowrap">Details</th>
                        <th class="text-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                        <tr class="text-center">
                            <form action="{{ route('fcenter.order.proceed', ['sc' => $item->sc_number]) }}" method="POST">
                                @csrf
                                <td>
                                    <input name="sc" class="form-check-input" {{ $item->status != 2 ? 'disabled' : '' }}
                                        type="checkbox" value="{{ $item->id }}" id="flexCheckDefault" />
                                </td>
                                <td>{{ $item->sc_number }}</td>
                                <td>{{ $item->sc_order->farmer->id }}</td>
                                <td>{{ $item->sc_order->farmer->name }}</td>
                                <td>{{ $item->g_qty }}</td>
                                <td> <input type="text" required name="six_r" class="form-control" placeholder=""
                                        value="{{ $item->six_r ?? null }}"></td>
                                <td><input type="text" required name="r_qty" class="form-control"
                                        placeholder="Quantity Received" value="{{ $item->r_qty ?? null }}">
                                </td>
                                <td><input class="form-check-input" name="q" type="checkbox"
                                        {{ $item->q ? 'checked' : '' }} id="flexCheckDefault">
                                </td>
                                <td><input class="form-check-input" name="tax" type="checkbox"
                                        {{ $item->tax ? 'checked' : '' }} id="flexCheckDefault"></td>
                                <td>
                                    <select class="form-select" required name="mode" aria-label="Default select example">
                                        @if ($item->sc_order->price <= auth()->user()->allocation)
                                            <option {{ $item->mode == 'cash' ? 'selected' : '' }} value="cash">Cash
                                            </option>
                                        @endif
                                        <option {{ $item->mode == 'online' ? 'selected' : '' }} value="online">Online
                                        </option>
                                    </select>
                                </td>
                                <td>
                                    <a class="btn btn-info view px-0 py-0" data-bs-toggle="modal"
                                        href="#exampleModalToggles" role="button" style="width: 80px;">View</a>
                                </td>
                                <td class="action">
                                    <button type="submit" {{ $item->status == 2 ? 'disabled' : '' }}
                                        class="btn">Save</button>
                                </td>
                            </form>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- table model details start-->
        <div class="modal fade" id="exampleModalToggles" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
            tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header" style="padding-left: 30px;">
                        <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            style="
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    float: right;    font-size: 10px;"></button>
                    </div>
                    <div class="modal-body" style="padding: 20px 30px;">
                        <form class="col-12">
                            <div class="row">
                                <div class="col-md-5 col-4 col-sm-2">
                                    <label for="inputbank name" class=""><b>S.C No.</b></label>
                                </div>
                                <div class="col-md-7 col-8 col-sm-2">
                                    <p style="color:#c7c7c7;">112</p>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-5 col-4 col-sm-2">
                                    <label for="inputbank name" class=""><b>Farmer ID</b></label>
                                </div>
                                <div class="col-md-7 col-8 col-sm-2">
                                    <p style="color:#c7c7c7;">33</p>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-5 col-4 col-sm-2">
                                    <label for="inputbank name" class=""><b>Name</b></label>
                                </div>
                                <div class="col-md-7 col-8 col-sm-2">
                                    <p style="color:#c7c7c7;">Mark</p>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-5 col-4 col-sm-2">
                                    <label for="inputbank name" class=""><b>Phone No</b></label>
                                </div>
                                <div class="col-md-7 col-8 col-sm-2">
                                    <p style="color:#c7c7c7;">09877665444</p>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-5 col-4 col-sm-2">
                                    <label for="inputbank name" class=""><b>6r No.</b></label>
                                </div>
                                <div class="col-md-7 col-8 col-sm-2">
                                    <p style="color:#c7c7c7;">654</p>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-5 col-4 col-sm-2">
                                    <label for="inputbank name" class=""><b>Location</b></label>
                                </div>
                                <div class="col-md-7 col-8 col-sm-2">
                                    <p style="color:#c7c7c7;">#123 Road</p>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-5 col-4 col-sm-2">
                                    <label for="inputbank name" class=""><b>Quantity</b></label>
                                </div>
                                <div class="col-md-7 col-8 col-sm-2">
                                    <p style="color:#c7c7c7;">1 lit</p>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-5 col-4 col-sm-2">
                                    <label for="inputbank name" class=""><b>Quantity Received</b></label>
                                </div>
                                <div class="col-md-7 col-8 col-sm-2">
                                    <p style="color:#c7c7c7;">6 lit</p>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-5 col-4 col-sm-2">
                                    <label for="inputbank name" class=""><b>Price </b></label>
                                </div>
                                <div class="col-md-7 col-8 col-sm-2">
                                    <p style="color:#c7c7c7;">$66</p>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-5 col-4 col-sm-2">
                                    <label for="inputbank name" class=""><b>Payment Mode</b></label>
                                </div>
                                <div class="col-md-7 col-8 col-sm-2">
                                    <p style="color:#c7c7c7;">Cash</p>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-5 col-4 col-sm-2">
                                    <label for="inputbank name" class=""><b> Date</b></label>
                                </div>
                                <div class="col-md-7 col-8 col-sm-2">
                                    <p style="color:#c7c7c7;">dd/mm/yyyy</p>
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
                        <!-- <div class="mb-3 col-3">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <a href="#" class="btn btn-primary allocate-permission px-3 px-sm-5 pt-0 fs-4 py-0 my-2" style="
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

    <!-- table model payment start-->
    <div class="modal fade" id="exampleModalToggless" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
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
                            style="padding: 5px 20px !important;
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
        var FcOrderIdArray = {
            array: ""
        }

        toggleModalButton();

        $(document).on('change', 'input', function() {
            store();
            console.log('hello');
            toggleModalButton();

        });

        function store() {
            var arr = [];
            $.each($("[name='sc']:checked"), function() {
                arr.push($(this).val());
            });
            FcOrderIdArray.array = arr;

            toggleModalButton();
        }

        function toggleModalButton() {
            console.log(FcOrderIdArray.array.length);
            if (FcOrderIdArray.array.length > 0) {
                $("#modal-niner-button").removeClass('disabled');
                $("[name='fc_order_id']").val(FcOrderIdArray.array);
            } else {
                $("#modal-niner-button").addClass('disabled');
            }
        }


        function submit() {

            let log_id = $("[name='source']").val();
            let wh_id = $("[name='destiny']").val();
            let nine_r = $("[name='nine_r']").val();
            let gate_pass = $("[name='gate_pass']").val();
            let token = $("[name='_token']").val();

            let fc_order_id = FcOrderIdArray.array;

            data = {
                'logistic_id': log_id,
                'warehouse_id': wh_id,
                'nine_r': nine_r,
                'gate_pass': gate_pass,
                'fc_order_id': fc_order_id,
                '_token': token
            };

            if (!log_id || !wh_id || !nine_r || !token || !fc_order_id || !gate_pass) {
                $('.notify').html('all fields are required');
            } else {
                $.ajax({
                    type: "post",
                    url: "{{ route('fcenter.order.9r') }}",
                    data: data,
                    beforeSend: function() {
                        $("#save-button-niner").html('Sending...')
                    },
                    success: function() {
                        location.reload();
                    },
                    error: function(err) {
                        $('.notify').html('database error refresh page and try again');
                        $("#save-button-niner").html('Save');
                    },
                    complete: function() {
                        $("#save-button-niner").html('Save');
                    }
                });
            }


        }
    </script>
@endpush
