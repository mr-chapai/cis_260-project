<?php

namespace App\Http\Controllers;

use App\Models\AddressModel;
use App\Models\CartModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{

    public function index()
    {

       return "address";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('user.address');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'street_address' => ' required|string',
            'address2' => 'string',
            'city' => ' required|string',
            'state' => ' required|string',
            'zip' => ' required|string',
            'country' => ' required|string',
            'type' => 'required|in:shipping,billing',

        ]);

            $address = new AddressModel();
            $address->user_id=BaseController::getAuthUserId();
            $address->street_address= $request->street_address;
            $address->address_2= $request->address2;
            $address->city= $request->city;
            $address->state= $request->state;
            $address->zip= $request->zip;
            $address->type=$request->type;
            $address->country=$request->country;
            $address->created_at=time();
            $address->save();


        return redirect()->route('user.user', $address->user_id)->with('success', 'Address added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */

// Edit
    public function edit($id) {
        $address = AddressModel::findOrFail($id);
        return view('user.address', compact('address'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'street_address' => ' required|string',
            'address2' => 'string',
            'city' => ' required|string',
            'state' => ' required|string',
            'zip' => ' required|string',
            'country' => ' required|string',
            'type' => 'required|in:shipping,billing',

        ]);
        $address = AddressModel::find($id);
        $address->user_id=BaseController::getAuthUserId();
        $address->street_address= $request->street_address;
        $address->address_2= $request->address2;
        $address->city= $request->city;
        $address->state= $request->state;
        $address->zip= $request->zip;
        $address->type=$request->type;
        $address->updated_at=time();
        $address->update();
        return redirect()->route('user.user', $address->user_id)->with('success', 'Address update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id ){

        $isAuthUser=BaseController::isAutUser();
        $authUserId = BaseController::getAuthUserId();
        $address=AddressModel::find($id);
            if($authUserId == $address->user_id){
                $address->delete();
                return redirect()->route('user.user', $address->user_id)->with('success', 'Address Delete successfully');
            } else {
                return redirect('/login')->with('usererror', 'Unauthorised');
            }

        }
}
