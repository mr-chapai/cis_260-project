@extends('layouts.applayout')

@section('title', 'ProductModel Details')

@section('content')

    <div class="row">
        <div class="mycontainer col-8  mt-3">
            <h1>Product Details</h1>
            <hr>
            <h5 class="card-title">{{ $product->product_name }}</h5>
            <hr>
            @if($product->product_image)
                <img class="rounded mx-auto d-block myimg"
                     src="{{ asset('storage/' . $product->product_image) }}"
                     alt="{{ $product->product_name }}">
            @endif
            <div class="card-body">

                <p class="card-text mt-3">{{ $product->product_description }}</p>
                <p class="card-text mt-3">Category:{{ $product->product_category }}</p>
                <p class="card-text mt-3">Created date: {{ $product->created_at }}</p>
                <p class="card-text mt-3">Created Quantity: {{ $product->product_qty }}</p>
                <h5 class="card-title mt-3">Price: ${{ number_format($product->product_price, 2) }}</h5>
                <!-- Link to show page -->

                <div class="d-flex mt-3">

                    @if($product->product_qty>0)
                        <form action="{{ route('cart.store', $product->id )}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary align-text-bottom me-5">Add to Cart</button>
                        </form>
                    @else
                        <button type="submit" class="btn btn-warning me-5">out of stock</button>
                    @endif

                    @if(session('auth_user') && session('auth_user')['role'] === 'admin')
                        <a class="btn btn-success me-5" href="{{ route('product.products', $product->id) }}">Back to
                            Products</a>
                    @else
                        <a class="btn btn-success me-5" href="{{ route('index', $product->id) }}">Back to
                            Home</a>
                    @endif
                        <a class="btn btn-info me-5" href="{{ route('cart.cart', $product->id) }}">Back to
                            Cart</a>

                </div>

            </div>
        </div>
    </div>
@endsection




