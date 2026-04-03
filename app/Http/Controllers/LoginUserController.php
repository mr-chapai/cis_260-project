<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginUserController extends Controller
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

        return view('auth.login');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'login_email' => 'required|string|exists:user_models,email',
            'login_password' => 'required|string',

        ]);

        $user = UserModel::where('email', $request->login_email)->first();


        if ($user && Hash::check($request->login_password, $user->password)) {
            Session::put('auth_user', $user->toArray());
            session()->forget('guest_cart');
            session()->forget('cart_item_count');
            return redirect('/')->with('success', 'Login Successful');
        } else {
            return redirect('/login')
                ->with('usererror', 'User does not exist please check your email!');
        }

    }

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
