@extends('layouts.applayout')

@section('title', 'index')

@section('content')

    <div class="mycontainer">
        <h1 class="text-center">Sign Up </h1>
        <hr>
        <form class=" row g-3" >
            <div class="col-md-6">
                <label for="fname" class="form-label">First Name</label>
                <input type="fname" class="form-control" id="fname">
            </div>

            <div class="col-md-6">
                <label for="lname" class="form-label">Last Name</label>
                <input type="lname" class="form-control" id="lname">
            </div>

            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword4">
            </div>
            <div class="col-md-6">
                <label for="phone" class="form-label">Phone</label>
                <input type="phone" class="form-control" id="phone">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Address 2</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">City</label>
                <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">State</label>
                <select id="inputState" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="inputZip" class="form-label">Zip</label>
                <input type="text" class="form-control" id="inputZip">
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        agree to the terms and conditions
                    </label>
                </div>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-primary" type="button">Sign Up</button>

            </div>
            <div>

                <br><p> Have an account ?
                    <a href="/login"> Sign In </a>
                </p>
            </div>
    </div>

@endsection

