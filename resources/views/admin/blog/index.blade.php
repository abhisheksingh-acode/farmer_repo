@extends('admin.layout.layout')
@section('title', 'create farmer')
@section('content')
    <div class=" main-content flex-wrap flex-md-nowrap p-4 ">
        <div class=" mx-5">
            <div class="col-12 uppercol mt-5">
                <p>Blog <span>/ All Blogs</span></p>
                <div class="d-flex justify-content-between">
                    <h4> All Blogs</h4>
                </div>
            </div>

            <div class="col-12 mx-auto">
                <table class="table bg-white custab mt-5">
                    <thead class="text-center">
                        <tr>
                            <th>No.</th>
                            <th>Title</th>
                            <th>Logo</th>
                            <th>Category ID</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr class="text-center">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td><img src="{{ $item->logo ?? asset('admins/asset/placeholder2.jpg') }}" alt=""></td>

                                <td>{{ $item->cat_id }}</td>
                                <td>
                                    {{ $item->status }}
                                </td>
                                <td class="action ">
                                    {{-- <i class="fas fa-solid fa-pen pe-3 text-success"></i> --}}
                                    <a href="{{ route('admin.blog.delete', ['id' => $item->id]) }}">
                                        <i class="fas fa-trash delete-icon text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <h4>no blogs found</h4>
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
