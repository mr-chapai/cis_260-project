<?php

namespace App\Http\Controllers;

use App\Models\MyCart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class MyCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $cartItems = MyCart::where('custom_users', session('auth_user.id'))->get();
        $cart_item_count = MyCart::where('custom_users', session('auth_user.id'))->sum('qty');
        Session::put('cart_item_count', $cart_item_count);

        return view('user.cart', compact('cartItems'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id){
        $authUserId = session('auth_user') ? session('auth_user')['id'] : '';
        $product = Product::find($id);
        $item = MyCart::where('custom_users', $authUserId)->where('product_id', $product->id)->first();

        if ($item) {
            $item->qty += 1;
            $item->total_price += $product->product_price;
            $item->save();
        } else {
            $myCart = new MyCart();
            $myCart->custom_users = $authUserId;
            $myCart->product_id = $product->id;
            $myCart->product_name = $product->product_name;
            $myCart->product_image = $product->product_image;
            $myCart->price = $product->product_price;
            $myCart->qty = 1; // default quantity
            $myCart->total_price = $product->product_price;
            $myCart->save();

        }
        return redirect('/')->with('success', 'Product added to cart');
    }


    /**
     * Display the specified resource.
     */
    public function show(MyCart $myCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MyCart $myCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){
        $cartItems = MyCart::find($id);
        $cartItems->qty = $request->qty;
        $cartItems->total_price = $request->qty * $cartItems->price;
        $cartItems->save();
        return redirect('/cart')
            ->with('success', 'Cart updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $userId = session('auth_user.id');
        $cartItems = MyCart::find($id);
        $cartItems->delete();
        return redirect('/cart')
            ->with('error', 'Item Remove successfully!');

    }

    public function deleteAll()
    {
        $userId = session('auth_user.id');
        $items = MyCart::where('custom_users', $userId)->get();
        foreach ($items as $item) {
            $item->delete();
        }


        return redirect('/cart')
            ->with('error', 'Item Remove successfully!');

    }

    public function payment(Request $request)
    {

        $grand_total = MyCart::where('custom_users', session('auth_user.id'))->sum('total_price');

        return view('user.payment', compact('grand_total'));
       // return $grand_total;
    }

    public function sucess()
    {

        return "thank you for your order, your order has been placed";
    }


}
