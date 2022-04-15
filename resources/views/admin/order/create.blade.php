@extends('admin.layout.layout')
@section('title', 'create farmer')
@section('content')
    <div class=" main-content flex-wrap flex-md-nowrap pb-3 pt-3 px-auto mx-auto">
        <div class="container mx-auto mb-5">
            <div class=" uppercol my-3 my-md-5  mx-1 px-0 px-sm-1 mx-sm-4">
                <p>Order <span>/ Add Order</span></p>
                <div class="d-flex justify-content-between">
                    <h4 class="text-nowrap">Add Order</h4>
                </div>
            </div>

            <div class="mt-4 p-4 mb-4 bg-white px-5 shadow-sm rounded-3 add_order">
                <form action="{{ route('admin.order.create') }}" method="post">
                    @include('admin.include.fail')
                    @include('admin.include.success')
                    @csrf
                    <div class="col-12   row g-3 align-items-center my-1">
                        <div class="col-3 col-sm-2">
                            <label for="inputname" class="col-form-label">Farmer ID</label>
                        </div>
                        <div class="col-9 col-sm-10 mx-sm-0 px-sm-0">
                            <input type="text" id="inputname" class="form-control" placeholder="Farmer ID "
                                name="farmer_id" value="{{ old('farmer_id') }}">
                            @error('farmer_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12   row g-3 align-items-center my-1">
                        <div class="col-3 col-sm-2">
                            <label for="inputname" class="col-form-label">Phone</label>
                        </div>
                        <div class="col-9 col-sm-10 mx-sm-0 px-sm-0">
                            <input type="text" id="inputname" class="form-control" placeholder="Farmer Phone" name="phone"
                                value="{{ old('phone') }}">
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12   row g-3 align-items-center my-1">
                        <div class="col-3 col-sm-2">
                            <label for="inputnumber" class="col-form-label">Pincode</label>
                        </div>
                        <div class="col-9 col-sm-10 mx-sm-0 px-sm-0">
                            <input type="number" id="pincode" name="pincode" oninput="fcenters(this.value)"
                                class="form-control" placeholder="enter pincode to fetch facilitator"
                                value="{{ old('pincode') }}">
                        </div>
                        <div class="col-3 col-sm-2">
                            <label for="inputnumber" class="col-form-label"></label>
                        </div>
                        <div class="col-9 col-sm-10 mx-sm-0 px-sm-0">
                            <select class="form-select" name="fc_id" id="fcenter" aria-label="Default select example">
                                <option value="">Select Facilitator</option>
                            </select>
                            @error('fc_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 row g-3 align-items-center my-1">
                        <div class="col-3 col-sm-2">
                            <label for="inputtext" class="col-form-label" title="liters">Quantity (L)</label>
                        </div>
                        <div class="col-9 col-sm-10 mx-sm-0 px-sm-0">
                            <input type="number" id="inputtext" class="form-control" placeholder="Quantity" name="qty"
                                oninput="priceFetch(this.value)" value="{{ old('qty') }}">
                            @error('qty')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-3 col-sm-2">
                            <label for="inputtext" class="col-form-label">Price</label>
                        </div>
                        <div class="col-9 col-sm-10 mx-sm-0 px-sm-0">
                            <input type="text" id="price" readonly name="price" class="form-control"
                                placeholder="total price" value="{{ old('price') }}">
                            @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-3 col-sm-2">
                            <label for="inputaccount holders name" class="col-form-label">Payment Mode</label>
                        </div>
                        <div class="col-9 col-sm-10 mx-sm-0 px-sm-0">
                            <select class="form-select" name="mode" aria-label="Disabled select example">
                                <option value="">Payment Mode</option>
                                <option value="cash">cash</option>
                                <option value="online">online</option>
                            </select>
                            @error('mode')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-3 col-sm-2">
                            <label for="inputifsc code" class="col-form-label">Date</label>
                        </div>
                        <div class="col-9 col-sm-5 mx-sm-0 px-sm-0">
                            <input id="date" name="date" class="form-control text-dark" disabled />
                        </div>

                    </div>
                    <div class="col-12 g-3 align-items-center my-1  text-end bg-white" style="height:60px;">
                        <button type="submit" class="btn btn-secondary px-5 py-2 me-sm-4">Save</button>
                    </div>
                </form>
            </div>

        </div>


    </div>




    </div>

    </div>


@endsection


@push('js')
    <script>
        function fcenters(val) {
            let searchUrl = `/admin/fcenter/search/${val}`;

            $.ajax({
                type: "get",
                url: searchUrl,
                success: function(data) {
                    updateFcenterOption(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }

        function updateFcenterOption(data) {
            $('#fcenter').html(data);
        }


        function priceFetch(val) {
            let priceUrl = `/admin/order/price/${val}`;

            $.ajax({
                type: "get",
                url: priceUrl,
                success: function(data) {
                    updatePrice(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }

        function updatePrice(data) {
            $('#price').val("₹" + data + ".00")
        }

        $(document).ready(function() {
            updateFcenterOption($("#pincode").val());
            priceFetch($("#qty").val());
        })
    </script>
@endpush
