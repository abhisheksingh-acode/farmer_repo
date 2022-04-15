<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

use App\Http\Traits\FileMoverTrait;
use App\Models\Kyc;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\DB;

class FarmerController extends Controller
{


    public function index(Request $request, User $model)
    {

        $data = User::orderBy('id', 'DESC')->simplePaginate(10);
        // if search query received
        if (count($request->all()) > 0) {
            $data = $model->searchFilter($request->all());
        }

        return view("admin.farmer.index", compact('data'));
    }



    public function create()
    {
        return view("admin.farmer.create");
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'name' => 'required | min:4',
            'phone' => ['required', 'min:10', 'unique:users,phone'],
            'email' => ['required', 'unique:users,email'],
            'password' => 'required | min:8',
            'c_password' => 'required | min:8 | same:password',
            'lang' => 'required',

            'photo' => 'required',
            'doc_type' => 'required',
            'doc'   => 'required',

            'bank_name' => 'required | string',
            'ac_number' => ['required', 'integer', 'unique:bank_details,ac_number'],
            'ac_holder' => 'required | string',
            'ac_ifsc' => 'required| min:7',

        ]);


        try {
            DB::beginTransaction();

            // create farmer for farmer id
            $userInput = $request->only('name', 'phone', 'email', 'password', 'lang');
            $userInput['password'] = Hash::make($userInput['password']);
            $user = User::create($userInput);

            // insert kyc
            $farmerPhoto = FileMoverTrait::move($request->photo, "23");
            $farmerDoc   = FileMoverTrait::move($request->doc, "24");

            $kyc = Kyc::create([
                'farmer_id' => $user->id,
                'photo'     => $farmerPhoto,
                'doc'       => $farmerDoc,
                'doc_type'  => $request->doc_type
            ]);

            // insert bank details
            $bank = DB::table('bank_details')->insert([
                'farmer_id' => $user->id,
                'bank_name' => $request->bank_name,
                'ac_number' => $request->ac_number,
                'ac_holder' => $request->ac_holder,
                'ac_ifsc' => $request->ac_ifsc,
            ]);

            DB::commit();

            return redirect()->route('admin.farmer.create')->withSuccess('new farmer registered with farmer id - ' . $user->id);
        } catch (\Exception $ex) {

            DB::rollBack();

            return back()->with('fail', $ex->getMessage());
        }
    }


    public function show($id)
    {
        $data = User::find($id);

        if ($data) {
            return view("admin.farmer.show", compact('data'));
        }
    }

    public function edit($id, Request $req)
    {
        $data = User::find($id);
        if ($data) {
            return view("admin.farmer.edit", compact('data'));
        }
    }


    public function update($id, Request $request)
    {

        $data = User::find($id);

        $validate = $request->validate([
            'name' => 'required | min:4',
            'phone' => ['min:10', 'unique:users,phone,' . $id],
            'email' => ['unique:users,email,' . $id],
            'password' => ['nullable', 'required_with:c_password', 'min:8'],
            'c_password' => 'required_with:password|same:password',
            'lang' => 'required',

            // 'photo' => 'required',
            'doc_type' => 'required',
            // 'doc'   => 'required',

            'bank_name' => 'required | string',
            'ac_number' => ['required', 'integer', 'unique:bank_details,ac_number,' . $data->bank->id],
            'ac_holder' => 'required | string',
            'ac_ifsc' => 'required| min:7',

        ], [
            'c_password.same' => 'confirm password must same as password',
            'c_password.required' => 'confirm password field is required',
            'c_password.required_with' => 'confirm password field is required',
        ]);


        try {
            DB::beginTransaction();

            // update farmer
            $userInput = $request->only('name', 'phone', 'email', 'password', 'lang');


            if ($userInput['password'] == null) {
                $userInput['password'] = $data->password;
            } else {
                $userInput['password'] = Hash::make($userInput['password']);
            }


            $user = User::where('id', $id)->update($userInput);

            // update kyc
            $kycInput = $request->only('doc_type');

            if (isset($request->photo)) {
                $farmerPhoto = FileMoverTrait::move($request->photo, "23");
                $kycInput['photo'] = $farmerPhoto;
            }
            if (isset($request->doc)) {
                $farmerDoc   = FileMoverTrait::move($request->doc, $id);
                $kycInput['doc'] = $farmerDoc;
            }

            $kyc = Kyc::where('farmer_id', $id)->update($kycInput);

            // update bank details
            $bank = DB::table('bank_details')->where('farmer_id', $id)->update([
                'bank_name' => $request->bank_name,
                'ac_number' => $request->ac_number,
                'ac_holder' => $request->ac_holder,
                'ac_ifsc' => $request->ac_ifsc,
            ]);

            DB::commit();

            return redirect()->route('admin.farmer.create')->withSuccess('farmer updated with farmer id - ' . $id);
        } catch (\Exception $ex) {

            DB::rollBack();

            return back()->with('fail', $ex->getMessage());
        }
    }



    public function delete($id, Request $req)
    {

        if ($user = User::find($id)) {

            $user = User::where('id', $id)->delete();

            return back()->withSuccess('Deleted Successfully');
        }

        return back()->withErrors('User not exist');
    }
}
