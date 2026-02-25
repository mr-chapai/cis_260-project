@php
    use Illuminate\Support\Str;
@endphp
@extends('layouts.applayout')

@section('title', 'Home')

@section('content')
    <h1>Welcome, USER_ .....</h1>

    @if($products->isEmpty())
        <p>No products added yet.</p>
    @else
    <div class="row ">
            @foreach($products as $product)
                <div class="col-md-3 mb-4 mt-5">
                    <div class="card" style="width:95%; height: 500px">
                        @if($product->product_image)
                            <img src="{{ asset('storage/' . $product->product_image) }}"
                                 class="card-img-top p-3"
                                 alt="product_image_{{ $product->id }}"
                            style="width: 100%; max-height: 250px; object-fit: contain;"/>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">Product Name:"{{str::limit( $product->product_name, 20)}}</h5>
                            <p class="card-text">{{str::limit($product->product_description,100)}}
                                <a href="{{ route('product.index', $product->id) }}"> See more</a>
                            </p>
                            <p class="card-title">Price: ${{ number_format($product->product_price, 2) }}</p>
                            <a href="#" class="btn btn-success">Add to Cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

@endsection


