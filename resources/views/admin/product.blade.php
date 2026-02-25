@extends('layouts.applayout')

@section('title', 'Product Dashbord')

@section('content')

    <div class="bg-white pt-1">
        <!--Product list heading row start -->
        <div class="row g-0 text-end  bg-white text-whitec">
            {{-- Success message --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            <div class="col-6 col-md-4  text-start">
                <h3 class="ms-2">Product List</h3>
            </div>
            <div class="col-sm-6 col-md-8 text-end">
                <span class=""> Product Count: {{ $products->count() ?? '0' }}</span>
                <span class="me-5"> Items Count: {{ $totalQuantity ?? '0' }}</span>
                <a href="/index" class="btn btn-primary">Customer view</a>
                <a href="/product" class="btn btn-primary me-3">Add Product</a>
            </div>
        </div>

        @if($products->isEmpty())
            <p>No products added yet.</p>
        @else
            <table class="table table-bordered table-striped">
                <thead class="table-success">
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col"> ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Category</th>
                    <th scope="col">Qty</th>
                    <th>Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{ $product->id }}</td>

                        <td>
                            <a href="{{ route('product.index', $product->id) }}"
                               style="text-decoration-line: none; color:black;">
                                {{ $product->product_name }}
                            </a>
                        </td>

                        <td>{{ $product->product_description }}
                        </td>
                        <td>{{ $product->product_category }}</td>
                        <td class="text-end">{{$product->product_qty}}</td>
                        <td class="text-end">${{ number_format($product->product_price, 2) }}</td>

                        <td class="align-self-center">
                            @if($product->product_image)

                                <img src="{{ asset('storage/' . $product->product_image) }}"
                                     alt="product_image_{{ $product->id }}"
                                     style="width: 100%; max-height: 80px; object-fit: contain;"/>
                            @else
                                <p>N/A</p>
                            @endif
                        </td>
                        <td class="d-flex">
                            <a class="btn btn-primary ms-1" href="{{ route('product.index', $product->id) }}"
                               role="button">View</a>
                            <a class="btn btn-success ms-1" href="{{ route('product.edit', $product->id) }}"
                               role="button">Edit</a>
                            <!--Delete Button trigger modal -->
                            <button type="button" class="btn btn-danger ms-1" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                Delete
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header text-center bg-warning">
                                            <h5 class="modal-title text-center" id="exampleModalLabel">Delete
                                                Waring</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this product?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Cancel
                                            </button>

                                            <form action="{{ route('product.delete', $product->id) }}" method="POST"
                                                  style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--
                        <form class="mt-1" action="{{ route('product.edit', $product->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">Edit</button>
                        </form>
@if(isset($success))
                                {{$success}}
                            @endif
                            <form class="mt-1" action="{{ route('product.delete', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
-->

                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>

        @endif
    </div>

@endsection
