
@php
    $catagory = array(
        'EL' => 'Electronics',
        'MD' => 'Media',
        'EQ' => 'Equipment',
        'PS' => 'Props',
        'ST' => 'Styling Tools',
        'TECH' => 'Technician',
    );
    $qty= range(1, 1000);
    $states = array(
        'AL' => 'Alabama',
        'AK' => 'Alaska',
        'AZ' => 'Arizona',
        'AR' => 'Arkansas',
        'CA' => 'California',
        'CO' => 'Colorado',
        'CT' => 'Connecticut',
        'DE' => 'Delaware',
        'DC' => 'District Of Columbia',
        'FL' => 'Florida',
        'GA' => 'Georgia',
        'HI' => 'Hawaii',
        'ID' => 'Idaho',
        'IL' => 'Illinois',
        'IN' => 'Indiana',
        'IA' => 'Iowa',
        'KS' => 'Kansas',
        'KY' => 'Kentucky',
        'LA' => 'Louisiana',
        'ME' => 'Maine',
        'MD' => 'Maryland',
        'MA' => 'Massachusetts',
        'MI' => 'Michigan',
        'MN' => 'Minnesota',
        'MS' => 'Mississippi',
        'MO' => 'Missouri',
        'MT' => 'Montana',
        'NE' => 'Nebraska',
        'NV' => 'Nevada',
        'NH' => 'New Hampshire',
        'NJ' => 'New Jersey',
        'NM' => 'New Mexico',
        'NY' => 'New York',
        'NC' => 'North Carolina',
        'ND' => 'North Dakota',
        'OH' => 'Ohio',
        'OK' => 'Oklahoma',
        'OR' => 'Oregon',
        'PA' => 'Pennsylvania',
        'RI' => 'Rhode Island',
        'SC' => 'South Carolina',
        'SD' => 'South Dakota',
        'TN' => 'Tennessee',
        'TX' => 'Texas',
        'UT' => 'Utah',
        'VT' => 'Vermont',
        'VA' => 'Virginia',
        'WA' => 'Washington',
        'WV' => 'West Virginia',
        'WI' => 'Wisconsin',
        'WY' => 'Wyoming'
    );

@endphp

@extends('layouts.applayout')

@section('title', 'edit user')

@section('content')
    <div class=" col-md-6 mycontainer p-3">
        <h5 class="text-center">Update Information  </h5>
        <hr>
            <p class="alert alert-secondary">Email: {{$user->email}}</p>
        <form class=" row g-3" action="{{Route('user.update',$user->id)}}" method="POST">
            @csrf
            <x-input_field label="First Name" name="fname" type="text" placeholder="First Name" value="{{$user->first_name}}"/>
            <x-input_field label="Last Name" name="lname" type="text" placeholder="Last Name" value="{{$user->last_name}}" />

            <!-- admin user only access for User Role and User Status-->
            @if(session('auth_user') && session('auth_user')['role'] === 'admin')
            <x-select_field  class="clo-6" label="Role" name="role"
                             :options="['user' => 'User', 'admin' => 'Admin', 'guest' => 'Guest']" value="{{$user->role}}"
            />
            <x-select_field  class="clo-6" label="Status" name="status"
                             :options="['panding' => 'Panding', 'expired' => 'Expired', 'active' => 'Active']" value="{{$user->status}}"
            />
            @endif


            <x-input_field label="Phone Number" name="phone" type="text"  value="{{$user->phone}}"/>
            <x-select_field  class="clo-6" label="Gender" name="gender"
                             :options="['0' => 'Select Gender','male' => 'Male', 'femal' => 'Femal', 'other' => 'Other']" value="{{$user->gender}}"/>
            <x-checkbox_field name="check">I agree to the <a href="/terms">Terms and Conditions</a></x-checkbox_field>
            <x-button_field name="update" type="submit" placeholder="Update" class="col-6"/>
            <div>
                <br>
                <p> To view user details ?
                    <a href="{{Route('user.user', $user->id)}}"> click here </a>
                </p>
            </div>
        </form>
    </div>

@endsection




