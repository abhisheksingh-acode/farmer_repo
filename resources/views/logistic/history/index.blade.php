@extends('logistic.layout.index')
@section('title', 'fcenter')
@section('content')
    <div class=" main-content flex-wrap flex-md-nowrap p-4 ">
        <div class=" mx-5">
            <div class="col-12 uppercol my-1" style="height:fit-content;">
                <p>Logistics <span>/ History</span></p>
                <div class="d-flex justify-content-between">
                    <h4 class="text-nowrap">History</h4>
                </div>
            </div>

            <div class="col-12 mx-auto" id="navscroll">
                <table class="table bg-white custab">
                    <thead class="text-center">
                        <tr>
                            <th>Facilitator Center</th>
                            <th>Warehouse</th>
                            <th>Quantity</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">

                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $item->fc->name . '-' . $item->fc->address }}</td>
                                <td>{{ $item->warehouse->name . '-' . $item->warehouse->address }}</td>
                                <td>{{ $item->nr->qty_total }} ltr</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->status_format }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">no data found</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>


    </div>

@endsection
