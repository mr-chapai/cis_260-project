<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;



#Route for admin side
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
        return view('admin.dashboard',compact('products'));
    });


    Route::get('/login', function () {
        return view('my_auth.login');
    });


    Route::get('/signup', function () {
        $states = [
            'AL' => 'Alabama',
            'AK' => 'Alaska',
            'AZ' => 'Arizona',
            'AR' => 'Arkansas',
            'CA' => 'California',
            'CO' => 'Colorado',
            'CT' => 'Connecticut',
            'DE' => 'Delaware',
            'DC' => 'District Of Columbia',
            'FL' => 'Florida',
            'GA' => 'Georgia',
            'HI' => 'Hawaii',
            'ID' => 'Idaho',
            'IL' => 'Illinois',
            'IN' => 'Indiana',
            'IA' => 'Iowa',
            'KS' => 'Kansas',
            'KY' => 'Kentucky',
            'LA' => 'Louisiana',
            'ME' => 'Maine',
            'MD' => 'Maryland',
            'MA' => 'Massachusetts',
            'MI' => 'Michigan',
            'MN' => 'Minnesota',
            'MS' => 'Mississippi',
            'MO' => 'Missouri',
            'MT' => 'Montana',
            'NE' => 'Nebraska',
            'NV' => 'Nevada',
            'NH' => 'New Hampshire',
            'NJ' => 'New Jersey',
            'NM' => 'New Mexico',
            'NY' => 'New York',
            'NC' => 'North Carolina',
            'ND' => 'North Dakota',
            'OH' => 'Ohio',
            'OK' => 'Oklahoma',
            'OR' => 'Oregon',
            'PA' => 'Pennsylvania',
            'RI' => 'Rhode Island',
            'SC' => 'South Carolina',
            'SD' => 'South Dakota',
            'TN' => 'Tennessee',
            'TX' => 'Texas',
            'UT' => 'Utah',
            'VT' => 'Vermont',
            'VA' => 'Virginia',
            'WA' => 'Washington',
            'WV' => 'West Virginia',
            'WI' => 'Wisconsin',
            'WY' => 'Wyoming'
        ];
        return view('my_auth.signup',compact('states'));
    });
Route::get('/cart', function () {
    return view('user.cart');
});

Route::get('/payment', function () {
    return view('user.payment');
});

Route::get('/test', function () {
    return view('layouts/app');
});


Route::get('/add', function () {

    $products = DB::table('Product')->get();

    return view('/admin/add_product',compact('products'));
});



Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product', [ProductController::class, 'index'])->name('product.show');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.index');
Route::delete('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
Route::put('/product/edit/{id}', [ProductController::class, 'update'])->name('product.edit');




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

});





