@extends('fc.layout.index')
@section('title', 'fcenter')
@section('content')
    <div class=" main-content flex-wrap flex-md-nowrap p-4 ">
        <div class=" mx-5">
            <div class="col-12 uppercol mt-5">
                <h4>Wallet</h4>
            </div>
            <div class="row">
                <div class="col-md-4 col-12">
                    <div class="dash_card" style=" background: #FFCDD2;">
                        <i class="fa-solid fa-coins fs-4 ms-lg-3 text-primary " style="color: #ff7381  !important;"></i>
                        <h6 class="pt-3">Total Allocation</h6>
                        <p>₹{{ auth()->user()->total }}.00</p>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="dash_card" style=" background: #87b5ff;">
                        <i class="fa-solid fa-coins fs-4 ms-lg-3 text-primary " style="    color: #0062ff;"></i>
                        <h6 class="pt-3">Total spent</h6>
                        <p>₹{{ auth()->user()->spent }}.00</p>
                    </div>
                </div>
                <div class="col-md-4 col-12" style="padding-right: 0px;">
                    <div class="dash_card" style=" background: #99d89c;">
                        <i class="fa-solid fa-coins fs-4 ms-lg-3 text-primary " style="    color: #376339 !important;"></i>
                        <h6 class="pt-3">Total balance</h6>
                        <p>₹{{ auth()->user()->allocation }}.00</p>
                    </div>
                </div>
            </div>

            <div class="col-12 mx-auto xscroll  mt-5">
                <table class="table bg-white custab">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">S.C number</th>
                            <th scope="col">Debited</th>
                            <th scope="col">To</th>
                            {{-- <th scope="col">Reference number</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->sc_number }}</td>
                                <td>{{ $item->amount }}</td>
                                <td>{{ $item->sc_order->farmer->name }}</td>
                                {{-- <td>{{$item->}}</td> --}}
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">no data found</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>

                {{ $data->links() }}
            </div>
        </div>
    </div>


@endsection
