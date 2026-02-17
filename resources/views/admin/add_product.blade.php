@extends('layouts.applayout')

@section('title', 'Add Product')

@section('content')

    <div class="mycontainer">

        <form class="form-floating" method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
            @csrf
            <h1 class="text-center">Add Product</h1>
            <hr>

            {{-- Product Name --}}
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Title:</label>
                <input type="text" class="form-control border-dark" id="product_name" name="product_name"
                       placeholder="Product Title" value="{{ old('product_name') }}">
                @error('product_name')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Product Description --}}
            <div class="mb-3">
                <label for="product_description" class="form-label">Product Description</label>
                <textarea class="form-control border-dark" id="product_description" rows="3"
                          name="product_description">{{ old('product_description') }}</textarea>
                @error('product_description')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Product Category --}}
            <div class="mb-3">
                <label for="product_category" class="form-label">Product Category</label>
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

            {{-- Product Image --}}
            <div class="mb-3">
                <label for="formFile" class="form-label">Product Image</label>
                <input class="form-control border-dark" type="file" id="formFile" name="product_image">
                @error('product_image')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Product Price --}}
            <div class="mb-3">
                <label for="product_price" class="form-label">Product Price:</label>
                <input type="text" class="form-control border-dark" id="product_price" name="product_price"
                       placeholder="Product Price" value="{{ old('product_price') }}">
                @error('product_price')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary me-md-2" type="submit">Add Product</button>
            </div>
        </form>

    </div>

@endsection
