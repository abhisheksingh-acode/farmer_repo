<?php

namespace App\Http\Controllers;

use App\Models\OrderTable;
use Carbon\Carbon;
use Illuminate\Http\Request;
// use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class OrderTableController extends Controller
{
    public function index()
    {
        return "index page";
    }


    public function post(Request $req)
    {

        $validate = $req->validate([
            'farmer_id' => ['required', 'exists:users,id'],
            'qty'       => 'required',
            'price'     => 'required',
            'day_selling_id' => 'required',
            'sc_number' => 'required'
        ]);

        $req['date'] = Carbon::now();

        $data = OrderTable::create($req->all());

        if (!$data) {

            if ($req->expectsJson()) {
                return response()->json([
                    'message' => 'failed',
                    'errors'   => 'database error',
                ], 404);
            }

            return back()->withErrors('failed');
        }

        // if not errors

        if ($req->expectsJson()) {
            return response()->json([
                'message' => 'successfull created',
                'data'    => $data
            ], Response::HTTP_CREATED);
        }

        return back()->withSuccess('Successfull created order id: ' . $data->id);
    }


    public function edit($id, Request $req)
    {

        if (!OrderTable::find($id)) {

            if ($req->expectsJson()) {
                return response()->json([
                    'message' => 'failed',
                ], Response::HTTP_NOT_FOUND);
            }

            return back()->withErrors('failed');
        }

        // if not errors

        $data = OrderTable::find($id);

        if ($req->expectsJson()) {
            return response()->json([
                'message' => 'data found successfuly',
                'data'    => $data
            ], Response::HTTP_FOUND);
        }

        return $data;
    }


    public function update($id, Request $req)
    {

        $validate = $req->validate([
            'farmer_id' => 'exists:users,id',
        ]);

        if (isset($req->date)) {
            $req['date'] = Carbon::now();
        }

        $data = OrderTable::where('id', $id)->update($req->all());

        if (!$data) {

            if ($req->expectsJson()) {
                return response()->json([
                    'message' => 'failed',
                ], Response::HTTP_NOT_FOUND);
            }

            return back()->withErrors('failed');
        }

        // if not errors

        if ($req->expectsJson()) {
            return response()->json([
                'message' => 'success',
                'data'    => $data
            ], Response::HTTP_ACCEPTED);
        }

        return back()->withSuccess('success');
    }



    public function delete($id, Request $req)
    {

        $validate = $req->validate([
            'farmer_id' => 'exists:users,id',
        ]);

        $data = OrderTable::where('id', $id)->delete();

        if (!$data) {

            if ($req->expectsJson()) {
                return response()->json([
                    'message' => 'failed',
                ], Response::HTTP_NOT_FOUND);
            }

            return back()->withErrors('failed');
        }

        // if not errors

        if ($req->expectsJson()) {
            return response()->json([
                'message' => 'successfuly deleted',
                'data'    => $data
            ], Response::HTTP_OK);
        }

        return back()->withSuccess('success');
    }
}
