@extends('admin.layout.layout')
@section('title', 'history')
@section('content')
    <div class=" main-content flex-wrap flex-md-nowrap p-4 ">
        <div class="container-fluid container-md mx-auto">
            <div class="col-12 uppercol mt-5">
                <p>Payment <span>/ Payment History</span></p>
                <h4>Payment History</h4>
            </div>

            <div class="col-12 mx-auto xscroll">
                <table class="table bg-white custab mt-4">
                    <thead class="text-center">
                        <tr>
                            <th>F.C ID</th>
                            <th>F.C Name</th>
                            <th>F.C Address</th>
                            <th>Allocated Amount</th>
                            <th>Date</th>
                            <th>Comment</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr class="text-center">
                                <td>{{ $item->fc->id }}</td>
                                <td>{{ $item->fc->name }}</td>
                                <td>{{ $item->fc->address }}</td>
                                <td>{{ $item->format_amount }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td style="width: 300px;">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" readonly=""
                                        style="width: 300px;">{{ $data->additional ?? '' }}</textarea>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">no data found</td>
                            </tr>
                        @endforelse


                    </tbody>
                </table>
                {{ $data->links() }}
            </div>
        </div>
    </div>


@endsection
