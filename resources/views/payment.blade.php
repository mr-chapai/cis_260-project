@extends('layouts.applayout')

@section('title', 'Payment')

@section('content')
    <div class="container min-vh-100 d-flex justify-content-center align-items-center">
        <div class="card p-4 w-100" style="max-width: 420px;">
            <h4 class="text-center mb-4">Payment Details</h4>

            <form>
                <div class="mb-3">
                    <label class="form-label">Card Holder Name</label>
                    <input type="text" class="form-control" placeholder="John Doe">
                </div>

                <div class="mb-3">
                    <label class="form-label">Card Number</label>
                    <input type="text" class="form-control" placeholder="1234 5678 9012 3456">
                </div>

                <div class="row">
                    <div class="col-6 mb-3">
                        <label class="form-label">Expiry Date</label>
                        <input type="text" class="form-control" placeholder="MM/YY">
                    </div>

                    <div class="col-6 mb-3">
                        <label class="form-label">CVV</label>
                        <input type="password" class="form-control" placeholder="123">
                    </div>
                </div>

                <div class="d-flex justify-content-between mb-3">
                    <strong>Total:</strong>
                    <strong>$110</strong>
                </div>

                <button class="btn btn-success w-100">
                    Pay Now
                </button>
            </form>
        </div>
    </div>
@endsection
