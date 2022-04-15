@extends('admin.layout.layout')
@section('title', 'Home')
@section('rs_sidebar')
    @include('admin.include.rs_sidebar')
@endsection
@section('content')
    <div class="main-content index-page  flex-wrap flex-md-nowrap px-5 me-2 p-4 d-flex">
        <div class="container-ls mb-md-0 mb-4 me-0 me-md-2">
            {{-- <div class="card-container w-100 d-flex justify-content-between">
          <div class="card-content yellow lighten-4 mt-4 mt-sm-0  px-1 mb-2 rounded-3 border">
            <div class="w-25 m-auto mt-4 ms-4 ms-2">
              <i class="fa-solid fs-4 ms-lg-3 text-warning fa-user-group"></i>
            </div>
            <div class="w-75 m-auto">
              <p class="fs-5 fw-bold my-2 text-center">Customers</p>
              <p class="fw-bold my-2 text-center">764843</p>
            </div>
          </div>
          <div class="card-content  px-1 red lighten-4 mt-4 mt-sm-0 mb-2 rounded-3 border">
            <div class="w-25 m-auto mt-4 ms-4 ms-2">
            <i class="fa-solid fs-4 ms-lg-3 text-danger fa-building"></i>
            </div>
            <div class="w-75 m-auto">
              <p class="fs-5 fw-bold my-2 mx-0 text-nowrap text-center">Facilitator Center</p>
              <p class="fw-bold my-2 text-center">76</p>
            </div>
          </div>
          <div class="card-content  px-1 brown lighten-3 mt-4 mt-sm-0 mb-2 rounded-3 border">
            <div class="w-25 m-auto mt-4 ms-4 ms-2">
            <i class="fa-solid fs-4 ms-lg-3 fa-warehouse" style="color:brown;"></i>
            </div>
            <div class="w-75 m-auto">
              <p class="fs-5 fw-bold my-2 text-center">Warehouse</p>
              <p class="fw-bold my-2 text-center">43</p>
            </div>
          </div>
          <div class="card-content  px-1 blue lighten-4 mt-4 mt-sm-0 mb-2 rounded-3 border">
            <div class="w-25 m-auto mt-4 ms-4 ms-2">
            <i class="fa-solid fs-4 ms-lg-3 text-primary fa-truck-fast"></i>
            </div>
            <div class="w-75 m-auto">
              <p class="fs-5 fw-bold my-2 text-center">Logistics</p>
              <p class="fw-bold my-2 text-center">73</p>
            </div>

          </div>


        </div> --}}

            <div class="row">
                <div class="col-md-3" style="padding-left: 0px;">
                    <div class="dash_card" style=" background: #fff9c4;">
                        <i class="fa-solid fs-4 ms-lg-3 text-warning fa-user-group"></i>
                        <h6 class="pt-3">Customers</h6>
                        <p>{{ $farmers ?? 0 }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dash_card" style=" background: #FFCDD2;">
                        <i class="fa-solid fs-4 ms-lg-3 text-danger fa-building" style="color: #ff7381 !important;"></i>
                        <h6 class="pt-3">Facilitator Center</h6>
                        <p>{{ $fcenters ?? 0 }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dash_card" style=" background: #87b5ff;">
                        <i class="fa-solid fs-4 ms-lg-3 fa-warehouse" style="color: #0062ff;"></i>
                        <h6 class="pt-3">Warehouse</h6>
                        <p>{{ $warehouse ?? 0 }}</p>
                    </div>
                </div>
                <div class="col-md-3" style="padding-right: 0px;">
                    <div class="dash_card" style=" background: #99d89c;">
                        <i class="fa-solid fs-4 ms-lg-3 text-primary fa-truck-fast"
                            style="    color: #376339 !important;"></i>
                        <h6 class="pt-3">Logistics</h6>
                        <p>{{ $logistics ?? 0 }}</p>
                    </div>
                </div>
            </div>

            <div class="flex-wrap d-md-flex justify-content-between">
                <div class="chart-container green lighten-4 my-3 rounded-3 p-5 border">
                    <i class="fa-solid text-success  fs-1 fa-hand-holding-dollar" style="font-size: 45px !important;"></i>
                    <h6 class="pt-3 fs-5"><b>Total Allocations</b></h6>
                    <p><strong>Rs {{ $allocation_total ?? 0 }}</strong></p>
                </div>
                <div class="invoice-container my-3 p-2 rounded-3 border">
                    <table class="table w-100 p-2">
                        <tbody>
                            <tr>
                                <th class="fw-bold text-nowrap">Facilitator Center</th>
                                <th class="fw-bold" style="padding-left: 22px;">Amount</th>
                                <th class="fw-bold" style="padding-left: 14px;">View</th>
                            </tr>
                            @foreach ($recent as $item)
                                <tr>
                                    <td style="padding-left: 40px;">{{ $item->name }}</td>
                                    <td>
                                        {{-- <i
                                            class="fa-solid text-warning me-2 fa-indian-rupee-sign"></i> --}}
                                        {{ $item->format_amount }}
                                    </td>
                                    <td><a href="" class="btn px-3"
                                            style="font-size: 12px !important;padding: 0 10px !important;text-transform: capitalize !important;">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- <div class="container-rs m-0 p-0 w-100 my-4">
              <label class="fs-3 mt-2 mb-4 fw-bold px-2">Recent Orders</label>
              <table class="table bg-white custab">
                  <thead class="text-center">
                      <tr>
                        <th>	S.C. no.</th>
                        <th>Name</th>
                        <th>Phone no.</th>
                        <th>6R</th>
                        <th>Location</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Payment Mode</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                      <tbody>
                          <tr class="text-center">
                            <td>1</td>
                            <td>Mark</td>
                            <td>9886864864</td>
                            <td><textarea class="form-control" id="exampleFormControlTextarea1" readonly style="width: 200px;"></textarea></td>
                            <td>abc, district, state, pin</td>
                            <td>xyz</td>
                            <td>1000</td>
                            <td>1</td>
                            <td>Cash</td>
                            <td>dd/mm/yyyy</td>
                            <td class="action ">
                              <i class="fas fa-solid fa-pen pe-3 text-success"></i>
                              <i class="fas fa-trash delete-icon text-danger"></i>
                            </td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Drak</td>
                            <td>9886864864</td>
                            <td><textarea class="form-control" id="exampleFormControlTextarea1" readonly style="width: 200px;"></textarea></td>
                            <td>abc, district, state, pin</td>
                            <td>xyz</td>
                            <td>1000</td>
                            <td>1</td>
                            <td>Cash</td>
                            <td>dd/mm/yyyy</td>
                            <td class="action ">
                              <i class="fas fa-solid fa-pen pe-3 text-success"></i>
                              <i class="fas fa-trash delete-icon text-danger"></i>
                            </td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>Sam</td>
                            <td>9886864864</td>
                            <td><textarea class="form-control" id="exampleFormControlTextarea1" readonly style="width: 200px;"></textarea></td>
                            <td>abc, district, state, pin</td>
                            <td>xyz</td>
                            <td>1000</td>
                            <td>1</td>
                            <td>Cash</td>
                            <td>dd/mm/yyyy</td>
                            <td class="action ">
                              <i class="fas fa-solid fa-pen pe-3 text-success"></i>
                              <i class="fas fa-trash delete-icon text-danger"></i>
                            </td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td>Sam</td>
                            <td>9886864864</td>
                            <td><textarea class="form-control" id="exampleFormControlTextarea1" readonly style="width: 200px;"></textarea></td>
                            <td>abc, district, state, pin</td>
                            <td>xyz</td>
                            <td>1000</td>
                            <td>1</td>
                            <td>Cash</td>
                            <td>dd/mm/yyyy</td>
                            <td class="action ">
                              <i class="fas fa-solid fa-pen pe-3 text-success"></i>
                              <i class="fas fa-trash delete-icon text-danger"></i>
                            </td>
                          </tr>
                          <tr>
                            <td>5</td>
                            <td>Sam</td>
                            <td>9886864864</td>
                            <td><textarea class="form-control" id="exampleFormControlTextarea1" readonly style="width: 200px;"></textarea></td>
                            <td>abc, district, state, pin</td>
                            <td>xyz</td>
                            <td>1000</td>
                            <td>1</td>
                            <td>Cash</td>
                            <td>dd/mm/yyyy</td>
                            <td class="action ">
                              <i class="fas fa-solid fa-pen pe-3 text-success"></i>
                              <i class="fas fa-trash delete-icon text-danger"></i>
                            </td>
                          </tr>
                      </tbody>
                  </table>

            </div> --}}
        </div>
    </div>
@endsection
