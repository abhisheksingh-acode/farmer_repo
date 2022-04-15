<?php

namespace App\Http\Controllers\Logistic;

use App\Http\Controllers\Controller;
use App\Models\LogisticOrder;
use Illuminate\Http\Request;
use App\Http\Traits\FileMoverTrait;
use App\Models\Support;

class LogisticController extends Controller
{
    function index(LogisticOrder $model)
    {

        $recent = $model->recentById(auth()->user()->id);

        return view("logistic.home.index", compact('recent'));
    }

    function update($id, Request $request)
    {
        $data = LogisticOrder::where('id', $id)->update(['status' => $request->status]);

        return LogisticOrder::find($id)->status_format;
    }

    function history(LogisticOrder $model)
    {
        $data = $model->history(auth()->user()->id);

        return view("logistic.history.index", compact('data'));
    }

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



    // support route methods


    public function support(Support $model)
    {
        $data = $model->activeLogiTickets();

        return view("logistic.support.index", compact('data'));
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
