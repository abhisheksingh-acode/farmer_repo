@extends('admin.layout.layout')
@section('title', 'farmer profile')
@section('content')
    <div class="main-content flex-wrap flex-md-nowrap p-4 ">
        <div class=" mx-5">
            <div class="col-12 uppercol mt-5">
                <p>Farmers <span>/ Farmers profile</span></p>
            </div>

            <div class="d-flex justify-content-between mt-5">
                <h4 class="text-nowrap">Farmers profile</h4>
            </div>

            <div class=" px-0 my-4 bg-white pt-3 shadow-sm rounded-3">

                <h5 class="text-center mb-4">Personal Details</h5>
                <div class=" col-md-12 col-sm-8 col-xs-10 mx-auto">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{ $data->kyc->photo ?? asset('admins/asset/placeholder2.jpg') }}"
                                style="width: 100%;padding: 0 0px 20px 20px;">
                        </div>
                        <div class="col-md-4">
                            <div class="profile-detls">
                                <h3 class="profile-ttl fs-6 pb-2">
                                    {{-- {{ $data->name }} --}}
                                    <span class="pull-right prfl-edt" style="float:right;">
                                        <a href="{{ route('admin.farmer.edit', ['id' => $data->id]) }}">
                                            <i class="fa-solid fa-pen-to-square"></i></a></span>
                                </h3>

                                <div class="row bank_details my-2 px-0">
                                    <div class="col-md-5 col-4 col-sm-2">
                                        <label for="inputbank name" class="">ID</label>
                                    </div>
                                    <div class="col-md-7 col-8 col-sm-2">
                                        <p>{{ $data->id }}</p>
                                    </div>
                                </div>
                                <div class="row bank_details my-2 px-0">
                                    <div class="col-md-5 col-4 col-sm-2">
                                        <label for="inputbank name" class="">Name</label>
                                    </div>
                                    <div class="col-md-7 col-8 col-sm-2">
                                        <p>{{ $data->name }}</p>
                                    </div>
                                </div>
                                <div class="row bank_details my-2 px-0">
                                    <div class="col-md-5 col-4 col-sm-2">
                                        <label for="inputbank name" class="">Email</label>
                                    </div>
                                    <div class="col-md-7 col-8 col-sm-2">
                                        <p>{{ $data->email }}</p>
                                    </div>
                                </div>
                                <div class="row bank_details my-2 px-0">
                                    <div class="col-md-5 col-4 col-sm-2">
                                        <label for="inputbank name" class="">Phone</label>
                                    </div>
                                    <div class="col-md-7 col-8 col-sm-2">
                                        <p>{{ $data->phone }}</p>
                                    </div>
                                </div>
                                <div class="row bank_details my-2 px-0">
                                    <div class="col-md-5 col-4 col-sm-2">
                                        <label for="inputbank name" class="">Language</label>
                                    </div>
                                    <div class="col-md-7 col-8 col-sm-2">
                                        <p>{{ $data->lang }}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="px-0 my-4 bg-white pt-3 shadow-sm rounded-3">
                <div class="col-12 d-flex justify-content-center">
                    <h5 class="pb-3" style="color: #000;">Bank Details</h5>
                </div>

                <div class="row bank_details">
                    <div class="col-md-3 col-4 col-sm-2">
                        <label for="inputbank name" class="">Bank Name</label>
                    </div>
                    <div class="col-md-7 col-8 col-sm-2">
                        <p>{{ $data->bank->bank_name }}</p>
                    </div>
                </div>
                <div class="row bank_details">
                    <div class="col-md-3 col-4 col-sm-2">
                        <label for="inputbank name" class="">Bank account no.</label>
                    </div>
                    <div class="col-md-7 col-8 col-sm-2">
                        <p>{{ $data->bank->ac_number }}</p>
                    </div>
                </div>
                <div class="row bank_details">
                    <div class="col-md-3 col-4 col-sm-2">
                        <label for="inputbank name" class="">Account holders name</label>
                    </div>
                    <div class="col-md-7 col-8 col-sm-2">
                        <p>{{ $data->bank->ac_holder }}</p>
                    </div>
                </div>
                <div class="row bank_details pb-4">
                    <div class="col-md-3 col-4 col-sm-2">
                        <label for="inputbank name" class="">IFSC code</label>
                    </div>
                    <div class="col-md-7 col-8 col-sm-2">
                        <p>{{ $data->bank->ac_ifsc }}</p>
                    </div>
                </div>

            </div>

            <div class="px-0 my-4 bg-white pt-3 shadow-sm rounded-3">
                <div class="col-12 d-flex justify-content-center">
                    <h5 style="color: #000;">Documents</h5>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="doc_down d-flex">
                            <p><span><i class="fa-solid fa-file"></i></span></p>
                            <h6>Kyc<br><span>Uploaded</span></h6>
                            <a href="{{ $data->kyc->photo }}" download="{{ $data->kyc->photo }}">
                                <i class="fa-solid fa-download"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="doc_down d-flex">
                            <p><span><i class="fa-solid fa-file"></i></span></p>
                            <h6>{{ $data->kyc->doc_type }}<br><span>Uploaded</span></h6>
                            <a href="{{ $data->kyc->doc }}" download="{{ $data->kyc->doc }}">
                                <i class="fa-solid fa-download"></i>
                            </a>
                        </div>
                    </div>
                    {{-- <div class="col-md-3">
                        <div class="doc_down d-flex">
                            <p><span><i class="fa-solid fa-file"></i></span></p>
                            <h6>Pan Card<br><span>Uploaded</span></h6>
                            <i class="fa-solid fa-download"></i>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="doc_down d-flex">
                            <p><span><i class="fa-solid fa-file"></i></span></p>
                            <h6>Electricity Bill<br><span>Uploaded</span></h6>
                            <i class="fa-solid fa-download"></i>
                        </div>
                    </div> --}}
                    {{-- <div class="col-md-3">
                        <div class="doc_down d-flex">
                            <p><span><i class="fa-solid fa-file"></i></span></p>
                            <h6>Adhar Card<br><span>Uploaded</span></h6>
                            <i class="fa-solid fa-download"></i>
                        </div>
                    </div> --}}
                </div>
            </div>

            <div class="col-12 mx-auto mt-5">
                <h5>Transaction History</h5>
                <table class="table bg-white custab mt-3">
                    <thead class="text-center">
                        <tr>
                            <th>Order ID</th>
                            <th>F.C Name</th>
                            <th>F.C Location</th>
                            <th>Amount</th>
                            <th>Quantity</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td>1</td>
                            <td>Mark</td>
                            <td>#123 road</td>
                            <td>$123</td>
                            <td>2</td>
                            <td class="action ">Pending</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Drak</td>
                            <td>#123 road</td>
                            <td>$123</td>
                            <td>2</td>
                            <td class="action ">Approved</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Sam</td>
                            <td>#123 road</td>
                            <td>$123</td>
                            <td>2</td>
                            <td class="action ">Pending</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Sam</td>
                            <td>#123 road</td>
                            <td>$123</td>
                            <td>2</td>
                            <td class="action ">Declined</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Sam</td>
                            <td>#123 road</td>
                            <td>$123</td>
                            <td>2</td>
                            <td class="action ">Pending</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
