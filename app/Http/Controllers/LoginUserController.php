<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginUserController extends Controller{

    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request){
        $request->validate([
            'login_email' => 'required|string|exists:user_models,email',
            'login_password' => 'required|string',
        ]);

        $user = UserModel::where('email', $request->login_email)->first();

        if ($user && Hash::check($request->login_password, $user->password)) {
            Session::put('auth_user', $user->toArray());
            BaseController::destroyGuestUserIdAndCart();
            return redirect('/')->with('success', 'Login Successful');
        } else {
            return redirect('/login')
                ->with('usererror', 'User does not exist please check your email!');
        }

    }



    public function destroy()
    {
        session()->forget('auth_user');


        return redirect('/')->with('error', 'Logout Successful');
    }
}
