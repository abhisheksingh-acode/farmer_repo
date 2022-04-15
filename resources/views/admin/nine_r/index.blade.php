@extends('admin.layout.layout')
@section('title', 'create farmer')
@section('content')
    <div class=" main-content flex-wrap flex-md-nowrap p-4 ">
        <div class=" mx-5">
            <div class="col-12 uppercol mt-5">
                <!-- <p>Farmer <span>/ All Farmer</span></p>
                                                                                                                                                                                                                                                                            <div class="d-flex justify-content-between" > -->
                <h4>All 9R</h4>
                <!-- </div> -->
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
                                <form action="{{ route('admin.9r.index') }}" class="row">
                                    <div class="col-md-3 col-12 my-3">
                                        <select class="form-select" name="fc_id">
                                            <option value="">Facilitator center</option>
                                            @foreach ($fcenters as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }} -
                                                    {{ $item->address }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-12 my-3">
                                        <input type="date" name="date" class="form-control">
                                    </div>

                                    {{-- <div class="col-md-3 col-12 my-3">
                                        <select class="form-select">
                                            <option selected="">Sort</option>
                                            <option value="1">A-Z</option>
                                            <option value="2">Z-A</option>
                                        </select>
                                    </div> --}}
                                    <div class="col-md-3 col-8 my-md-3 mx-auto">
                                        <button type="submit" class="btn btn-primary col-12 mb-3">Filter</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!--filter end -->



            <div class="col-12 mx-auto">
                <table class="table bg-white custab mt-5">
                    <thead class="text-center">
                        <tr>
                            <th>F.C Center</th>
                            <th>Date</th>
                            <th>9r No.</th>
                            <th>Drum Id</th>
                            <th>Logistics</th>
                            <th>Warehouse</th>
                            <th>Quantity</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr class="text-center">
                                <td>{{ $item->lgOrder->fc->name }} - {{ $item->lgOrder->fc->address }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->nine_r }}</td>
                                <td>
                                    <ul class="px-0 pe-2 m-0"
                                        style="overflow-y:scroll; height:60px; list-style:none; text-align:center;">
                                        @foreach (json_decode($item->drum_id) as $val)
                                            <li>{{ $val }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>{{ $item->lgOrder->lg->name }}</td>
                                <td>{{ $item->lgOrder->warehouse->name }}</td>
                                <td>{{ $item->qty_total }} ltr</td>
                                <td>{{ $item->status_format }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">no data found</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>




        </div>


    </div>
    </div>


@endsection
