<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kyc;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Traits\FileMoverTrait;

class KycController extends Controller
{


    public function get()
    {

        return "kyc form page";
    }

    public function edit($id, Request $req)
    {
        if ($kyc = Kyc::find($id)) {


            if ($req->expectsJson()) {
                return response()->json(
                    ['message' => 'Success', 'data' => $kyc],
                    Response::HTTP_ACCEPTED
                );
            }

            return $kyc;
        }

        if ($req->expectsJson()) {
            return response()->json(
                ['message' => 'failed to get documents'],
                Response::HTTP_NOT_FOUND
            );
        }

        return back()->withErrors('No documents found');
    }

    public function post(Request $request)
    {
        $request->validate([
            'photo' => 'required',
            'doc_type' => 'required',
            'doc' => 'required',
            'farmer_id' => 'required | exists:users,id',
        ]);

        $path = FileMoverTrait::move($request->file('photo'));

        $request['photo'] = $path;

        $kyc = Kyc::create($request->all());

        if ($request->expectsJson()) {
            return response()->json(
                ['message' => 'uploaded successfully', 'data' => $kyc],
                Response::HTTP_ACCEPTED
            );
        }

        return back()->withSuccess('uploaded successfully');
    }

    public function update($id, Request $request)
    {

        $validate = $request->validate([
            'farmer_id' => 'exists:users,id'
        ]);

        if ($request->photo) {
            $path = FileMoverTrait::move($request->file('photo'));
            $request['photo'] = $path;
        }

        if ($kyc = Kyc::where('id', $id)->update($request->all())) {
            if ($request->expectsJson()) {
                return response()->json(
                    ['message' => 'Updated Successfully', 'data' => $kyc],
                    Response::HTTP_ACCEPTED
                );
            }

            return back()->withSuccess('Updated Successfully');
        }


        if ($request->expectsJson()) {
            return response()->json(
                ['message' => 'Failed'],
                Response::HTTP_NOT_FOUND
            );
        }

        return back()->withSuccess('Deleted Failed');
    }


    public function delete($id, Request $req)
    {

        if ($kyc = Kyc::where('id', $id)->delete()) {

            if ($req->expectsJson()) {
                return response()->json(
                    ['message' => 'Deleted Successfully', 'data' => $kyc],
                    Response::HTTP_ACCEPTED
                );
            }

            return back()->withSuccess('Deleted Successfully');
        }

        if ($req->expectsJson()) {
            return response()->json(
                ['message' => 'Failed'],
                Response::HTTP_ACCEPTED
            );
        }

        return back()->withSuccess('Deleted Failed');
    }
}
