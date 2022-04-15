@extends('admin.layout.layout')
@section('title', 'create farmer')
@section('content')
    <div class=" main-content  pb-3 pt-4 px-auto  ">
        <div class=" mx-auto mb-5" style="height:1000px;">
            <div class="uppercol  my-3 my-md-5 mx-3 px-0 px-sm-1 mx-sm-4">
                <p>Blog <span>/ Add Blog</span></p>
                <div class="d-flex justify-content-between">
                    <h4 class="text-nowrap">Add Blog</h4>

                </div>
            </div>

            <div class=" px-0 my-4 bg-white px-5 py-4 shadow-sm rounded-3 add_farmer">

                <form action="{{ route('admin.blog.create') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="col-12 row g-3 align-items-center my-1">
                        <div class="col-4 col-sm-3">
                            <label for="inputname" class="col-form-label">Title</label>
                        </div>
                        <div class="col-8 col-sm-9 mx-sm-0 px-sm-0">
                            <input type="text" name="name" required id="inputname" class="form-control"
                                placeholder="Title">
                        </div>
                    </div>
                    <div class="row g-3 align-items-center my-1">
                        <div class="col-4 col-sm-3">
                            <label for="input" class="col-form-label">Description</label>
                        </div>
                        <div class="col-8 col-sm-6 mx-sm-0 px-sm-0">
                            <textarea class="form-control" required name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

                    </div>
                    <div class="row g-3 align-items-center my-1">
                        <div class="col-4 col-sm-3">
                            <label for="input" class="col-form-label">Meta</label>
                        </div>
                        <div class="col-8 col-sm-6 mx-sm-0 px-sm-0">
                            <textarea class="form-control" name="meta" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

                    </div>
                    <div class="col-12 row g-3 align-items-center my-1">
                        <div class="col-4 col-sm-3">
                            <label for="formFile" class="form-label">Logo</label>
                        </div>
                        <div class="col-8 col-sm-9">
                            <input type="file" name="logo" required id="formFile" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 row g-3 align-items-center my-1">
                        <div class="col-4 col-sm-3">
                            <label for="formFile" class="form-label">Category</label>
                        </div>
                        <div class="col-8">
                            <select name="cat_id" id="" class="form-select" required>
                                @forelse ($cats as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @empty
                                    <option value="">N/A</option>
                                @endforelse
                            </select>
                        </div>

                    </div>
                    <div class="col-12 row g-3 align-items-center my-1">
                        <div class="col-4 col-sm-3">
                            <label for="formFile" class="form-label">Status</label>
                        </div>
                        <div class="col-8 col-sm-9">
                            <select class="form-select" required aria-label="Default select example">
                                <option value="">Select</option>
                                <option value="1">Publish</option>
                                <option value="0">Draft</option>
                            </select>
                        </div>
                    </div>


            </div>
            <div class="col-12 g-3 align-items-center my-1  text-end bg-white" style="height:60px;">
                <button type="submit" class="btn btn-secondary px-5 py-2 me-sm-4">Save</button>
            </div>
            </form>
        </div>

    </div>


    </div>





@endsection
