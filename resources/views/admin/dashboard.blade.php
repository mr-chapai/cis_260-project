@extends('layouts.applayout')

@section('title', 'index')

@section('content')

    {{-- Success message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="mt-3">
        <a href="/add" class="btn btn-primary">Add Product</a>
    </div>


    {{-- List all products at the top --}}
    <h3 class="mt-2">Product List</h3>

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
                    <td>${{ number_format($product->product_price, 2) }}</td>

                    <td>
                        @if($product->product_image)
                            <img src="{{ asset('storage/' . $product->product_image) }}" alt="Product Image" width="80">
                        @else
                            <p>N/A</p>
                        @endif
                    </td>
                    <td class="">

                        <a class="btn btn-primary mt-1" href="{{ route('product.index', $product->id) }}" role="button">View</a>
                        <form  class="mt-1" action="{{ route('product.edit', $product->id) }}" method="POST">

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



                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    @endif

@endsection
