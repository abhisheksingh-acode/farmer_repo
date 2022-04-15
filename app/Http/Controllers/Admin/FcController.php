<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fcenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FcController extends Controller
{
    public function index(Request $request)
    {
        $data = Fcenter::orderBy('id', 'DESC')->simplePaginate(10);

        return view("admin.fcenter.index", compact('data'));
    }

    public function show($id)
    {
        return view("admin.fcenter.index");
    }
    public function create()
    {
        return view("admin.fcenter.create");
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'name'  => 'required | string',
            'phone' => ['min:10', 'required', 'unique:fcenters,phone'],
            'email' => ['email', 'required', 'unique:fcenters,email'],
            'address'   => 'required | min:12',
            'pincode'   => 'required | min:5',
            'password' => 'required'
        ]);

        $validate['password'] = Hash::make($validate['password']);
        $data = Fcenter::create($validate);

        return redirect()->route('admin.fcenter.index')->withSuccess('new facilitator added with id - ' . $data->id);
    }

    public function edit($id)
    {
        $data = Fcenter::find($id);
        return view("admin.fcenter.edit", compact('data'));
    }

    public function update($id, Request $request)
    {
        $data = Fcenter::find($id);

        $validate = $request->validate([
            'name'  => 'required | string',
            'phone' => ['min:10', 'required', 'unique:fcenters,phone,' . $id],
            'email' => ['email', 'required', 'unique:fcenters,email,' . $id],
            'address'   => 'required | min:12',
            'pincode'   => 'required | min:5',
            'password' => 'sometimes'
        ]);

        if ($request->password == null) {
            $validate['password']  = $data->password;
        } else {
            $validate['password'] = Hash::make($request['password']);
        }
        $data = Fcenter::where('id', $id)->update($validate);

        return redirect()->route('admin.fcenter.index')->withSuccess('facilitator updated with id - ' . $id);
    }

    public function searchPincode($pincode)
    {

        $data = Fcenter::where('pincode', $pincode)->get();

        $options = "";
        if (count($data) > 0) {

            foreach ($data as $key => $val) {
                $options .= "<option value='{$val->id}'>$val->name - $val->address</option>";
            }
        }
        return $options;
    }
}
