@extends('layouts.applayout')

@section('title', 'Product Details')

@section('content')


    <div class="row">
            <div class="mycontainer col-8 ">
                <h1>Product Details</h1>
                <hr>
                <h5 class="card-title">{{ $product->product_name }}</h5>
                <hr>
                    @if($product->product_image)
                        <img  class="rounded mx-auto d-block myimg"
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
                        <a class="btn btn-primary mt-3" href="{{ route('product.show', $product->id) }}"  >back
                        </a>

                        <a href="#" class="btn btn-success mt-3">Add to Cart</a>
                    </div>
            </div>
    </div>
@endsection




