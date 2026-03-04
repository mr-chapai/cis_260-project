@extends('layouts.applayout')

@section('title', 'Signup')

@section('content')
    <div class=" col-md-6 mycontainer p-3">
        <h5 class="text-center">Your information </h5>
        <hr>
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <p>User id: {{$user->id}}</p>
        <p> First Name: {{$user->first_name}}</p>
        <p> Last Name: {{$user->last_name}}</p>
        <p> Email: {{$user->email}}</p>
        <p> User Role: {{$user->role}}</p>
        <p> Status: {{$user->status}}</p>
        <p> Phone: {{$user->phone}}</p>
        <p> Gender : {{$user->gender}}</p>
        <p> Address {{$user->address}}</p>
        <p> Apt/Floor {{$user->address2}}</p>
        <p> City:{{$user->city}}</p>
        <p> Country: {{$user->country}}</p>
        <p> State: {{$user->state}}</p>
        <p>Zip : {{$user->zip}}</p>




                <br>
                <p> Do you want to update your information ?
                    <a href="{{route('user.edit', $user->id) }}"> Edit In </a>
                </p>
            </div>
        </form>
    </div>

@endsection




