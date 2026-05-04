<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller{

    public static function getGuestUserId(){
        if (!session()->has('guest_user_id')) {
            $guestId = time() . random_int(1000,9999);
            session(['guest_user_id' => $guestId]);
        }else{
            $guestId = session('guest_user_id');
        }
        return $guestId;
    }

    public static function getAuthUserId(){
       $authUserId = session('auth_user.id');
        return $authUserId;
    }
    public static function isAdminUser(){
        if (session('auth_user') && session('auth_user')['role'] === 'admin') {
            return true;
        } else {
            return false;
        }
    }

    public static function isAutUser(){
        if (session('auth_user')) {
            return true;
        } else {
            return false;
        }
    }



    public static function destroyGuestUserIdAndCart(){
        session()->forget('guest_cart');
        session()->forget('cart_item_count');
        session()->forget('guest_user_id');
    }











}
