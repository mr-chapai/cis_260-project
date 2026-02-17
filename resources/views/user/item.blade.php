@extends('layouts.applayout')

@section('title', 'index')

@section('content')
    <h1>welcom to index page </h1>

    <div class="card" style="width: 18rem;">
        <img src={{ asset('icon-img/product-img/headset.png') }} class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Protuct Name: Waireless Headset</h5>
            <p class="card-text">Obsessively engineered with our best noise cancellation and spatialized audio for immersive listening, the QuietComfort Ultra Headphones (2nd Gen) make every note expand, every piece of dialogue hit harder, and every melody take up more space. They’re crafted with luxe materials for unrivaled comfort and premium design, letting you sink deeper than ever into your favorite songs and video content.</p>
            <h5 class="card-title">Price:$ 29</h5>
            <a href="#" class="btn btn-primary">add to cart</a>

        </div>
    </div>











@endsection
