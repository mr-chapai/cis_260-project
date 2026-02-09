
<?php


?>
@extends('layouts.applayout')

@section('title', 'login')

@section('content')
    <div class="mycontainer p-3" >
    <h1 class="text-center">login </h1>
<hr>
        <form class=" row g-3" >
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail4">
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" class="form-control" id="inputPassword4">
        </div>
        <br>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-primary" type="button">login</button>

            </div>
    </form>


    <div>

        <br><p> Don't have account ?
            <a href="/signup"> Register Now </a>
        </p>
    </div>
    </div>
@endsection

