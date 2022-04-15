@extends('admin.layout.layout')
@section('title', 'create farmer')
@section('content')
    <div class=" main-content flex-wrap flex-md-nowrap p-4 ">
        <div class=" mx-5">
            <div class="col-12 uppercol my-1" style="height:fit-content;">
                <h4>Transaction History</h4>
            </div>

            <form action="{{ route('admin.payment.show', ['id' => $id]) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-4 col-12 my-3">
                        <input type="text" class="form-control" name="search" placeholder="search by 6r/sc number">
                    </div>
                    <div class="col-md-3 col-12 my-3">
                        <input type="date" name="date" class="form-control">
                    </div>
                    <div class="col-md-3 col-12 my-3">
                        <select class="form-select" name="status">
                            <option value="">Status</option>
                            <option value="0">Pending</option>
                            <option value="1">Approved</option>
                            <option value="2">Declined</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-12 d-flex align-items-center">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </form>

            <div class="col-12 mx-auto">
                <table class="table bg-white custab mt-5">
                    <thead class="text-center">
                        <tr>
                            <th>SC Number</th>
                            <th>Farmer Name</th>
                            <th>Farmer Phone</th>
                            <th>Amount</th>
                            <th>Quantity</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr class="text-center">
                                <td>{{ $item->sc_number }}</td>
                                <td>{{ $item->sc_order->farmer->name }}</td>
                                <td>{{ $item->sc_order->farmer->phone }}</td>
                                <td>{{ $item->amount }}</td>
                                <td>{{ $item->r_qty }}</td>
                                <td class="action">{{ $item->status_format }}</td>
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


    </div>

    </div>

@endsection
