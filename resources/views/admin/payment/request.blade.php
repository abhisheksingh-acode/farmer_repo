@extends('admin.layout.layout')
@section('title', 'create farmer')
@section('content')
    <div class=" main-content flex-wrap flex-md-nowrap p-4 ">
        <div class="container-fluid container-md mx-auto">
            <div class="col-12 uppercol mt-5">
                <p>Payment <span>/ Payment Request</span></p>
                <h4>Payment Request</h4>
            </div>

            <div class="col-12 mx-auto xscroll">
                @include('admin.include.fail')
                @include('admin.include.success')
                <table class="table bg-white custab mt-4">
                    <thead class="text-center">
                        <tr>
                            <th>SC Number</th>
                            <th>F.C Name</th>
                            <th>Farmer's Name</th>
                            <th>Order Details</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Pay</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $item->sc_number }}</td>
                                <td>{{ $item->fc->name }}</td>
                                <td>{{ $item->sc_order->farmer->name }}</td>
                                <td>{{ $item->r_qty }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->amount }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.payment.pay', ['sc' => $item->sc_number]) }}"
                                        class="btn btn-info px-3 py-0 pay show">Pay</a>
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
