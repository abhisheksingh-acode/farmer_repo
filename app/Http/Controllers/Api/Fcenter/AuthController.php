<?php

namespace App\Http\Controllers\Api\Fcenter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Fcenter;

use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class AuthController extends Controller
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


    public function login(Request $request)
    {

        try {
            $validate = $request->validate([
                'email' => ['min:10', 'exists:fcenters,email', 'required_without:phone'],
                'phone' => ['min:10', 'exists:fcenters,phone', 'required_without:email'],
                'password' => 'min:8 | required'
            ]);

            if (Auth::guard('fcapi')->attempt($validate)) {
                $user = Auth::guard('fcapi')->user();

                $token = $user->createToken('token')->plainTextToken;

                // cookie valid for 1 day
                $cookie = cookie('jwt', $token, 60 * 24);

                return response(['message' => 'Success'], 200)->withCookie($cookie);
            }
            // if failed
            return $this->jsonErrorResponse('invalid credential', 400);
        } catch (\Exception $ex) {
            return $this->jsonExceptionResponse($ex, 400);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        try {
            $validate = $request->validate([
                'name' => 'required',
                'email' => ['min:10', 'unique:fcenters'],
                'phone' => ['min:10', 'unique:fcenters'],
                'password' => 'min:8 | required',
                'address' => 'required | min:25',
                'pincode' => 'required | digits:6'
            ]);

            $validate['password'] = Hash::make($validate['password']);

            $data = Fcenter::create($validate);

            if ($data) {
                return $this->jsonSuccessResponse('success', $data, Response::HTTP_CREATED);
            }
            // if failed
            return $this->jsonErrorResponse('failed', Response::HTTP_BAD_REQUEST);
        } catch (\Exception $ex) {
            return $this->jsonExceptionResponse($ex, 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            $data = Fcenter::find($id);
            return $this->jsonSuccessResponse('success', $data, Response::HTTP_ACCEPTED);
        } catch (\Exception $ex) {
            return $this->jsonExceptionResponse($ex, Response::HTTP_NOT_FOUND);
        }
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

        try {

            $validate = $request->validate([
                'email' => ['min:10', 'unique:fcenters'],
                'phone' => ['min:10', 'unique:fcenters'],
                'password' => 'min:8',
                'address' => 'min:25',
                'pincode' => 'digits:6'
            ]);

            $valid = Fcenter::find($id);

            $validate['password'] = Hash::make($validate['password']);

            $data = Fcenter::where('id', $id)->update($validate);

            if ($data) {
                return $this->jsonSuccessResponse('success', $data, Response::HTTP_CREATED);
            }

            // if failed
            return $this->jsonErrorResponse('failed', Response::HTTP_BAD_REQUEST);
        } catch (\Exception $ex) {
            return $this->jsonExceptionResponse($ex, 400);
        }
    }

    public function forgot(Request $request)
    {

        $validate = $request->validate([
            'email' => 'required_without_phone | exists:fcenters | min:10',
            'phone' => 'required_without_email | exists:fcenters | min:10'
        ]);

        $data = Fcenter::where($validate)->get();
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
