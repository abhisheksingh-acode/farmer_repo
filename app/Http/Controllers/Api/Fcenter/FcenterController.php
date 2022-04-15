<?php

namespace App\Http\Controllers\Api\Fcenter;

use App\Http\Controllers\Controller;
use App\Models\Fcenter;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class FcenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function jsonSuccessResponse($message, $data, $status)
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
        ], $status);
    }

    public function jsonErrorResponse($error, $status)
    {
        return response()->json([
            'error' => $error,
        ], $status);
    }
    public function jsonExceptionResponse($error, $status)
    {
        return response()->json([
            'error' => $error->getMessage(),
        ], $status);
    }


    public function index()
    {
        $data = auth()->user();

        return $this->jsonSuccessResponse('success', $data, 200);
    }

    public function get()
    {
        return $this->jsonSuccessResponse('success', Fcenter::all(), 200);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


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
