@extends('admin.layout.layout')
@section('title', 'edit farmer')
@section('content')
    <div class=" main-content flex-wrap flex-md-nowrap pb-3 pt-3 px-auto mx-auto">
        <div class="container mx-auto mb-5">
            <div class=" uppercol my-3 my-md-5  mx-1 px-0 px-sm-1 mx-sm-4">
                <p>Warehouse <span>/ Add Warehouse</span></p>
                <div class="d-flex justify-content-between">
                    <h4 class="text-nowrap">Edit Warehouse</h4>
                </div>
            </div>

            <div class="mt-4 p-4 mb-4 bg-white px-5 shadow-sm rounded-3 add_order">
                <form action="{{ route('admin.warehouse.edit', ['id' => $data->id]) }}" method="post">
                    @include('admin.include.fail')
                    @include('admin.include.success')
                    @csrf

                    <div class="col-12   row g-3 align-items-center my-1">
                        <div class="col-3 col-sm-2">
                            <label for="inputname" class="col-form-label">Name</label>
                        </div>
                        <div class="col-9 col-sm-10 mx-sm-0 px-sm-0">
                            <input type="text" id="inputname" class="form-control" placeholder="Name" name="name"
                                value="{{ $data->name }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12   row g-3 align-items-center my-1">
                        <div class="col-3 col-sm-2">
                            <label for="inputtext" class="col-form-label">Address</label>
                        </div>
                        <div class="col-9 col-sm-10 mx-sm-0 px-sm-0">
                            <input type="text" id="inputname" class="form-control" placeholder="address" name="address"
                                value="{{ $data->address }}">
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12   row g-3 align-items-center my-1">
                        <div class="col-3 col-sm-2">
                            <label for="inputpincode" class="col-form-label">Pincode</label>
                        </div>
                        <div class="col-9 col-sm-10 mx-sm-0 px-sm-0">
                            <input type="text" id="inputname" class="form-control" placeholder="pincode" name="pincode"
                                value="{{ $data->pincode }}">
                            @error('pincode')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12   row g-3 align-items-center my-1">
                        <div class="col-3 col-sm-2">
                            <label for="inputtext" class="col-form-label">Email</label>
                        </div>
                        <div class="col-9 col-sm-10 mx-sm-0 px-sm-0">
                            <input type="email" id="inputname" class="form-control" placeholder="email" name="email"
                                value="{{ $data->email }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-3 col-sm-2">
                            <label for="inputtext" class="col-form-label">Phone</label>
                        </div>
                        <div class="col-9 col-sm-10 mx-sm-0 px-sm-0">
                            <input type="number" id="inputname" class="form-control" placeholder="phone" name="phone"
                                value="{{ $data->phone }}">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-3 col-sm-2">
                            <label for="inputtext" class="col-form-label">Password</label>
                        </div>
                        <div class="col-9 col-sm-10 mx-sm-0 px-sm-0">
                            <input type="password" id="inputname" class="form-control" placeholder="******"
                                name="password" value="">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 g-3 mt-3 align-items-center my-1  text-end bg-white" style="height:60px;">
                        <button type="submit" class="btn btn-secondary px-5 py-2 me-sm-4">Save</button>
                    </div>
                </form>
            </div>

        </div>


    </div>




    </div>

    </div>

@endsection
