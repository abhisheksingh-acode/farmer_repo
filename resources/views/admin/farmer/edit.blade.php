@extends('admin.layout.layout')
@section('title', 'create farmer')
@section('content')
    <div class="main-content  pb-3 pt-4 px-auto  ">
        <div class="mx-auto mb-5" style="height:1000px;">
            <div class="uppercol  my-3 my-md-5 mx-3 px-0 px-sm-1 mx-sm-4">
                <p>Farmers <span>/ Add Farmers</span></p>
                <div class="d-flex justify-content-between">
                    <h4 class="text-nowrap">Add Farmers</h4>

                </div>
            </div>

            <div class=" px-0 my-4 bg-white px-5 py-4 shadow-sm rounded-3 add_farmer">
                <form action="{{ route('admin.farmer.edit', ['id' => $data->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @include('admin.include.fail')
                    @include('admin.include.success')

                    @csrf
                    <div class="col-12 row g-3 align-items-center my-1">
                        <div class="col-3 col-sm-2">
                            <label for="inputname" class="col-form-label">Name</label>
                        </div>
                        <div class="col-9 col-sm-10 mx-sm-0 px-sm-0">
                            <input type="text" id="inputname" name="name" class="form-control" placeholder="Name"
                                value="{{ $data->name }}">

                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 row g-3 align-items-center my-1">
                        <div class="col-3 col-sm-2">
                            <label for="inputphone" class="col-form-label">Phone no.</label>
                        </div>
                        <div class="col-9 col-sm-10 mx-sm-0 px-sm-0">
                            <input type="phone" id="inputphone" name="phone" class="form-control" placeholder="Phone no."
                                value="{{ $data->phone }}">

                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 row g-3 align-items-center my-1">
                        <div class="col-3 col-sm-2">
                            <label for="inputmail" class="col-form-label">Email</label>
                        </div>
                        <div class="col-9 col-sm-10 mx-sm-0 px-sm-0">
                            <input type="email" id="inputmail" name="email" class="form-control" placeholder="abc@xyz"
                                value="{{ $data->email }}">

                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-3 align-items-center my-1">
                        <div class="col-3 col-sm-2">
                            <label for="inputPassword6" class="col-form-label">Password</label>
                        </div>
                        <div class="col-6 col-sm-7 mx-sm-0 px-sm-0">
                            <input type="password" id="inputPassword6" name="password" class="form-control"
                                aria-describedby="passwordHelpInline" placeholder="Password">

                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-auto">
                            <span id="passwordHelpInline" class="form-text">
                                Must be 8-20 characters long.
                            </span>
                        </div>
                    </div>
                    <div class="row g-3 align-items-center my-1">
                        <div class="col-3 col-sm-2">
                            <label for="inputPassword6" class="col-form-label">Re-Enter Password</label>
                        </div>
                        <div class="col-6 col-sm-7 mx-sm-0 px-sm-0">
                            <input type="password" id="inputPassword6" name="c_password" class="form-control"
                                aria-describedby="passwordHelpInline" placeholder="Re-Enter Password">

                            @error('c_password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-auto">
                            <span id="passwordHelpInline" class="form-text">
                                Must be same as password.
                            </span>
                        </div>
                    </div>
                    <div class="col-12 row g-3 align-items-center my-1">
                        <div class="col-3 col-sm-2">
                            <label for="inputmail" class="col-form-label">Language</label>
                        </div>
                        <div class="col-9 col-sm-10 mx-sm-0 px-sm-0">
                            <input type="text" id="inputmail" name="lang" class="form-control" placeholder="language"
                                value="{{ $data->lang }}">

                            @error('lang')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 row g-3 align-items-center my-1">
                        <div class="col-3 col-sm-2">
                            <label for="formFile" class="form-label">Profile Photo</label>
                        </div>
                        <div class="col-8 col-sm-9">
                            <input type="file" accept="image/*" onchange="readURL(this,'photo')" id="formFile" name="photo"
                                class="form-control">
                            @error('photo')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-1 col-sm-1">
                            <img src="{{ $data->kyc->photo }}" alt="" id="photo" width="auto" height="50px">
                        </div>
                    </div>
                    <div class="col-12 row g-3 align-items-center my-1">
                        <div class="col-3 col-sm-2">
                            <label for="formFile" class="form-label">Farmer ID</label>
                        </div>
                        <div class="col-9 col-sm-10">
                            <select class="form-select" name="doc_type" aria-label="Disabled select example">
                                <option selected value="{{ $data->kyc->doc_type }}">{{ $data->kyc->document }}
                                </option>
                                <option value="aadhaar">Aadhar Card</option>
                                <option value="pan">PAN Card</option>
                                <option value="electricity">Electricity Bill</option>
                                <option value="voter">Voter Card</option>
                            </select>
                            @error('doc_type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-8 col-sm-9 ms-auto">
                            <input type="file" accept="image/*" id="formFile" name="doc" onchange="readURL(this,'doc')"
                                class="form-control">

                            @error('doc')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-1 col-sm-1">
                            <img src="{{ $data->kyc->doc }}" alt="" id="doc" width="auto" height="40px">
                        </div>
                    </div>
                    <div class="col-12 row g-3 align-items-center my-1 mb-3">
                        <div class="col-12 d-flex justify-content-center">
                            <h5>Bank details</h5>
                        </div>
                        <div class="col-3 col-sm-2">
                            <label for="inputbank name" class="col-form-label">Bank Name</label>
                        </div>
                        <div class="col-9 col-sm-10">
                            <input type="text" id="inputtext" name="bank_name" class="form-control"
                                placeholder="Bank Name" value="{{ $data->bank->bank_name }}">

                            @error('bank_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-3 col-sm-2">
                            <label for="inputbank account no." class="col-form-label">Bank account no.</label>
                        </div>
                        <div class="col-9 col-sm-10">
                            <input type="text" id="inputtext" name="ac_number" class="form-control"
                                placeholder="Bank account no." value="{{ $data->bank->ac_number }}">
                            @error('ac_number')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-3 col-sm-2">
                            <label for="inputaccount holders name" class="col-form-label">Account holders name</label>
                        </div>
                        <div class="col-9 col-sm-10">
                            <input type="text" id="inputtext" name="ac_holder" class="form-control"
                                placeholder="Bank account holders name" value="{{ $data->bank->ac_holder }}">
                            @error('ac_holder')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-3 col-sm-2">
                            <label for="inputifsc code" class="col-form-label">Ifsc code</label>
                        </div>
                        <div class="col-9 col-sm-10">
                            <input type="text" id="inputtext" name="ac_ifsc" class="form-control" placeholder="Ifsc code"
                                value="{{ $data->bank->ac_ifsc }}">

                            @error('ac_ifsc')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
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

@push('js')
    <script>
        function readURL(input, id) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector("#" + id).setAttribute("src", e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
