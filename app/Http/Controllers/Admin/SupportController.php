<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    function farmer(Support $model)
    {
        $data = $model->getByRole('user');

        return view("admin.support.farmer", compact('data'));
    }


    function fcenter(Support $model)
    {
        $data = $model->getByRole('fcenter');
        return view("admin.support.fc", compact('data'));
    }


    function logistic(Support $model)
    {
        $data = $model->getByRole('logistic');
        return view("admin.support.logistic", compact('data'));
    }


    function warehouse(Support $model)
    {
        $data = $model->getByRole('warehouse');
        return view("admin.support.warehouse", compact('data'));
    }


    function edit($id)
    {

        $result = Support::find($id);
        $csrf = csrf_token();

        $url = route('admin.support.edit', ['id' => $id]);

        $data = "<form class='col-12' action='{$url}'
        method='POST' id='reply-form'>
        <input type='hidden' name='_token' value='{$csrf}' />
        <div class='my-3 col-12'>
            <p style='color: #5f5f5f !important;font-size: 14px;'>{$result->query}</p>
        </div>
        <div class='my-3 col-12'>
            <a class='text-white bg-primary p-2' href='{$result->file}' download='{$result->file}'><i class='fas fa-file'></i></a>
        </div>
        <div class='mb-3 col-12 '>
            <textarea class='form-control' name='reply' required style='height: 150px;'>{$result->reply}</textarea>
        </div>
    </form>";

        return $data;
    }

    function update($id, Request $request)
    {

        $data = Support::where('id', $id)->update([
            'reply' => $request->reply,
            'status' => 1
        ]);

        return back()->with('success', 'ticket resolved and updated reply');
    }
}
