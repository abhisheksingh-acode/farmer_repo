@extends('admin.layout.layout')
@section('title', 'logistics')
@section('content')
    <div class=" main-content ">
        <div class="col-12 uppercol my-1" style="height:fit-content;">
            <div class=" mx-5">
                <p>Logistics <span>/ Logistics Transaction</span></p>
                <div class="d-flex justify-content-between">
                    <h4 class="text-nowrap">Logistics Transaction</h4>
                </div>
            </div>

            <div class="bg-white container">
                <table>
                    <tr>
                        <th style="width: 300px;">ID</th>
                        <td class="text-start">{{ $data->id }}</td>
                    </tr>
                    <tr>
                        <th style="width: 300px;">Name</th>
                        <td class="text-start">{{ $data->name }}</td>
                    </tr>
                    <tr>
                        <th style="width: 300px;">Email</th>
                        <td class="text-start">{{ $data->email }}</td>
                    </tr>
                    <tr>
                        <th style="width: 300px;">Phone</th>
                        <td class="text-start">{{ $data->phone }}</td>
                    </tr>
                    <tr>
                        <th style="width: 300px;">Address</th>
                        <td class="text-start">{{ $data->address }}</td>
                    </tr>
                    <tr>
                        <th style="width: 300px;">Pincode</th>
                        <td class="text-start">{{ $data->pincode }}</td>
                    </tr>
                </table>
            </div>

            <div class="col-12 mx-auto">
                <table class="table bg-white custab mt-5">
                    <thead class="text-center">
                        <tr>
                            <th>Order ID</th>
                            <th>Source</th>
                            <th>Destination</th>
                            <th>9r</th>
                            <th>gatepass</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data->orders as $item)
                            <tr class="text-center">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->fc->name }} - {{ $item->fc->address }}</td>
                                <td>{{ $item->warehouse->name }} - {{ $item->warehouse->address }}</td>
                                <td>{{ $item->nine_r }}</td>
                                <td>{{ $item->gate_pass }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->status_format }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">no data found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>


    </div>
@endsection
