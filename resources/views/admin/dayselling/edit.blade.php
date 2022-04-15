@extends('admin.layout.layout')
@section('title', 'day selling')
@section('content')
    <div class="main-content flex-wrap flex-md-nowrap p-4 ">
        <div class="mx-5">
            <div class="col-12 uppercol mt-5">
                <div class="d-flex justify-content-between">
                    <h4>Day Selling Price</h4>
                    <div class="d-flex ">
                        <a href="{{ route('admin.dayselling.index') }}" class="btn btn-secondary px-3 py-2">Add Price</a>
                    </div>
                </div>
            </div>

            {{-- add form --}}

            <div class="container-fluid mx-auto bg-white py-4 px-3">

                @include('admin.include.fail')
                @include('admin.include.success')

                <form action="{{ route('admin.dayselling.edit', ['id' => $filled->id]) }}" method="POST"
                    class="row align-items-end">
                    @csrf
                    <div class="col-5 form-group">
                        <label for="price" class="form-label">Price</label>
                        <small class="text-danger">
                            @error('price')
                                :{{ $message }}
                            @enderror
                        </small>
                        <input type="number" class="form-control" id="price" name="price" value="{{ $filled->price }}">
                    </div>
                    <div class="col-5 form-group">
                        <label for="date" class="form-label">Date</label>
                        <small class="text-danger">
                            @error('date')
                                :{{ $message }}
                            @enderror
                        </small>
                        <input type="date" class="form-control" id="datetime" name="date"
                            value="{{ old('date') ?? $filled->date }}">
                    </div>

                    <div class="form-group col-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                </form>
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
                        <div class="accordion-body d-flex">
                            <div class="col-md-9 mb-2">
                                <form id="filter-form" action="{{ route('admin.dayselling.index') }}" method="GET"
                                    class="row">
                                    <div class="col-md-9 col-12 my-3">
                                        <input type="date" name="query" class="form-control">
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-3 col-8 my-md-3 mx-auto">
                                <button type="submit" form="filter-form" class="btn btn-primary col-12 mb-3">Filter</button>
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
                            <th>ID</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr class="text-center">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->price }} </td>
                                <td>{{ $item->date }} </td>
                                <td>
                                    <a href="{{ route('admin.dayselling.edit', ['id' => $item->id]) }}"
                                        class="btn btn-danger">edit</a>
                                </td>
                            </tr>
                        @empty
                        @endforelse

                    </tbody>
                </table>

                {{ $data->links() }}

            </div>
        </div>
    </div>
    </div>


@endsection
