<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


//Route for all and home access
Route::get('/', [ProductController::class, 'home']);
Route::get('/index', [ProductController::class, 'home']);

//product route
Route::get('/products', [ProductController::class, 'index'])->name('product.show');
Route::get('/product', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.index');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/product/{id}', [ProductController::class, 'update'])->name('product.update');

Route::delete('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');




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





