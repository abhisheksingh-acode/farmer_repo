@extends('admin.layout.layout')
@section('title', 'create farmer')
@section('content')
    <div class=" main-content flex-wrap flex-md-nowrap p-4 ">
        <div class=" mx-5">
            <div class="col-12 uppercol mt-5">
                <div class="d-flex justify-content-between">
                    <h4>Video</h4>
                </div>
            </div>

            <!--filter start -->
            <div class="accordion accordion-flush mt-5" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Add Video
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body" style="padding-left: 80px;">
                            <form action="{{ route('admin.video.create') }}" method="post">
                                @csrf
                                <div class="col-12 row g-3 align-items-center my-1">
                                    <div class="col-12 row g-3 align-items-center my-1">
                                        <div class="col-4 col-sm-3">
                                            <label for="inputname" class="col-form-label">Title</label>
                                        </div>
                                        <div class="col-8 col-sm-9 mx-sm-0 px-sm-0">
                                            <input type="text" id="inputname" class="form-control"
                                                placeholder="Video Title" name="name">
                                        </div>
                                    </div>
                                    <div class="col-12 row g-3 align-items-center my-1">
                                        <div class="col-4 col-sm-3">
                                            <label for="inputname" class="col-form-label">Description</label>
                                        </div>
                                        <div class="col-8 col-sm-9 mx-sm-0 px-sm-0">
                                            <input type="text" id="inputname" class="form-control"
                                                placeholder="description" name="description">
                                        </div>
                                    </div>
                                    <div class="col-12 row g-3 align-items-center my-1">
                                        <div class="col-4 col-sm-3">
                                            <label for="inputname" class="col-form-label">Category</label>
                                        </div>
                                        <div class="col-8 col-sm-9 mx-sm-0 px-sm-0">
                                            <select name="cat_id" id="" class="form-select">
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
                                            <label for="input" class="col-form-label">Url</label>
                                        </div>
                                        <div class="col-8 col-sm-9 mx-sm-0 px-sm-0">
                                            <input type="text" id="input" name="path" class="form-control"
                                                placeholder="Youtube URL">
                                        </div>
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
        <!--filter end -->


        @include('admin.include.fail')
        @include('admin.include.success')
        <div class=" d-flex flex-wrap mt-5">

            @forelse ($data as $item)
                <div class="video_card shadow m-3">
                    <p>{{ $item->name }}</p>
                    <iframe width="340" height="150" src="https://www.youtube.com/embed/o9N6P8xdqbo" class="bg-dark"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                    <a href="{{ route('admin.video.delete', ['id' => $item->id]) }}"
                        class="btn btn-primary col-11 mb-1 mt-3">Remove</a>
                </div>
            @empty
                <h4>no videos available</h4>
            @endforelse

        </div>




    </div>


    </div>
    </div>

@endsection
