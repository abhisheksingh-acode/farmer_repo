@extends('admin.layout.layout')
@section('title', 'logistic')
@section('content')
    <div class=" main-content flex-wrap flex-md-nowrap p-4 ">
        <div class=" mx-5">
            <div class="col-12 uppercol mt-5">
                <p>Logistics <span>/ All Logistics</span></p>
                <div class="d-flex justify-content-between">
                    <h4>All Logistics</h4>
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
                            <div class="mb-2">
                                <form id="filter" action="{{ route('admin.logistic.index') }}" method="post"
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
        </div>
        <!--filter end -->

        <div class="row mt-5">
            @foreach ($data as $item)
                <div class="col-md-3">
                    <div class="inven_card">
                        <h5 class="mb-5 col-12 text-center">{{ $item->name }}</h5>
                        <p>email <span style="float: right;">{{ $item->email }}</span></p>
                        <p>phone <span style="float: right;">{{ $item->phone }}</span></p>
                        <a href="{{ route('admin.logistic.show', ['id' => $item->id]) }}"
                            class="btn btn-primary col-12 mt-3">Transaction History</a>
                        <a href="{{ route('admin.logistic.edit', ['id' => $item->id]) }}"
                            class="btn btn-primary col-12 mt-3">Edit</a>
                    </div>
                </div>
            @endforeach

        </div>




    </div>


    </div>
    </div>
@endsection
