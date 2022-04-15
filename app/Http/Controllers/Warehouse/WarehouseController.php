<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;
use App\Http\Traits\FileMoverTrait;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("warehouse.home.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function history()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file) {
            $file = FileMoverTrait::move($request->file);
        }

        $data = Support::create([
            'role' => 'logistic',
            'role_id' => auth()->user()->id,
            'query' => $request->input('query'),
            'file'  => $file ?? ''
        ]);

        return back()->with('success', 'ticket created with ticket-id = ' . $data->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function support(Support $model)
    {
        $data = $model->activeWarehouseTickets();

        return view("logistic.support.index", compact('data'));
    }


    function addticket()
    {

        return "add";
    }

    public function view($id)
    {
        // return $id;
        $result = Support::find($id);

        $data = "<form class='col-12'>
        <div class='form-group'>
            <label for='id'>Ticket ID</label>
            <p class='py-2' style='color:#c7c7c7;'>{$result->id}</p>
        </div>
        <div class='form-group'>
            <label for='id'>Query/Issue</label>
            <p class='pt-2' style='color: #c7c7c7 !important;font-size: 14px;'>{$result->query}</p>
        </div>
        <div class='form-group'>
            <label for='id'>Reply</label>
            <p class='pt-2' style='color:#c7c7c7;font-size: 14px;'>{$result->reply}</p>
        </div>
    </form>";

        return $data;
    }
}
