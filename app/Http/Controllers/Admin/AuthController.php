<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
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
        return view("admin.auth.login");
    }

    public function login(Request $request)
    {

        $validate = $request->validate([
            'email' => ['email', 'required', 'min:10', 'exists:admins'],
            'password' => 'required | min:8'
        ], [
            'email.exists' => 'email address is not registered'
        ]);

        $cred = $request->only('email', 'password');

        if (!Auth::guard('admin')->attempt($cred)) {
            return back()->with('fail', 'Invalid Credentials');
        }

        return redirect('admin');
    }


    public function logout()
    {

        Auth::guard('admin')->logout();

        return redirect()->route('admin.login')->with('success', "you're logged out session");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.auth.register");
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
            'email' => ['required', 'email', 'min:10', 'unique:admins'],
            'phone' => ['required', 'min:10', 'unique:admins'],
            'password' => 'required | min:8',
            'c_password' => 'required | min:8 | same:password'
        ]);

        try {

            $validate['password'] = Hash::make($validate['password']);

            $data = Admin::create($validate);

            $cred = $request->only('email', 'password');

            if ($data) {
                Auth::guard('admin')->attempt($cred);

                return redirect('admin');
            }
        } catch (\Exception $ex) {
            return back()->with('fail', $ex->getMessage());
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
        return Admin::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Admin::find($id);
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
                'email' => ['email', 'unique:admins,email', 'min:10'],
                'phone' => ['min:10', 'unique:admins,phone'],
                'password' => 'min:8',
                'name'  => 'string',
            ]);

            if ($validate['password']) {
                $validate['password'] = Hash::make($validate['password']);
            }

            $data = Admin::where('id', $id)->update($validate);

            return back()->withSuccess('update successfuly');
        } catch (\Exception $ex) {
            return back()->with('fail', $ex->getMessage());
        }
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
