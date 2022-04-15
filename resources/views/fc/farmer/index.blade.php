@extends('fc.layout.index')
@section('title', 'fcenter')
@section('content')
    <div class=" main-content flex-wrap flex-md-nowrap p-4 ">
        <div class=" mx-5">
            <div class="col-12 uppercol mt-5">
                <p>Farmer <span>/ All Farmer</span></p>
                <div class="d-flex justify-content-between">
                    <h4>All Farmer</h4>
                </div>
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
                                <form action="{{ route('fcenter.farmer.index') }}" method="post" class="row">
                                    @csrf
                                    <div class="col-md-3 col-12 my-3">
                                        <input type="date" class="form-control">
                                    </div>

                                    <div class="col-md-3 col-12 my-3">
                                        <input type="text" class="form-control" placeholder="ID">
                                    </div>
                                </form>

                            </div>
                            <div class="col-md-3 col-8 my-md-3 m-auto">
                                <button type="submit" class="btn btn-primary col-12 mb-3">Filter</button>
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
                            <th>Unique ID</th>
                            <th>Name</th>
                            <th>Phone no.</th>
                            <th>Email ID</th>
                            {{-- <th>Location</th> --}}
                            <th>Created Date</th>
                            <th>Status</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr class="text-center">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->email }}</td>
                                {{-- <td>{{ $item->address }}</td> --}}
                                <td>{{ $item->created_at }}</td>
                                <td class="action">
                                    {{ $item->status }}
                                </td>
                                <td><a href="{{ route('fcenter.farmer.show', ['id' => $item->id]) }}">View</a></td>
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

@endsection
