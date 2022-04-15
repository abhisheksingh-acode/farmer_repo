<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LogisticController extends Controller
{
    public function index(Request $request)
    {
        $data = Logistic::orderBy('id', 'DESC')->simplePaginate(10);
        if ($q = $request->search) {

            $data = Logistic::where('name', 'LIKE', "%$q%")
                ->orWhere('email', 'LIKE', "%$q%")
                ->orWhere('phone', 'LIKE', "%$q%")
                ->orWhere('pincode', 'LIKE', "%$q%")
                ->simplePaginate(10);
        }

        return view("admin.logistic.index", compact('data'));
    }

    public function show($id)
    {
        $data = Logistic::find($id);

        return view("admin.logistic.show", compact('data'));
    }
    public function create()
    {
        return view("admin.logistic.create");
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'name'  => 'required | string',
            'phone' => ['min:10', 'required', 'unique:logistics,phone'],
            'email' => ['email', 'required', 'unique:logistics,email'],
            'address'   => 'required | min:12',
            'pincode'   => 'required | min:5',
            'password' => 'required'
        ]);

        $validate['password'] = Hash::make($validate['password']);
        $validate['status'] = 1;
        $data = Logistic::create($validate);

        return redirect()->route('admin.logistic.index')->withSuccess('new logistic added with id - ' . $data->id);
    }

    public function edit($id)
    {
        $data = Logistic::find($id);
        return view("admin.logistic.edit", compact('data'));
    }

    public function update($id, Request $request)
    {
        $data = Logistic::find($id);

        $validate = $request->validate([
            'name'  => 'required | string',
            'phone' => ['min:10', 'required', 'unique:logistics,phone,' . $id],
            'email' => ['email', 'required', 'unique:logistics,email,' . $id],
            'address'   => 'required | min:12',
            'pincode'   => 'required | min:5',
            'password' => 'sometimes'
        ]);

        if ($request->password == null) {
            $validate['password']  = $data->password;
        } else {
            $validate['password'] = Hash::make($request['password']);
        }
        $data = Logistic::where('id', $id)->update($validate);

        return redirect()->route('admin.logistic.index')->withSuccess('logistic updated with id - ' . $id);
    }
}
