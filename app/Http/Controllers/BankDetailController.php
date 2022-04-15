<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BankDetail;
use Symfony\Component\HttpFoundation\Response;

class BankDetailController extends Controller
{
    public function index()
    {
        return "bank details submit page";
    }


    public function post(Request $req)
    {

        $validate = $req->validate([
            'farmer_id' => ['required', 'unique:bank_details', 'exists:users,id'],
            'ac_holder' => 'required',
            'ac_number' => 'required | unique:bank_details',
            'ac_ifsc'   => 'required'
        ]);

        $data = BankDetail::create($req->all());

        if (!$data) {
            if ($req->expectsJson()) {
                return response()->json([
                    'message' => 'failed to upload'
                ], Response::HTTP_BAD_REQUEST);
            }

            return back()->withErrors('failed to upload');
        }

        // if not error

        if ($req->expectsJson()) {
            return response()->json([
                'message' => 'Successfuly uploaded',
                'data'    => $data
            ], Response::HTTP_ACCEPTED);
        }

        return back()->withErrors('Successfuly uploaded');
    }



    public function edit($id, Request $req)
    {

        if (!BankDetail::find($id)) {
            if ($req->expectsJson()) {
                return response()->json(
                    ['message' => 'data not found'],
                    Response::HTTP_NOT_FOUND
                );
            }

            return back()->withErrors('Data Not Found');
        }

        // if not error

        $data = BankDetail::find($id);

        if ($req->expectsJson()) {
            return response()->json(
                ['message' => 'success', 'data' => $data],
                Response::HTTP_ACCEPTED
            );
        }

        return $data;
    }


    public function update($id, Request $req)
    {

        $validate = $req->validate([
            'farmer_id' => 'exists:users,id',
            'ac_number' => 'unique:bank_details',
        ]);


        $data = BankDetail::where('id', $id)->update($req->all());

        if (!BankDetail::find($id)) {
            if ($req->expectsJson()) {
                return response()->json([
                    'message' => 'data not found, failed update'
                ], Response::HTTP_NOT_FOUND);
            }

            return back()->withErrors('data not found, failed to update');
        }

        // if not error

        if ($req->expectsJson()) {
            return response()->json([
                'message' => 'Successfuly updated'
            ], Response::HTTP_ACCEPTED);
        }

        return back()->withErrors('Successfuly updated');
    }


    public function delete($id, Request $req)
    {

        if (!BankDetail::find($id)) {
            if ($req->expectsJson()) {
                return response()->json([
                    'message' => 'data not found, failed to delete'
                ], Response::HTTP_BAD_REQUEST);
            }

            return back()->withErrors('data not found, failed to delete');
        }

        // if not error
        $data = BankDetail::where('id', $id)->delete();

        if ($req->expectsJson()) {
            return response()->json([
                'message' => 'Successfuly deleted'
            ], Response::HTTP_ACCEPTED);
        }

        return back()->withSuccess('Successfuly deleted');
    }
}
