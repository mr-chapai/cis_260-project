<?php

use App\Models\UserModel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\UserController;
use \App\Http\Controllers\CartController;


//root route
Route::get('/index', [ProductController::class, 'home'])->name('index');
Route::get('/', [ProductController::class, 'home'])->name('index');

//login
Route::get('/logout', [LoginUserController::class, 'destroy'])->name('destroy');
Route::prefix('login')->name('login.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users');

    Route::get('/',[LoginUserController::class, 'create'])->name('form');
    Route::post('submit/',[LoginUserController::class, 'store'])->name('store');
});


//user route
Route::prefix('user')->name('user.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users');
    Route::get('/create', [UserController::class, 'create'])->name('form');
    Route::post('/', [UserController::class, 'store'])->name('store');
    Route::get('/{id}', [UserController::class, 'show'])->name('user');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::post('/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
});

//product route
Route::prefix('product')->name('product.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products');       // /product
    Route::get('/create', [ProductController::class, 'create'])->name('create'); // /product/create
    Route::post('/', [ProductController::class, 'store'])->name('store');     // /product
    Route::get('/{id}', [ProductController::class, 'show'])->name('product');    // /product/{id}
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit'); // /product/edit/{id}
    Route::post('/{id}', [ProductController::class, 'update'])->name('update'); // /product/{id}
    Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('delete'); // /product/delete/{id}
});



//cart route
Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart');
    Route::post('/{id}', [CartController::class, 'store'])->name('store');
    Route::get('/{id}', [CartController::class, 'show'])->name('cart');
    Route::get('/edit/{id}', [CartController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [CartController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [CartController::class, 'destroy'])->name('delete');
    Route::get('/delete/all', [CartController::class, 'deleteAll'])->name('delete.all');

});


Route::get('/payment', [CartController::class, 'payment'])->name('payment');
Route::get('/payment/success', [CartController::class, 'success'])->name('payment.success');


Route::get('/test', function(){
    $data = UserModel::with('carts')->get(); // use 'carts' now
    return $data; // JSON output
});
Route::get('/test1', function(){
    $data = \App\Models\CartModel::with('users')->get(); // use 'carts' now
    return $data; // JSON output
});


Route::get('/session-test', function(){
    $sessionId = session()->getId();
    return $sessionId; // JSON output
});
Route::get('/lgs', function(){
    $sessionId = session()->getId();
    Session::flush();
    return $sessionId; // JSON output
});
Route::get('/ls', function(){
    Session::flush();
    return "successfully destroyed";
});

//user route





