<?php

namespace App\Http\Controllers\Fcenter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Support;

use App\Http\Traits\FileMoverTrait;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Support $model)
    {
        $data = $model->activeFcTickets();

        return view("fc.support.index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'role' => 'fcenter',
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
    public function view($id)
    {
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
}
