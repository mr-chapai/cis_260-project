@php
    $category=[
        'Electronics' => 'Electronics',
       'Media' => 'Media',
       'Equipment' => 'Equipment',
       'Props' => 'Props',
       'Styling Tools' => 'Styling Tools',
       'Technician' => 'Technician',
    ];

    $qty= range(0, 1000);

@endphp

@extends('layouts.applayout')

@section('title', 'Edit ProductModel')

@section('content')

    <div class="mycontainer">
        {{-- ProductModel edit form --}}
        <form class=" row g-3" method="POST" action="{{route('product.update', $product->id)}}" enctype="multipart/form-data">
            @csrf

            <h1 class="text-center">Update Product</h1>
            <hr>
            <x-input_field  divclass="clo-12 mt-2" label="Product name" name="product_name" type="text" value="{{$product->product_name}}"/>

            <x-textarea_field  row="5" label="Product Description" name="product_description"
                               value="{{$product->product_description}}"/>

            <x-select_field label="Product Category" name="product_category" :options="$category" value="{{$product->product_category}}"/>
            <x-select_field label="Product Quantity" name="product_qty" :options="$qty" value="{{$product->product_qty}}"/>

            <div class="mb-3">
                <label class="form-label">Current Product Image</label><br>
                @if($product->product_image)
                    <img src="{{ asset('storage/'.$product->product_image) }}"
                         width="150"
                         class="mb-2" alt="img">
                @else
                    <label class="form-label">Current Image not available</label><br>
                @endif
                <x-input_field label="Product Image" name="product_image" type="file" value="{{$product->product_image}}"/>
            </div>

            <x-input_field label="Price" name="product_price" type="text" value="{{$product->product_price}}"/>
            <x-button_field type="submit" name="add_product_submit " placeholder="Update Product"/>
        </form>



            {{-- ProductModel edit old input field --}}
            <!-- -
            <div class="mb-3">
                <label for="product_name" class="form-label">ProductModel Title:</label>
                <input type="text" class="form-control border-dark" id="product_name" name="product_name"
                       placeholder="ProductModel Title" value="{{ old('product_name') }}">
                @error('product_name')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- ProductModel Description --}}
            <div class="mb-3">
                <label for="product_description" class="form-label">ProductModel Description</label>
                <textarea class="form-control border-dark" id="product_description" rows="3"
                          name="product_description">{{ old('product_description') }}</textarea>
                @error('product_description')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- ProductModel Category --}}
            <div class="mb-3">
                <label for="product_category" class="form-label">ProductModel Category</label>
                <select class="form-select border-dark" id="product_category" name="product_category">

                    <option value="" selected>Must select one</option>
                    <option value="Electronics" {{ old('product_category') == 'Electronics' ? 'selected' : '' }}>Electronics</option>
                    <option value="Media" {{ old('product_category') == 'Media' ? 'selected' : '' }}>Photo/Video</option>
                    <option value="Equipment" {{ old('product_category') == 'Equipment' ? 'selected' : '' }}>Equipment</option>
                    <option value="Stabilization" {{ old('product_category') == 'Stabilization' ? 'selected' : '' }}>Stabilization</option>
                    <option value="Setup" {{ old('product_category') == 'Setup' ? 'selected' : '' }}>Setup</option>
                    <option value="Backdrop" {{ old('product_category') == 'Backdrop' ? 'selected' : '' }}>Backdrop</option>
                </select>
                @error('product_category')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- ProductModel Image --}}
            <div class="mb-3">
                <label for="formFile" class="form-label">ProductModel Image</label>
                <input class="form-control border-dark" type="file" id="formFile" name="product_image">
                @error('product_image')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- ProductModel Price --}}
            <div class="mb-3">
                <label for="product_price" class="form-label">ProductModel Price:</label>
                <input type="text" class="form-control border-dark" id="product_price" name="product_price"
                       placeholder="ProductModel Price" value="{{ old('product_price') }}">
                @error('product_price')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary me-md-2" type="submit">Add ProductModel</button>
            </div>
            -->
        </form>


    </div>

@endsection
