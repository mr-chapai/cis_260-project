@extends('layouts.applayout')

@section('title', 'index')

@section('content')
    <div class="container my-5 mycontainer">
        <h3 class="mb-4">Shopping Cart</h3>

        <table class="table align-middle">
            <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th width="120">Quantity</th>
                <th>Total</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <img src="product.jpg" width="60" class="me-2 rounded">
                    Product Name
                </td>
                <td>$50</td>
                <td>
                    <input type="number" class="form-control border-dark" value="1" min="1">
                </td>
                <td>$50</td>
                <td>
                    <button class="btn btn-danger btn-sm">Remove</button>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="product.jpg" width="60" class="me-2 rounded">
                    Product Name
                </td>
                <td>$60</td>
                <td>
                    <input type="number" class="form-control border-dark" value="1" min="1">
                </td>
                <td>$50</td>
                <td>
                    <button class="btn btn-danger btn-sm">Remove</button>
                </td>
            </tr>
            </tbody>
        </table>

        <div class="text-end">

            <form action="/payment" method="get">
            <h5>Total: <strong>$110</strong></h5>
            <button class="btn btn-success mt-2">Checkout</button>
            </form>
        </div>
    </div>



@endsection

