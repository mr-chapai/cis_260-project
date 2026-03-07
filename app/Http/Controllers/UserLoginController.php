<?php

namespace App\Http\Controllers;

use App\Models\CustomUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "list of all user";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('my_auth.login');
    }









    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'login_email' => 'required|string',
            //'login_email' => 'required|string|exists:users,username',
            'login_password' => 'required|string',

        ]);
        $user = CustomUser::where('email', $request->login_email)->first();
        if ($user->exists()) {

            Session::put('auth_user', $user->toArray());
            return redirect('/')->with('success', 'Login Successful');


           // Session::put('authUser', $cart_item_count);
        }else {
            return redirect('/login')
                ->with('usererror', 'User does not exist please check your email!');
        }

        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        session()->forget('auth_user');
        return redirect('/')->with('error', 'Logout Successful');
    }
}
