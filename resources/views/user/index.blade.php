@php
    use Illuminate\Support\Str;
@endphp
@extends('layouts.applayout')

@section('title', 'Home')

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h4 class="ms-1">
        @php
            $currentUserName=session('auth_user')?session('auth_user.first_name'):'';
            $greeting= $currentUserName?'Welcome, '.$currentUserName:'';
            echo $greeting;

        @endphp
    </h4>






    @if($products->isEmpty())
        <p class="text-center"> Products does not available.</p>
    @else
        <div class="row ">
            @foreach($products as $product)
                <div class="col-md-3 mb-4">
                    <div class="card rounded-4" style="width:95%; height: 380px; font-size: 15px;">
                        @if($product->product_image)
                            <img src="{{ asset('storage/' . $product->product_image) }}"
                                 class="card-img-top p-3"
                                 alt="product_image_{{ $product->id }}"
                                 style="width: 100%; max-height: 150px; object-fit: contain;"/>
                        @endif
                        <div class="card-body ">
                            <h6 class="card-title">{{str::limit( $product->product_name, 50)}}</h6>
                            <p class="card-text">{{str::limit($product->product_description,100)}}
                                <a href="{{ route('product.product', $product->id) }}"> See more</a>
                            </p>
                            <p class="card-title">Price: ${{ number_format($product->product_price, 2) }}</p>

                            @if($product->product_qty>0)
                                <div class="justify-content-center">
                                    <form action="{{ route('cart.store', $product->id )}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary   position-absolute bottom-0  mb-3">
                                            Add to Cart
                                        </button>
                                    </form>
                                    @else
                                        <button type="submit" class="btn btn-warning">out of stock</button>
                                    @endif
                                </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

@endsection


