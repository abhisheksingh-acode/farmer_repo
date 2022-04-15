<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WarehouseController extends Controller
{
    public function index(Request $request)
    {
        $data = Warehouse::orderBy('id', 'DESC')->simplePaginate(10);
        if ($q = $request->search) {

            $data = Warehouse::where('name', 'LIKE', "%$q%")
                ->orWhere('email', 'LIKE', "%$q%")
                ->orWhere('phone', 'LIKE', "%$q%")
                ->orWhere('pincode', 'LIKE', "%$q%")
                ->simplePaginate(10);
        }

        return view("admin.warehouse.index", compact('data'));
    }

    public function show($id)
    {
        $data = Warehouse::find($id);

        return view("admin.warehouse.show", compact('data'));
    }
    public function create()
    {
        return view("admin.warehouse.create");
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'name'  => 'required | string',
            'phone' => ['min:10', 'required', 'unique:warehouses,phone'],
            'email' => ['email', 'required', 'unique:warehouses,email'],
            'address'   => 'required | min:12',
            'pincode'   => 'required | min:5',
            'password' => 'required'
        ]);

        $validate['password'] = Hash::make($validate['password']);
        $validate['status'] = 1;

        $validate['drum_total'] = 0;
        $validate['qty_total'] = 0;
        $validate['status'] = 1;


        $data = Warehouse::create($validate);

        return redirect()->route('admin.warehouse.index')->withSuccess('new warehouse added with id - ' . $data->id);
    }

    public function edit($id)
    {
        $data = Warehouse::find($id);
        return view("admin.warehouse.edit", compact('data'));
    }

    public function update($id, Request $request)
    {
        $data = Warehouse::find($id);

        $validate = $request->validate([
            'name'  => 'required | string',
            'phone' => ['min:10', 'required', 'unique:warehouses,phone,' . $id],
            'email' => ['email', 'required', 'unique:warehouses,email,' . $id],
            'address'   => 'required | min:12',
            'pincode'   => 'required | min:5',
            'password' => 'sometimes'
        ]);

        if ($request->password == null) {
            $validate['password']  = $data->password;
        } else {
            $validate['password'] = Hash::make($request['password']);
        }
        $data = Warehouse::where('id', $id)->update($validate);

        return redirect()->route('admin.warehouse.index')->withSuccess('warehouse updated with id - ' . $id);
    }
}
