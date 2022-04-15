@extends('admin.layout.layout')
@section('title', 'create farmer')
@section('content')
    <div class=" main-content flex-wrap flex-md-nowrap p-4 ">
        <div class=" mx-5">
            <div class="col-12 uppercol mt-5">
                <div class="d-flex justify-content-between">
                    <h4>Category</h4>
                </div>
            </div>

            <!--filter start -->
            <div class="accordion accordion-flush mt-5" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Add Category
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body" style="padding-left: 80px;">
                            <div class="col-12 row g-3 align-items-center my-1">
                                <form action="{{ route('admin.category.create') }}" method="post">
                                    @csrf
                                    <div class="col-12 row g-3 align-items-center my-1">
                                        <div class="col-4 col-sm-3">
                                            <label for="inputname" class="col-form-label">Category</label>
                                        </div>
                                        <div class="col-8 col-sm-9 mx-sm-0 px-sm-0">
                                            <input type="text" name="name" id="inputname" class="form-control"
                                                placeholder="Category Title">
                                        </div>
                                    </div>
                                    <div class="col-12 row g-3 align-items-center my-1">
                                        <div class="col-4 col-sm-3">
                                            <label for="input" class="col-form-label">parent ID (optional)</label>
                                        </div>
                                        <div class="col-8 col-sm-9 mx-sm-0 px-sm-0">
                                            <input type="text" id="input" name="url" class="form-control"
                                                placeholder="parent id">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-8 my-md-3 mx-auto">
                                        <button type="submit" class="btn btn-primary col-12 mb-3">Save</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--filter end -->



        <div class="d-flex flex-wrap mt-5 row">
            @forelse ($data as $item)
                <div class="video_card shadow p-3 m-3 rounded-0 ">
                    <h4 class="mb-3 mt-1 col-12 text-center">{{ $item->name }} - ({{ $item->id }})</h4>
                    <a href="{{ route('admin.category.delete', ['id' => $item->id]) }}"
                        class="btn btn-primary col-11 mb-1 mt-3">Remove</a>
                </div>
            @empty
                <h4>No category found</h4>
            @endforelse
        </div>




    </div>


    </div>
    </div>

@endsection
