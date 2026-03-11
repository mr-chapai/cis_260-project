<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\MyCart;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use function PHPUnit\Framework\isEmpty;

class CartController extends Controller
{
    public function index()
    {
        $authUser = session('auth_user.id');
        if ($authUser) {
            $cartItems = CartModel::where('custom_users', $authUser)->get();
            $cart_item_count = $cartItems->sum('qty');
            Session::put('cart_item_count', $cart_item_count);
        } else {
            // Guest cart from session
            $guestCart = session()->get('guest_cart', []);
            // Convert array to objects
            $cartItems = collect($guestCart)->map(function ($item) {
                return (object)$item;
            });
            $cart_item_count = collect($guestCart)->sum('qty');
            Session::put('cart_item_count', $cart_item_count);
        }
        return view('user.cart', compact('cartItems'));
    }


    public function store(Request $request, $id){
        $product = ProductModel::find($id);
        if (session()->has('auth_user.id')) {
            $authUserId = session('auth_user.id');
            $auth_cart = CartModel::where('custom_users', $authUserId)->where('product_id', $product->id)->first();
            if ($auth_cart) {
                $auth_cart->qty += 1;
                $auth_cart->total_price += $product->product_price;
                $auth_cart->save();
            } else {
                $myCart = new CartModel();
                $myCart->custom_users = $authUserId;
                $myCart->product_id = $product->id;
                $myCart->product_name = $product->product_name;
                $myCart->product_image = $product->product_image;
                $myCart->price = $product->product_price;
                $myCart->qty = 1; // default quantity
                $myCart->total_price = $product->product_price;
                $myCart->save();
                //get seccion
                session()->has('cart_item_count')? Session::put('cart_item_count',
                    session('cart_item_count')+1):
                    session()->put('cart_item_count', 1);
            }
        } else {
            $guest_cart = session()->get('guest_cart', []);
            if (isset($guest_cart[$id])) {
                $guest_cart[$id]['qty']++;
            } else {
                $guest_cart[$id] = [
                    "product_id" => $product->id,
                    "product_name" => $product->product_name,
                    "price" => $product->product_price,
                    "product_image" => $product->product_image,
                    "qty" => 1
                ];
            }
            session()->put('guest_cart', $guest_cart);
        }
        return redirect('/')->with('success', 'ProductModel added to cart');
    }

    public function show(CartModel $myCart)
    {
       return view('user.cart_item', compact('myCart'));
    }


    public function update(Request $request, $id){
        $authUser = session('auth_user.id');
        if ($authUser) {
            $cartItems = CartModel::find($id);
            $cartItems->qty = $request->qty;
            $cartItems->total_price = $request->qty * $cartItems->price;
            $cartItems->save();
        }

        if (session()->has('guest_cart')) {
            $guest_cart = session()->get('guest_cart', []);
            if (isset($guest_cart[$id])) {
                $guest_cart[$id]['qty'] = $request->qty;
                session()->put('guest_cart', $guest_cart);
            }
        }
        return redirect('/cart')
            ->with('success', 'Cart updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //delet cart item from cart database
        $authUser = session('auth_user.id');
        if ($authUser) {
            $cartItems = CartModel::where('custom_users', $authUser)->where('product_id', $id)->first();
            $cartItems->delete();
        }

        if (session()->has('guest_cart')) {
            $guest_cart = session()->get('guest_cart', []);
            if (isset($guest_cart[$id])) {
                unset($guest_cart[$id]); // remove item
            }
        }
        return redirect('/cart')
            ->with('error', 'Item Remove successfully!');
    }

    public function deleteAll()
    {
        //delete cart item from cart database
        $authUser = session('auth_user.id');
        if ($authUser) {
            $items = CartModel::where('custom_users', $authUser)->get();
            foreach ($items as $item) {
                $item->delete();
            }
        }
        //delete from session
        if (session()->has('guest_cart')) {
            session()->forget('guest_cart');
            session()->forget('cart_item_count');
        }

        return redirect('/cart')->with('error', 'Item Remove successfully!');

    }

    public function payment(Request $request)
    {

        $grand_total = CartModel::where('custom_users', session('auth_user.id'))->sum('total_price');

        return view('user.payment', compact('grand_total'));
        // return $grand_total;
    }

    public function success()
    {

        return view('user.order_success');
    }


}
