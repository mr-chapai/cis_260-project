@extends('layouts.applayout')

@section('title', 'Index')

@section('content')
    <h1>Welcome to the Index Page</h1>

    <div class="row">
            <div class="mycontainer col-8">
                    @if($product->product_image)
                        <img  class="img-fluid"
                              src="{{ asset('storage/' . $product->product_image) }}"
                              alt="{{ $product->product_name }}"
                              width="" height="">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">Product Name: {{ $product->product_name }}</h5>
                        <p class="card-text">{{ $product->product_description }}</p>
                        <h5 class="card-title">Price: ${{ number_format($product->product_price, 2) }}</h5>

                        <!-- Link to show page -->
                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">
                            go back to products
                        </a>

                        <a href="#" class="btn btn-success">Add to Cart</a>
                    </div>
            </div>
    </div>
@endsection




