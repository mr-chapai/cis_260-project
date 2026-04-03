<?php

?>
@extends('layouts.applayout')
@section('title', 'login')
@section('content')
    <div class=" col-md-6 mycontainer mt-3">
        <h1 class="text-center">Sign In </h1>

        <hr>
        @if(session('usererror'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('usererror') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form class=" row g-3" action="{{Route('login.store')}}" method="POST">
            @csrf
            <x-input_field label="Email" name="login_email" type="email" placeholder="hamroshop@gmail.com" value="{{old('login_email')}}"/>
            <x-input_field label="Password" name="login_password" type="password" placeholder="Enter Your Password"/>
            <x-button_field name="login" type="submit" placeholder="Sign In" class="col-6"/>
            <div>
                <br>
                <p> Have an account ?
                    <a href="{{Route('user.form')}}"> Sign Up </a>
                </p>
            </div>
        </form>
    </div>

@endsection

