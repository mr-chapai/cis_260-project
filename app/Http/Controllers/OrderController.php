<?php

namespace App\Http\Controllers;

use App\Models\AddressModel;
use App\Models\CartModel;
use App\Models\OrderModel;
use App\Models\PaymentModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Stripe\StripeClient;


class OrderController extends Controller{
    public function index(){
        $isUserAdmin=BaseController::isAdminUser();
        $isAuthUser=BaseController::isAutUser();
        if($isUserAdmin){
            $orders=OrderModel::all()->sortByDesc('created_at');
        }elseif($isAuthUser){
            $userid=Session::get('auth_user.id');
            $orders=OrderModel::where('user_id',$userid)->get();
        }else{
            return redirect('/login')->with('usererror', 'Your are Unauthorised please login');
        }
        return view('admin.orders', compact('orders'));
    }







    // integrate with payment system
    public function stripe(Request $request){

        if ($request->has('checkout')) {
            $cartItems = Session::get('cart_items_list');
            $stripe = new StripeClient(config('services.stripe.secret'));
            $lineItems = [];
            foreach ($cartItems as $item) {
                $lineItems[] = [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => ['name' => $item->product_name, // array access
                        ],
                        'unit_amount' => $item->price * 100, // must be in cents
                    ],
                    'quantity' => $item->qty,
                ];
            }

            $response = $stripe->checkout->sessions->create([
                'line_items' => $lineItems,
                'mode' => 'payment',
                'phone_number_collection' => [
                    'enabled' => true,
                ],

                'shipping_address_collection' => [
                    'allowed_countries' => ['US', 'CA'], // change as needed
                ],






                'success_url' => route('payment.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('payment.cancel'),
            ]);

            if (isset($response->id) && $response->id != null) {
                session()->put('cart_items_list', $lineItems);
                return redirect($response->url);
            } else {
                return redirect(route('order.cancel'));
            }
        }
    }

    // after successfully getting back success response
    public function success(Request $request)
    {
        // if get response stripe method
        if ($request->has('session_id')) {
            $stripe = new StripeClient(config('services.stripe.secret'));
            $response = $stripe->checkout->sessions->retrieve($request->session_id);
            //dd($response);
            $payment_id = $response->payment_intent;
            $exists = DB::table('payments')->where('stripe_session_id', $payment_id)->exists();
            // if payment is not exist
            if (!$exists) {
                //insert the response in payments table
                $order_id = time();
                $payment = new PaymentModel();
                $payment->stripe_session_id = $response->payment_intent;
                $payment->email = $response->customer_details->email;
                $payment->name = $response->customer_details->name;
                $payment->phone = $response->customer_details->phone ?? null;
                $payment->currency = $response->currency;
                $payment->amount = $response->amount_total;
                $payment->payment_status = $response->status;
                $payment->save();

                // get  user and amount
                $user_id = session('auth_user.id');
                $guestId = (new BaseController())->getGuestUserId();
                $cart_total_amount = session('cart_total_amount', 0);

                //insert order in order table
                DB::table('orders')->insert([
                    'payment_id' => $payment_id,
                    'id' => $order_id,
                    'user_id' => $user_id ? $user_id : $guestId,
                    'total_amount' => $cart_total_amount,
                    'created_at' => now(),
                ]);

                // check user id and cart items
                if ($user_id) {
                    $orderlist = CartModel::where('custom_users', $user_id)->get();
                } else {
                    $guestCart = session()->get('guest_cart', []);
                    $orderlist = collect($guestCart)->map(function ($item) {
                        return (object)$item;
                    });
                }
                //insert the data in to order_items
                foreach ($orderlist as $order) {
                    DB::table('order_items')->insert([
                        'order_id' => $order_id,
                        'product_id' => $order->product_id,
                        'qty' => $order->qty,
                        'price' => $order->price,
                        'created_at' => now(),
                    ]);
                }
                $cartcornroll = new CartController();
                $cartcornroll->deleteAll();
                return view('user.order_success', compact(['order_id', 'payment_id']));
            }else{
                $order_id = DB::table('orders')->where('payment_id', $payment_id)->value('id');
                return view('user.order_success', compact(['order_id', 'payment_id']));
            }

        }

    }


    public function cancel(Request $request)
    {
        return "payment cancelled";
    }

}
