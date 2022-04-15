@extends('fc.layout.index')
@section('title', 'fcenter')
@section('content')
    <div class=" main-content flex-wrap flex-md-nowrap p-4 ">
        <div class="container-fluid container-md mx-auto">
            <div class="col-12 uppercol mt-5">
                <p>Order <span>/ 9r History</span></p>
                <div class="d-flex justify-content-between">
                    <h4>9R-History</h4>
                </div>
            </div>

            <div class="col-12 mx-auto xscroll">
                <table class="table bg-white custab mt-4">
                    <thead class="text-center">
                        <tr>
                            <th>Logistics</th>
                            <th>Warehouse</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>9r No</th>
                            <th>Drum ID's</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr class="text-center">
                                <td>{{ $item->lgOrder->lg->name }} - {{ $item->lgOrder->lg->address }}</td>
                                <td>{{ $item->lgOrder->warehouse->name }} - {{ $item->lgOrder->warehouse->address }}
                                </td>
                                <td>{{ $item->qty_total }} ltr</td>
                                <td>{{ $item->status_format }}</td>
                                <td>{{ $item->nine_r }}</td>
                                <td>
                                    <ul class="px-0 pe-2 m-0"
                                        style="overflow-y:scroll; height:60px; list-style:none; text-align:center;">
                                        @forelse (json_decode($item->drum_id) as $sub)
                                            <li>{{ $sub }}</li>
                                        @empty
                                            <li>null</li>
                                        @endforelse
                                    </ul>
                                </td>
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
