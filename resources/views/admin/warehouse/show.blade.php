@extends('admin.layout.layout')
@section('title', 'warehouse transaction')
@section('content')
    <div class=" main-content ">
        <div class="col-12 uppercol my-1" style="height:fit-content;">
            <div class=" mx-5">
                <p>Warehouse <span>/ Warehouse Transaction</span></p>
                <div class="d-flex justify-content-between">
                    <h4 class="text-nowrap">Warehouse Transaction</h4>
                </div>
            </div>

            <div class="col-12 mx-auto">
                <table class="table bg-white custab mt-5">
                    <thead class="text-center">
                        <tr>
                            <th>Order ID</th>
                            <th>Drums</th>
                            <th>Logistics Name</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data->orders as $item)
                            <tr class="text-center">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->drums }}</td>
                                <td>{{ $item->logistic->name }}</td>
                                <!-- <td>type 1</td> -->
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>

@endsection
