@extends('admin.layout.layout')
@section('title', 'create warehouse')
@section('content')
    <div class=" main-content flex-wrap flex-md-nowrap p-4 ">
        <div class=" mx-5">
            <div class="col-12 uppercol mt-5">
                <p>Warehouse <span>/ All Warehouse</span></p>
                <div class="d-flex justify-content-between">
                    <h4>All Warehouse</h4>
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
                        <div class="accordion-body" style="padding-left: 80px;">
                            <div class="col-12 mb-2">
                                <form id="filter" action="{{ route('admin.warehouse.index') }}" method="post"
                                    class="row">
                                    @csrf
                                    <div class="col-md-8 col-12 my-3">
                                        <input type="text" name="search" placeholder="search by name/email/phone/pincode"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-3 col-8 my-md-3 mx-auto">
                                        <button type="submit" form="filter"
                                            class="btn btn-primary col-12 mb-3">Filter</button>
                                    </div>
                                </form>

                            </div>


                        </div>
                    </div>
                </div>
            </div>

            @include('admin.include.fail')
            @include('admin.include.success')
        </div>
        <!--filter end -->



        <div class="row mt-5">

            @foreach ($data as $item)
                <div class="col-md-3">
                    <div class="inven_card">
                        <h5 class="mb-5 col-12 text-center">{{ $item->name }}</h5>
                        <p><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1.5em"
                                preserveAspectRatio="xMidYMid meet" viewBox="0 0 64 64">
                                <g fill="#0d6efd">
                                    <path d="M7.1 6.9h49.8v50.2H7.1z"></path>
                                    <ellipse cx="32" cy="57.1" rx="26" ry="4.9"></ellipse>
                                    <ellipse cx="32" cy="23.6" rx="26" ry="4.9"></ellipse>
                                    <ellipse cx="32" cy="40.4" rx="26" ry="4.9"></ellipse>
                                </g>
                                <g fill="#d0d0d0">
                                    <ellipse cx="32" cy="6.9" rx="26" ry="4.9"></ellipse>
                                    <path
                                        d="M7.4 22.4c3.5 1.9 13.2 4.2 24.6 4.2s21.1-2.3 24.6-4.2c-6.2.9-14.9 2.4-24.6 2.4s-18.4-1.4-24.6-2.4m0 16.9c3.5 1.9 13.2 4.2 24.6 4.2s21.1-2.3 24.6-4.2c-6.2.9-14.9 2.4-24.6 2.4s-18.4-1.5-24.6-2.4m0 16.3c3.5 1.9 13.2 4.2 24.6 4.2s21.1-2.3 24.6-4.2c-6.2.9-15 2.4-24.6 2.4s-18.4-1.5-24.6-2.4">
                                    </path>
                                </g>
                                <ellipse cx="15.7" cy="6.9" fill="#3e4347" rx="3.9" ry="1"></ellipse>
                            </svg>&nbsp; Drum <span style="float: right;">{{ $item->drum_total ?? '00' }}</span></p>
                        <p>Email <span>{{ $item->email }}</span></p>
                        <p>Pincode <span>{{ $item->pincode }}</span></p>
                        <a href="{{ route('admin.warehouse.show', ['id' => $item->id]) }}"
                            class="btn btn-primary col-12 mt-3">Transaction History</a>
                        <a href="{{ route('admin.warehouse.edit', ['id' => $item->id]) }}"
                            class="btn btn-primary col-12 mt-3">Edit</a>
                    </div>
                </div>
            @endforeach

        </div>




    </div>


    </div>
    </div>


@endsection
