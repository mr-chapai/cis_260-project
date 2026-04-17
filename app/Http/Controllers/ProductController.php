<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\OrderModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Number;
use Illuminate\Support\Str;
use voku\helper\ASCII;
use function Laravel\Prompts\alert;


class ProductController extends Controller
{


    public function home(Request $request, ProductModel $products)
    {
        $search = $request->search ? $request->search : '';

        if ($search != '') {
            $products = ProductModel::where('product_name', 'like', '%' . $search . '%')
                ->orwhere('product_description', 'like', '%' . $search . '%')
                ->orwhere('product_price', 'like', '%' . $search . '%')
                ->latest()->get();
        } else {
            $products = ProductModel::all();
        }

        //Aut user's cart item count
        if (session()->has('auth_user.id')) {
            $cart_item = CartModel::where('custom_users', session('auth_user.id'));
            $cart_item_count = $cart_item->count() > 0 ? $cart_item->sum('qty') : 0;
            Session::put('cart_item_count', $cart_item_count);
        }
        //guest user's cart items count
        if (session()->has('guest_cart')) {
            $cart_item_count = collect(session()->get('guest_cart', []))->sum('qty');
            Session::put('cart_item_count', $cart_item_count);
        }


        return view('user.index', compact('products', 'search'));
    }

    public function index(ProductModel $product)
    {
        if(session('auth_user') && session('auth_user')['role'] === 'admin'){
            $products = ProductModel::latest()->get();
        }else{
            return redirect('/login')->with('usererror', 'Your are Unauthorised please login as Administrator');
        }
        return view('admin.product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(session('auth_user') && session('auth_user')['role'] === 'admin'){
        return view('admin.add_product');
        }else{
            return redirect('/login')->with('usererror', 'Unauthorised please login as Administrator');
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if(session('auth_user') && session('auth_user')['role'] === 'admin'){
            // Validate the form
            $request->validate([
                'product_name' => 'required|string|min:3|max:255',
                'product_description' => 'required|string|min:10|max:5000',
                'product_qty' => 'required|integer|min:1|max:5000',
                'product_price' => 'required|numeric',
                'product_category' => 'required|string|max:255',
                'product_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            // Handle file upload
            $imagePath = null;
            if ($request->hasFile('product_image')) {
                $file = $request->file('product_image');
                $imageName = 'product_' . time() . $file->getClientOriginalExtension();
                // Store inside: storage/app/public/products
                $file->storeAs("products", $imageName, 'public');
                // Save only filename in DB
                $imagePath = "/products/" . $imageName;
            }

            // Insert into DB
            DB::table('product')->insert([
                'product_name' => $request->product_name,
                'product_description' => $request->product_description,
                'product_price' => $request->product_price,
                'product_category' => $request->product_category,
                'product_qty' => $request->product_qty,
                'product_image' => $imagePath,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect('/product')
                ->with('success', 'ProductModel added successfully!');
        }else{
            return redirect('/login')->with('usererror', 'Your are Unauthorised please login as Administrator');
        }
        return view('admin.product', compact('products'));

    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find product by ID
        $product = ProductModel::findOrFail($id);

        // Check if product exists
        if (!$product) {
            return redirect()->route(route: 'product.product')
                ->with('error', 'ProductModel not found!');
        }
        // Return view with product
        return view('user.product', compact('product'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $isUserAdmin=BaseController::isAdminUser();
        if($isUserAdmin){
            $product = ProductModel::findOrFail($id);
            return view('admin.edit_product', compact('product'));

        }else{
            return redirect('/login')->with('usererror', 'Unauthorised please login as Administrator');
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){
        $isUserAdmin=BaseController::isAdminUser();
        if($isUserAdmin){
            $product = ProductModel::findOrFail($id);
            // Validate
            $request->validate([
                'product_name' => 'required|string|min:3|max:255',
                'product_description' => 'required|string|min:10|max:5000',
                'product_qty' => 'required|integer|min:1|max:5000',
                'product_price' => 'required|numeric',
                'product_category' => 'required|string|max:255',
                'product_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            // Update fields
            $product->product_name = $request->product_name;
            $product->product_description = $request->product_description;
            $product->product_price = $request->product_price;
            $product->product_category = $request->product_category;
            $product->product_qty = $request->product_qty;

            // Image update
            if ($request->hasFile('product_image')) {
                $file = $request->file('product_image');
                $imageName = 'product_' . time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs("products", $imageName, 'public');
                $product->product_image = "/products/" . $imageName;
            }

            $product->save();

            return redirect('/product')
                ->with('success', 'ProductModel Updated successfully!');
        }else{
            return redirect('/login')->with('usererror', 'Unauthorised please login as Administrator');
        }




    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {$isUserAdmin=BaseController::isAdminUser();
        if($isUserAdmin){
         $product = ProductModel::findOrFail($id);
            $product->delete();

            return redirect('/product')
                ->with('error', 'ProductModel Delete successfully!');

        } else {
            return redirect('/login')->with('usererror', 'Unauthorised please login as Administrator');
        }

    }
}
