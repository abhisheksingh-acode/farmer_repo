<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

use App\Models\User;
use Illuminate\Support\Facades\Cookie;
use Validator;


class AuthController extends Controller
{

    public function user(Request $request)
    {
        $user = Auth::user();

        return response()->json($user, Response::HTTP_ACCEPTED);
    }

    public function users(Request $request)
    {
        if ($request->access == "admin") {
            return User::all();
        }
    }


    public function register(Request $request)
    {

        $validate = $request->validate([
            'name' => 'required | min:4',
            'phone' => 'required | min:10 | unique:users',
            'email' => 'unique:users',
            'password' => 'required | min:8',
            'lang' => 'required',
        ]);

        return $user = User::create(
            [
                'name'    => $request->name,
                'phone'   => $request->phone,
                'email'   => $request->email,
                'lang'    => $request->lang,
                'password' => Hash::make($request->password)
            ]
        );
    }


    public function login(Request $request)
    {

        $validate = $request->validate([
            'email' => 'email',
            'phone' => 'numeric | digits:10',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {

            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Invalid Credentials'
                ], Response::HTTP_UNAUTHORIZED);
            }

            return back()->withErrors('Invalid Credentials');
        }

        $user = Auth::user();

        $token = $user->createToken('token')->plainTextToken;
        $cookie = cookie('jwt', $token, 60 * 24);  // create cookie for jwt token valid for 24 hours
        return response([
            'message' => 'Success'
        ])->withCookie($cookie);
    }


    public function edit($id, Request $req)
    {

        if ($user = User::find($id)) {

            return $user;
            if ($req->expectsJson()) {
                return response()->json($user, Response::HTTP_ACCEPTED);
            }

            return $user;
        }

        if ($req->expectsJson()) {
            return response()->json([
                'message' => 'user not exist'
            ], Response::HTTP_NOT_FOUND);
        }
        return back()->withErrors('User not exist');
    }


    public function update($id, Request $req)
    {

        if ($user = User::find($id)) {
            $user = User::where('id', $id)->update($req->all());

            if ($req->expectsJson()) {
                return response()->json(['message' => 'updated successfully'], Response::HTTP_ACCEPTED);
            }

            return back()->withSuccess('Updated Successfully');
        }

        if ($req->expectsJson()) {
            return response()->json([
                'message' => 'user not exist'
            ], Response::HTTP_NOT_FOUND);
        }

        return back()->withErrors('User not exist');
    }



    public function delete($id, Request $req)
    {

        if ($user = User::find($id)) {

            $user = User::where('id', $id)->delete();

            if ($req->expectsJson()) {

                return response()->json(['message' => 'deleted successfully'], Response::HTTP_ACCEPTED);
            }

            return back()->withSuccess('Deleted Successfully');
        }

        if ($req->expectsJson()) {
            return response()->json([
                'message' => 'user not exist'
            ], Response::HTTP_NOT_FOUND);
        }

        return back()->withErrors('User not exist');
    }





    public function login_index(Request $request)
    {
        if ($request->expectsJson()) {
            return response()->json(
                ['message' => 'login with your account'],
                Response::HTTP_TEMPORARY_REDIRECT
            );
        }
        return "login page, login with details";
    }



    public function logout(Request $req)
    {
        $cookie = Cookie::forget('jwt');

        if ($req->expectsJson()) {
            return response(['message' => 'Success'])->withCookie($cookie);
        }

        return redirect(route('login.index'))->withSuccess('logout successfully');
    }

    public function forget_get()
    {
        return "forgot pass page";
    }

    public function forget_post(Request $req)
    {

        $email = $req->email ?? false;
        $phone = $req->phone ?? false;

        $userExist = User::where('email', $email)->where('phone', $phone)->get();

        return $userExist;
    }
}
