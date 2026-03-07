<?php

use App\Models\CustomUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserController;
use \App\Http\Controllers\MyCartController;


//root route
Route::get('/index', [ProductController::class, 'home'])->name('index');
Route::get('/', [ProductController::class, 'home'])->name('index');

//login
Route::get('/logout', [UserLoginController::class, 'destroy'])->name('destroy');
Route::prefix('login')->name('login.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users');

    Route::get('/',[UserLoginController::class, 'create'])->name('form');
    Route::post('submit/',[UserLoginController::class, 'store'])->name('store');
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
    Route::get('/', [MyCartController::class, 'index'])->name('cart');
    Route::post('/{id}', [MyCartController::class, 'store'])->name('store');
    Route::get('/{id}', [MyCartController::class, 'show'])->name('cart');
    Route::get('/edit/{id}', [MyCartController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [MyCartController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [MyCartController::class, 'destroy'])->name('delete');
    Route::get('/delete/all', [MyCartController::class, 'deleteAll'])->name('delete.all');

});


Route::get('/payment', [MyCartController::class, 'payment'])->name('payment');
Route::get('/payment/sucess', [MyCartController::class, 'sucess'])->name('payment.sucess');


Route::get('/test', function(){
    $data = CustomUser::with('carts')->get(); // use 'carts' now
    return $data; // JSON output
});
Route::get('/test1', function(){
    $data = \App\Models\MyCart::with('users')->get(); // use 'carts' now
    return $data; // JSON output
});


//user route





