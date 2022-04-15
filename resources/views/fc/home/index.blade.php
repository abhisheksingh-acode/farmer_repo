@extends('fc.layout.index')
@section('title', 'fcenter')

@section('content')
    <div class="main-content index-page  flex-wrap flex-md-nowrap px-5 me-2 p-4 d-flex">
        <div class="container-ls mb-md-0 mb-4 me-0 me-md-2">
            <div class="row">
                <div class="col-md-3" style="padding-left: 0px;">
                    <div class="dash_card" style=" background: #fff9c4;">
                        <i class="fa-solid fs-4 ms-lg-3 text-warning fa-user-group"></i>
                        <h6 class="pt-3">Farmers</h6>
                        <p>{{ $farmers }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dash_card" style=" background: #FFCDD2;">
                        <i class="fa-solid fs-4 ms-lg-3 text-danger fa-building" style="color: #ff7381 !important;"></i>
                        <h6 class="pt-3">All Order</h6>
                        <p>{{ $orders }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dash_card" style=" background: #87b5ff;">
                        <i class="fa-solid fs-4 ms-lg-3 fa-warehouse" style="color: #0062ff;"></i>
                        <h6 class="pt-3">9r</h6>
                        <p>{{ $nine_r }}</p>
                    </div>
                </div>
                <div class="col-md-3" style="padding-right: 0px;">
                    <div class="dash_card" style=" background: #99d89c;">
                        <i class="fa-solid fs-4 ms-lg-3 text-primary fa-truck-fast"
                            style="    color: #376339 !important;"></i>
                        <h6 class="pt-3">Logistics</h6>
                        <p>{{ $logi }}</p>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-4 col-12">
                    <div class="dash_card" style=" background: #FFCDD2;">
                        <i class="fa-solid fa-coins fs-4 ms-lg-3 text-primary " style="color: #ff7381  !important;"></i>
                        <h6 class="pt-3">Total Allocation</h6>
                        <p>{{ auth()->user()->total }}</p>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="dash_card" style=" background: #87b5ff;">
                        <i class="fa-solid fa-coins fs-4 ms-lg-3 text-primary " style="    color: #0062ff;"></i>
                        <h6 class="pt-3">Total spent</h6>
                        <p>{{ auth()->user()->spent }}</p>
                    </div>
                </div>
                <div class="col-md-4 col-12" style="padding-right: 0px;">
                    <div class="dash_card" style=" background: #99d89c;">
                        <i class="fa-solid fa-coins fs-4 ms-lg-3 text-primary " style="    color: #376339 !important;"></i>
                        <h6 class="pt-3">Total balance</h6>
                        <p>{{ auth()->user()->allocation }}</p>
                    </div>
                </div>
            </div>


            <div class="col-12 mx-auto mt-5">
                <label class="fs-4 mt-2 mb-4 fw-bold px-2">Recent Orders</label>
                <table class="table bg-white custab">
                    <thead class="text-center">
                        <tr>
                            <th style="padding-left: 50px;">S.C No</th>
                            <th style="padding-left: 50px;">Farmers Name</th>
                            <th style="padding-left: 50px;">Quantity</th>
                            <th style="padding-left: 13px;">View</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($recent as $item)
                            <tr>
                                <td style="padding-left: 70px !important;">{{ $item->sc_number }}</td>
                                <td style="padding-left: 70px !important;">{{ $item->sc_order->farmer->name }}</td>
                                <td style="padding-left: 70px !important;">{{ $item->qty ?? 0 }}</td>
                                <td>
                                    <a href="javascript:void(0)" class="btn px-3"
                                        style="font-size: 12px !important;padding: 0 10px !important;text-transform: capitalize !important;height: 30px;line-height: 27px;">View</a>
                                </td>
                            </tr>
                        @empty
                        @endforelse


                    </tbody>
                </table>
            </div>

        </div>
    </div>
    </div>
@endsection

@section('rs_sidebar')
    @include('fc.include.rs_sidebar')
@endsection
