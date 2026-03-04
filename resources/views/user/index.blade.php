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
    <h1>Welcome,
        @php
            $currentUserName=session('auth_user')?session('auth_user.first_name'):'';
            echo $currentUserName;

        @endphp
    </h1>

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
                            @if($product->product_qty>0)
                            <form action="{{ route('cart.store', $product->id )}}" method="POST">
                                @csrf
                                <button  type="submit" class="btn btn-primary">Add to Cart</button>
                            </form>
                            @else
                                <button  type="submit" class="btn btn-warning">out of stock</button>
                            @endif


                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

@endsection


