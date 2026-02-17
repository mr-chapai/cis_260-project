
<?php


?>
@extends('layouts.applayout')

@section('title', 'login')

@section('content')


    <div class=" col-md-6 mycontainer p-3">
        <h1 class="text-center">Sign In </h1>
        <hr>
        <form class=" row g-3">

            <x-input_field label="Email" name="email " type="email" placeholder="hamroshop@gmail.com"/>
            <x-input_field label="Password" name="password " type="password" placeholder="Enter Your Password"/>


            <x-button_field name="signup" type="submit" placeholder="Sign Up" class="col-6"/>

            <div>

                <br><p> Have an account ?
                    <a href="/signup"> Sign In </a>
                </p>
            </div>
        </form>
    </div>




@endsection

