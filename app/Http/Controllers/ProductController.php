<?php

namespace App\Http\Controllers;

use App\Models\MyCart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use voku\helper\ASCII;
use function Laravel\Prompts\alert;


class ProductController extends Controller
{
    public function index(Product $product){
        $products = Product::latest()->get();
        $totalQuantity = Product::sum('product_qty'); // total quantity
        return view('admin.product', compact('products','totalQuantity'));
    }

    public function home(Request $request, Product $products){
        $search=$request->search ? $request->search : '';
        $products =null;
        if($search!=''){
            $products = Product::where('product_name','like','%'.$search.'%')
                ->orwhere('product_description','like','%'.$search.'%')
                ->orwhere('product_price','like','%'.$search.'%')
                ->latest()->get();

        }else{
            $products = Product::all();

            //so cart items if user login
            $cart_item_count = MyCart::where('custom_users', session('auth_user.id'))->sum('qty');
            Session::put('cart_item_count', $cart_item_count);

        }

        return view('user.index', compact('products', 'search'));
        //return $search;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

return view('admin.add_product');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form
        $request->validate([
            'product_name' => 'required|string|min:3|max:255',
            'product_description' => 'required|string|min:10|max:5000',
            'product_qty'=>'required|integer|min:1|max:5000',
            'product_price' => 'required|numeric',
            'product_category' => 'required|string|max:255',
            'product_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $imageName = 'product_'.time(). $file->getClientOriginalExtension();
            // Store inside: storage/app/public/products
            $file->storeAs( "products", $imageName, 'public');
            // Save only filename in DB
            $imagePath = "/products/".$imageName;
        }

        // Insert into DB
        DB::table('Product')->insert([
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
            ->with('success', 'Product added successfully!');
    }




    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find product by ID
        $product = Product::find($id);

        // Check if product exists
        if (!$product) {
            return redirect()->route(route: 'product.index')
                ->with('error', 'Product not found!');
        }
        // Return view with product
        return view('user.product', compact('product'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $product = Product::find($id);
        return view('admin.edit_product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $product = Product::findOrFail($id);
        // Validate
        $request->validate([
            'product_name' => 'required|string|min:3|max:255',
            'product_description' => 'required|string|min:10|max:5000',
            'product_qty'=>'required|integer|min:1|max:5000',
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
            $imageName = 'product_'.time().'.'.$file->getClientOriginalExtension();
            $file->storeAs("products", $imageName, 'public');
            $product->product_image = "/products/".$imageName;
        }

        $product->save();

        return redirect('/product')
            ->with('success', 'Product Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){
        $product=Product::find($id);
        $product->delete();

        return redirect('/product')
            ->with('error', 'Product Delete successfully!');

    }




}
