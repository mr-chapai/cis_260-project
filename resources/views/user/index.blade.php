@php
    use Illuminate\Support\Str;
@endphp
@extends('layouts.applayout')

@section('title', 'Index')

@section('content')
    <h1>Welcome to the Index Page</h1>

    <div class="row">
            @foreach($products as $product)
                <div class="col-md-3 mb-4 mt-5">
                    <div class="card" style="width:98%; height: 550px">
                        @if($product->product_image)
                            <img src="{{ asset('storage/' . $product->product_image) }}"


                                 class="card-img-top"
                                 alt="product_image_{{ $product->id }}"
                                 width="300px"
                                 height=300px>
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

@endsection


