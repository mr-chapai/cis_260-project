@extends('layouts.applayout')

@section('title', 'view_user')

@section('content')
    <div class=" col-md-6 mycontainer p-3">
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h3>Your information</h3>
        <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
                    <p> First Name: {{$user->first_name}}</p>
                    <p> Last Name: {{$user->last_name}}</p>
                    <p> Email: {{$user->email}}</p>
                    <p> User Role: {{$user->role}}</p>
                    <p> Status: {{$user->status}}</p>
                    <p> Phone: {{$user->phone}}</p>
                    <p> Gender : {{$user->gender}}</p>
                    <p> Do you want to Edit your information ?
                        <a class="btn btn-success ms-1" href="{{ route('user.edit', 1) }}" role="button" title="View">Edit</a>
                    </p>
                </div>


















        <h3>Billing Addresses</h3>
        @php
        $billingAddress= $user->address->where('type', 'billing');
        @endphp
        @if($billingAddress && $billingAddress->count() > 0 )
            @foreach($billingAddress as $addr)
                <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
                    <p><strong>Street:</strong> {{ $addr->street_address }}</p>
                    <p><strong>Address 2:</strong> {{ $addr->address_2 }}</p>
                    <p><strong>City:</strong> {{ $addr->city }}</p>
                    <p><strong>State:</strong> {{ $addr->state }}</p>
                    <p><strong>ZIP:</strong> {{ $addr->zip }}</p>
                    <p><strong>Country:</strong> {{ $addr->country }}</p>
                    <a class="btn btn-success ms-1" href="{{ route('address.edit', $addr->id) }}" role="button"
                       title="View">Edit</a>
                    <a class="btn btn-danger ms-1" href="{{ route('address.delete', $addr->id) }}"
                       role="button" title="Edit">Delete</a>
                </div>
            @endforeach
        @else
            <p>No Billing address found.</p>
            <a class="btn btn-primary ms-1" href="{{ route('address.create') }}" role="button" title="View">Add</a>
        @endif




        <h3>Shipping Addresses</h3>
        @php
            $shipping= $user->address->where('type', 'shipping');
        @endphp
        @if($shipping && $shipping->count() > 0 )
            @foreach($shipping as $addr)
                <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
                    <p><strong>Street:</strong> {{ $addr->street_address }}</p>
                    <p><strong>Address 2:</strong> {{ $addr->address_2 }}</p>
                    <p><strong>City:</strong> {{ $addr->city }}</p>
                    <p><strong>State:</strong> {{ $addr->state }}</p>
                    <p><strong>ZIP:</strong> {{ $addr->zip }}</p>
                    <p><strong>Country:</strong> {{ $addr->country }}</p>
                    <a class="btn btn-success ms-1" href="{{ route('address.edit', $addr->id) }}" role="button"
                       title="View">Edit</a>
                    <a class="btn btn-danger ms-1" href="{{ route('address.delete', $addr->id) }}"
                       role="button" title="Edit">Delete</a>
                </div>
            @endforeach
        @else
            <p>No shipping address found.</p>
            <a class="btn btn-primary ms-1" href="{{ route('address.create') }}" role="button" title="View">Add</a>
        @endif












    </div>
@endsection




