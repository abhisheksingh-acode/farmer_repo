@extends('admin.layout.layout')
@section('title', 'facilitators')
@section('content')
    <div class=" main-content flex-wrap flex-md-nowrap p-4 ">
        <div class=" mx-5">
            <div class="col-12 uppercol mt-5">
                <p>Facilitator Center <span>/ All Facilitator Center</span></p>
                <div class="d-flex justify-content-between">
                    <h4>All Facilitator Center</h4>
                </div>
            </div>





            <div class="col-12 mx-auto">
                @include('admin.include.fail')
                @include('admin.include.success')
                <table class="table bg-white custab mt-5">
                    <thead class="text-center">
                        <tr>
                            <th>Facilitator Center</th>
                            <th>F.C. Address</th>
                            <th>Pincode</th>
                            <th>Phone no.</th>
                            <th>Email ID</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr class="text-center">
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->address }}</td>
                                <th>{{ $item->pincode }}</th>
                                <th>{{ $item->phone }}</th>
                                <th>{{ $item->email }}</th>
                                <td>
                                    <a href="{{ route('admin.fcenter.edit', ['id' => $item->id]) }}"><i
                                            class="fa-solid fa-pen-to-square"></i></a></span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    no data found
                                </td>
                            </tr>
                        @endforelse


                    </tbody>
                </table>
            </div>




        </div>


    </div>
    </div>

@endsection
