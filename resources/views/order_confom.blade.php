@extends('layouts.applayout')

@section('title', 'index')

@section('content')
    <div class="container min-vh-100 d-flex justify-content-center align-items-center">
        <div class="card text-center shadow-sm p-4" style="max-width: 420px;">
            <div class="card-body">
                <h2 class="text-success mb-3">Order Successful</h2>

                <p class="mb-2">
                    Thank you! Your order has been placed successfully.
                </p>

                <p class="fw-bold mb-3">
                    Order ID: #123456
                </p>

                <div class="d-grid gap-2">
                    <a href="#" class="btn btn-success">View Order</a>
                    <a href="/dashboard" class="btn btn-outline-primary">Go to Home</a>
                </div>
            </div>
        </div>
    </div>



@endsection

