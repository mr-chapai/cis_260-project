<?php

namespace App\Http\Controllers;

use App\Models\CustomUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use function PHPUnit\Framework\isEmpty;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = CustomUser::latest()->get();

        return view('admin.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('my_auth.signup');
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
        DB::table('custom_users')->insert([
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

        try {
            $user = CustomUser::find($id);
            if ($user) {


                return view('my_auth.view_user', compact('user'));
            } else {
                return view('layouts.error')->with('error', 'User not found.');
            }
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomUser $customUser, $id)
    {

        $user = CustomUser::find($id);


        return view('my_auth.edit_user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = CustomUser::findOrFail($id);
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
            return redirect('/user')->with('success', 'Product update successfully!');
        } else {
            // Flash an error message and redirect
            return redirect('/user')->with('error', 'Sorry, user not found.');
        }


        /*
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
                    ]); //validate


                } else {

                    abort(404);
                }

                return "successfully updated user" . $user;
                //return redirect()->route('user.users')->with('success','User updated successfully.');*/
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customUser = CustomUser::find($id);
        $customUser->delete();
        return redirect('/user')
            ->with('error', 'User Delete successfully!');

    }
}
