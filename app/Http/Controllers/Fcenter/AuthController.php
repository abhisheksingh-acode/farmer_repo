<?php

namespace App\Http\Controllers\Fcenter;

use App\Http\Controllers\Controller;
use App\Models\Fcenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("fc.auth.login");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("fc.auth.register");
    }

    function login(Request $request)
    {

        $validate = $request->validate([
            'email' => 'required | exists:fcenters,email',
            'password' => 'required | min:8'
        ]);

        $cred = $request->only('email', 'password');

        if (!Auth()->guard('fcenter')->attempt($cred)) {
            return back()->with('fail', 'invalid credentials');
        }
        return redirect()->route('fcenter.index')->with('success', 'successfuly logged in');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'phone' => 'required | min:10 | unique:fcenters',
            'email' => ['required', 'email', 'min:10', 'unique:fcenters'],
            'password' => 'min:8 | required',
            'c_password' => 'required | same:password',
            'address' => 'required',
            'pincode' => ['required', 'max:6', 'postal_code:IN'],
        ]);

        $validate['password'] = Hash::make($validate['password']);
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

    public function logout()
    {

        Auth()->logout();

        return back();
    }

    public function destroy($id)
    {
        //
    }
}
