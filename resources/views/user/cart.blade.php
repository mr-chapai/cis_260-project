@extends('layouts.applayout')

@section('title', 'CartController')

@section('content')
    <div class="container my-5 mycontainer">
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
        <h3 class="mb-4">Shopping Cart</h3>

        <table class="table align-middle">
            <thead>
            <tr>
                <th>S.N</th>
                <th></th>
                <th>Product</th>
                <th>Price</th>
                <th width="120">Quantity</th>
                <th>Total</th>
                <th>Remove</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @php
                $grandTotal = 0;
            @endphp
            @php
                $grandTotal = 0;
            @endphp

            <tbody>
            @foreach($cartItems as $item)
                @php
                    $rowTotal = $item->qty * $item->price;
                    $grandTotal += $rowTotal;
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $item->product_image) }}"
                             alt="img"
                             style="width: 100%; max-height: 20px; object-fit: contain;">
                    </td>
                    <td>{{ $item->product_name }}</td>
                    <td>${{ number_format($item->price, 2) }}</td>
                    <td>


                        <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-flex">
                            @csrf
                           <input type="number" name="qty"
                                   class="form-control border-dark me-2"
                                   value="{{ $item->qty }}" min="1">
                            <button class="btn btn-primary btn-sm">&#9989;</button>
                        </form>

                    </td>
                    <td>${{ number_format($rowTotal, 2) }}</td>
                    <td class="d-flex">
                        <button type="button" class="btn btn-danger ms-1" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                            &#x2716;
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header text-center bg-warning">
                                        <h5 class="modal-title text-center" id="exampleModalLabel">
                                            Item Remove Waring</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to Remove item?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Cancel
                                        </button>

                                        <form action="{{ route('cart.delete', $item->id) }}" method="POST"
                                              style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
            </tbody>
        </table>
        <div class="text-end">

            <form action="/payment" method="get">
                <h5><strong>
                        <div class="text-end mt-3">
                            <h5>Total: <strong>${{ number_format($grandTotal, 2) }}</strong></h5>
                        </div>
                    </strong></h5>

            </form>


        </div>
    </div>

@endsection

