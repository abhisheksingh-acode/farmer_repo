@extends('admin.layout.layout')
@section('title', 'farmers')
@section('content')
    <div class="main-content flex-wrap flex-md-nowrap p-4 ">
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
                                <form action="{{ route('admin.farmer.index') }}" method="post" class="row"
                                    id="query">
                                    @csrf
                                    <div class="col-md-4 col-12 my-3">
                                        <input type="text" class="form-control" name="name" placeholder="Search by name"
                                            value="{{ old('name') }}">
                                    </div>
                                    <div class="col-md-4 col-12 my-3">
                                        <input type="text" class="form-control" name="email_phone"
                                            placeholder="Search by email/phone" value="{{ old('email_phone') }}">
                                    </div>
                                    {{-- <div class="col-md-3 col-12 my-3">
                                        <select class="form-select" name="">
                                            <option selected="">Facilitator center</option>
                                            <option value="1">F.C 1</option>
                                            <option value="2">F.C 2</option>
                                            <option value="2">F.C 3</option>
                                            <option value="2">F.C 4</option>
                                            <option value="2">F.C 5</option>
                                            <option value="2">F.C 6</option>
                                        </select>
                                    </div> --}}
                                    {{-- <div class="col-md-3 col-12 my-3">
                                        <input type="date" class="form-control">
                                    </div> --}}

                                    <div class="col-md-4 col-12 my-3">
                                        <select class="form-select" name="sort_by" value="{{ old('sort_by') }}">
                                            <option value="">Sort</option>
                                            <option value="date_dsc">Newest</option>
                                            <option value="date_asc">Oldest</option>
                                            <option value="alphabetic_asc">A-Z</option>
                                            <option value="alphabetic_dsc">Z-A</option>
                                        </select>
                                    </div>
                                </form>

                            </div>
                            <div class="col-md-3 col-8 my-md-3 ms-auto">
                                <button type="submit" form="query" class="btn btn-primary col-12 mb-3">Filter</button>
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
                            <th>Registered Date</th>
                            <th>Status</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr class="text-center">
                                <td>{{ $item->id }} </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->email }}</td>
                                {{-- <td></td> --}}
                                <td>{{ $item->created_at }}</td>

                                <td>Active</td>
                                {{-- <td class="action">
                                    <div class="outerDivFull">
                                        <div class="switchToggle">
                                            <input type="checkbox" name="status" {{ $item->status ? 'checked' : '' }}
                                                id="switch">
                                            <label for="switch">Toggle</label>
                                        </div>
                                    </div>
                                </td> --}}
                                <td><a href="{{ route('admin.farmer.profile', ['id' => $item->id]) }}">View</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    no result found
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
