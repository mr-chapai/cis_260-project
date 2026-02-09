<?php

use Illuminate\Support\Facades\Route;



#Route for admin side
Route::prefix('admin')->group(function () {
    Route::get('/login', function () {
        return view('adminindex');
    })->name('admin-home');
});


 #Route for user
    Route::get('/', function () {
        return view('index');
    });
Route::get('/index', function () {
    return view('index');
});

    Route::get('/dashboard', function () {
        return view('dashboard');
    });


    Route::get('/login', function () {
        return view('login');
    });


    Route::get('/signup', function () {
        return view('signup');
    });
Route::get('/cart', function () {
    return view('cart');
});

Route::get('/payment', function () {
    return view('payment');
});

Route::get('/test', function () {
    return view('layouts/app');
});


Route::get('/add', function () {
    return view('add_product');
});
Route::get('/order-conform', function () {
    return view('order_confom');
});





