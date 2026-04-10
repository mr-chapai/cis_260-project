<?php

namespace App\Http\Controllers;

use App\Models\OrderModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isFalse;
use function Symfony\Component\String\u;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $isUserAdmin = BaseController::isAdminUser();
        if ($isUserAdmin) {
            $users = UserModel::all();
            return view('admin.users', compact('users'));
        } else {
            return redirect('/login')->with('usererror', 'Unauthorised please login as Administrator');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.signup');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'signup_email' => 'required|string',
            'signup_password' => 'required|string',

            'phone' => 'required|string',
            //'gender' => 'required|in:male,female,other',
            'gender' => 'required',
            'address' => 'required|string',
            'address2' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|string',
            'state' => 'required',
            'zip' => 'required|string',
            'check' => 'accepted',

        ]);

//  Insert Data
        DB::table('user_models')->insert([
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'email' => $request->signup_email,
            'password' => Hash::make($request->signup_password), //  always hash password
            'phone' => $request->phone,
            'gender' => $request->gender,
            'role' => 'user', // default role
            'address' => $request->address,
            'address2' => $request->address2,
            'city' => $request->city,
            'country' => $request->country,
            'state' => $request->state,
            'zip' => $request->zip,
            'status' => 'active'
        ]);

        return redirect()->route('user.users')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $isUserAdmin = BaseController::isAdminUser();
        $isAuthUser = BaseController::isAutUser();
        if ($isUserAdmin) {
            $user = UserModel::find($id);
            if ($user) {
                return view('auth.view_user', compact('user'));
            } else {
                $userid = (session('auth_user.id'));
                $user = UserModel::find($userid);
                return view('auth.view_user', compact('user'));
            }

        } elseif ($isAuthUser) {
            $userid = (session('auth_user.id'));
            $user = UserModel::find($userid);
            return view('auth.view_user', compact('user'));
        } else {
            return redirect('/login')->with('usererror', 'Unauthorised please login as Administrator');
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserModel $customUser, $id)
    {
        $isUserAdmin = BaseController::isAdminUser();
        $isAuthUser = BaseController::isAutUser();

        if ($isUserAdmin) {
            $user = UserModel::find($id);
            if ($user) {
                return view('auth.edit_user', compact('user'));
            } else {
                return view('layouts.error')->with('error', 'User not found.');
            }
        } elseif ($isAuthUser) {
            $userid = Session::get('auth_user.id');
            $user = UserModel::find($userid);
            return view('auth.edit_user', compact('user'));
        } else {
            return redirect('/login')->with('usererror', 'Your are Unauthorised please login');
        }
    }


    public function update(Request $request, $id)
    {
        $user = UserModel::findOrFail($id);
        if ($user) {
            $request->validate([
                'fname' => 'required|string',
                'lname' => 'required|string',
                'phone' => 'required|string',
                'gender' => 'required',
                'role' => 'required',
                'address' => 'required|string',
                'address2' => 'required|string',
                'city' => 'required|string',
                'state' => 'required|string',
                'zip' => 'required|string',
                'check' => 'accepted',
            ]);

            $user->update($request->all());
            return redirect('/user')->with('success', 'ProductModel update successfully!');
        } else {
            // Flash an error message and redirect
            return redirect('/user')->with('error', 'Sorry, user not found.');
        }
    }

    public function destroy($id)
    {
        $isUserAdmin = BaseController::isAdminUser();
        $isAuthUser = BaseController::isAutUser();
        if ($isUserAdmin) {
            $customUser = UserModel::find($id);
            $customUser->delete();
            return redirect('/user')
                ->with('error', 'User Delete successfully!');

        } else {
            return redirect('/login')->with('usererror', 'Unauthorised please login as Administrator');
        }
    }
}




