<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DaySelling;
use Illuminate\Http\Request;

class DaySellingController extends Controller
{
    public function index(Request $request, DaySelling $model)
    {

        $data = $model::orderBy('id', 'DESC')->simplePaginate(5);


        // filter search by date
        if ($date = $request->input('query')) {
            $data = $model::where('date', "$date")->orderBy('id', 'DESC')->simplePaginate(5);
        }

        return view("admin.dayselling.index", compact('data'));
    }



    public function store(Request $request, DaySelling $model)
    {
        $validate = $request->validate([
            'price' => 'required | min:1',
            'date'  => 'required | unique:day_sellings,date'
        ]);
        try {

            $data = $model::create($validate);
            return back()->withSuccess('operation performed successfuly');
        } catch (\Exception $ex) {
            return back()->with('fail', $ex->getMessage());
        }
    }



    public function edit($id, DaySelling $model)
    {

        $filled = $model::find($id);
        $data = $model::orderBy('id', 'DESC')->simplePaginate(5);
        if ($filled) {
            return view("admin.dayselling.edit", compact('data', 'filled'));
        }

        return back()->with('fail', 'something went wrong with database');
    }


    public function update($id, Request $request, DaySelling $model)
    {

        $validate = $request->validate([
            'price' => 'required',
            'date'  => 'unique:day_sellings,date,' . $id,
        ]);

        $data =  $model::where('id', $id)->update($validate);

        if ($data) {
            return redirect()->route('admin.dayselling.index')->withSuccess('operation performed successfuly');
        }
        return back()->with('fail', 'operation failed');
    }
}
