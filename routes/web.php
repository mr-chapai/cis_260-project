<?php

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
    Route::get('/', [ProductController::class, 'index'])->name('show');       // /product
    Route::get('/create', [ProductController::class, 'create'])->name('create'); // /product/create
    Route::post('/', [ProductController::class, 'store'])->name('store');     // /product
    Route::get('/{id}', [ProductController::class, 'show'])->name('index');    // /product/{id}
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
});

//user route







/*
 //product route
Route::get('/products', [ProductController::class, 'index'])->name('product.show');
Route::get('/product', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.index');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/product/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
*/



/*#Route for admin side
Route::prefix('admin')->group(function () {
    Route::get('/login', function () {
        return view('adminindex');
    })->name('admin-home');
});


 #Route for user
    Route::get('/', function () {
        $products = DB::table('Product')->get();
        return view('user.index',compact('products'));
    });

Route::get('/index', function () {
    $products = DB::table('Product')->get();
    return view('user.index',compact('products'));
});



    Route::get('/dashboard', function () {

        $products = DB::table('Product')->get();
        return view('admin.product',compact('products'));
    });


    Route::get('/login', function () {
        return view('my_auth.login');
    });


    Route::get('/signup', function () {

        return view('my_auth.signup');
    });
Route::get('/cart', function () {
    return view('user.cart');
});

Route::get('/payment', function () {
    return view('user.payment');
});

Route::get('/edit', function () {
    return view('admin.edit_product');
});


Route::get('/add', function () {
    $products = DB::table('Product')->get();
    return view('/admin/add_product',compact('products'));
});




Route::get('/order-success ', function () {
    return view('order.success ');
});
Route::get('/item', function () {
    return view('user.item');
});
Route::get('/logout', function () {
    $msg = "you are logged out";
    $products = DB::table('Product')->get();
    return view('user.index', compact('products','msg'));

});*/
//Home/Index page





