@extends('admin.layout.layout') @section('title', 'create farmer')
@section('content')
    <div class="main-content flex-wrap flex-md-nowrap p-4">
        <div class="mx-5">
            <div class="col-12 uppercol mt-5">
                <p>Payment <span>/ Payment Allocation</span></p>
                <div class="d-flex justify-content-between">
                    <h4>Payment Allocation</h4>
                    <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button"
                        style="font-size: 14px; padding: 10px 20px">Allocate Money</a>
                </div>
            </div>

            <!-- model start-->
            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
                tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header" style="padding-left: 30px">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Allocate Money
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                style="float: right; font-size: 10px"></button>
                        </div>
                        <div class="modal-body" style="padding: 20px 30px">
                            <form class="col-12" id="allocate" action="{{ route('admin.payment.allocate') }}"
                                method="POST">
                                @csrf
                                <div class="my-3 col-12">
                                    <select name="fc_id" id="" class="form-select">
                                        @forelse ($fcenters as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->name }} - {{ $item->address }}
                                            </option>
                                        @empty
                                            <option value="">
                                                centers not available
                                            </option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="mb-3 col-12">
                                    <input type="number" name="amount" class="form-control" placeholder="Amount" />
                                </div>
                            </form>
                        </div>
                        <div class="container row">
                            <div class="mb-3 col-9">
                                <a href="#"
                                    class="btn btn-primary allocate-permission rounded-pill px-3 px-sm-5 pt-0 fs-4 py-0 my-2"
                                    style="
                                                                                                                                                                                    padding: 5px 20px !important;
                                                                                                                                                                                    font-size: 15px !important;
                                                                                                                                                                                    float: right;
                                                                                                                                                                                    background: #000 !important;
                                                                                                                                                                                    color: #fff !important;
                                                                                                                                                                                ">Cancel</a>
                            </div>
                            <div class="mb-3 col-3">
                                <button form="allocate" type="submit" href="#"
                                    class="btn btn-primary allocate-permission rounded-pill px-3 px-sm-5 pt-0 fs-4 py-0 my-2"
                                    style="
                                                                                                                                                                                    float: right;
                                                                                                                                                                                    padding: 5px 20px !important;
                                                                                                                                                                                    font-size: 15px !important;
                                                                                                                                                                                    background: #0d6efd !important;
                                                                                                                                                                                    color: #fff !important;
                                                                                                                                                                                    border-color: #0d6efd !important;
                                                                                                                                                                                ">
                                    Allocate
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- model end-->

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
                                <form action="{{ route('admin.payment.index') }}" method="post" class="row">
                                    @csrf
                                    <div class="col-md-8 col-12 my-3">
                                        <input type="text" placeholder="search by name/email/phone/pincode"
                                            class="form-control" name="search" />
                                    </div>
                                    <div class="col-md-3 col-8 my-md-3 mx-auto">
                                        <button type="submit" class="btn btn-primary col-12 mb-3">
                                            Filter
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--filter end -->

        <div class="row mt-5">
            @include('admin.include.fail')
            @include('admin.include.success')

            @foreach ($data as $item)
                <div class="col-md-3">
                    <div class="pay_card pb-2">
                        <div class="top_col">
                            <h5 class="my-1 col-12 text-center pb-0">
                                {{ $item->fc->name }}
                            </h5>
                            <p class="my-1 col-12 text-center pb-3 mb-0" style="font-size: 13px">
                                {{ $item->fc->address }}
                            </p>
                            <i class="fa-regular fa-bell text-center"></i>
                            <h6 class="pt-3 text-center">Total Allocation</h6>
                            <p class="text-center">{{ $item->fc->total }}</p>
                        </div>
                        <div class="column d-flex"
                            style="
                                                                                                                                                                    border-top: 1px solid #c6c6c6;
                                                                                                                                                                    border-bottom: 1px solid #c6c6c6;
                                                                                                                                                                ">
                            <p class="d-inline m-0 p-0"
                                style="
                                                                                                                                                                        border-right: 1px solid #c6c6c6;
                                                                                                                                                                        width: 50%;
                                                                                                                                                                        text-align: center;
                                                                                                                                                                        padding: 10px !important;
                                                                                                                                                                    ">
                                <u class="d-block text-center">Spent</u><b>{{ $item->fc->spent }}</b>
                            </p>
                            <p class="d-inline m-0 p-0"
                                style="
                                                                                                                                                                        width: 50%;
                                                                                                                                                                        text-align: center;
                                                                                                                                                                        padding: 10px !important;
                                                                                                                                                                    ">
                                <u class="d-block text-center">Balance</u><b>{{ $item->fc->allocation }}</b>
                            </p>
                        </div>
                        <a href="{{ route('admin.payment.show', ['id' => $item->fc->id]) }}"
                            class="btn btn-primary col-12 mt-2" style="width: 90%; margin-left: 14px">Transaction
                            History</a>
                    </div>
                </div>
            @endforeach

            <div class="col-12 mt-4">
                {{ $data->links() }}
            </div>
        </div>
    </div>

@endsection
