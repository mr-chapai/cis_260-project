
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

@section('title', 'Signup')

@section('content')

    <div class=" col-md-6 mycontainer p-3">
        <h1 class="text-center">Sign UP </h1>
        <hr>
        <form class=" row g-3" action="{{Route('user.store')}}" method="POST">
            @csrf
            <x-input_field label="First Name" name="fname" type="text" placeholder="First Name" value="{{old('fname')}}"/>

            <x-input_field label="Last Name" name="lname" type="text" placeholder="Last Name" value="{{old('lname')}}"/>

            <x-input_field label="Email" name="signup_email" type="email" placeholder="hamroshop@gmail.com" value="{{old('signup_email')}}"/>

            <x-input_field label="Password" name="signup_password" type="password" placeholder="password"/>


            <x-input_field label="Phone Number" name="phone" type="text"  value="{{old('phone')}}"/>

            <x-select_field  class="clo-6" label="Gender" name="gender" :options="['Select Gender','Male','Femal','Other']"/>

            {{--<x-radio_field group-labe="Gender" name="gender" :options="['male' => 'Male','female' => 'Female', 'others' => 'Others']"/>
--}}
            <x-input_field label="Address" name="address" type="text" divclass="clo-12" placeholder="1234 Main St" value="{{old('address')}}"/>
            <x-input_field label="Address 2" name="address2" type="text" divclass="col-6"
                           placeholder="Apartment, studio, or floor" value="{{old('address2')}}"/>
            <x-input_field label="City" name="city" type="text"  value="{{old('city')}}"/>
            <x-input_field label="Country" name="country" type="text"  value="{{old('country')}}"/>

            <x-select_field label="State" name="state" :options="['Select state'] + $states" value="{{old('state')}}" />




            <x-input_field label="Zip Code" name="zip" type="text" placeholder="Zip Code" value="{{old('zip')}}"/>
            <x-checkbox_field name="check">I agree to the <a href="/terms">Terms and Conditions</a></x-checkbox_field>
            <x-button_field name="signup" type="submit" placeholder="Sign Up" class="col-6"/>

            <div>

                <br>
                <p> Have an account ?
                    <a href="{{Route('login.form')}}"> Sign In </a>
                </p>
            </div>
        </form>
    </div>

@endsection




