
<?php
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


?>

@extends('layouts.applayout')

@section('title', 'index')

@section('content')

    <div class=" col-md-6 mycontainer p-3">
        <h1 class="text-center">Sign UP </h1>
        <hr>
        <form class=" row g-3">

            <x-input_field label="First Name" name="fname " type="text"/>
            <x-input_field label="Last Name" name="lname " type="text"/>
            <x-input_field label="Email" name="email " type="email"/>
            <x-input_field label="Password" name="password " type="password"/>
            <x-input_field label="Phone Number" name="phone " type="text"/>
            <x-input_field label="Address" name="address" type="text" divclass="clo-12" placeholder="1234 Main St"/>
            <x-input_field label="Address 2" name="address2" type="text" divclass="clo-12"
                           placeholder="Apartment, studio, or floor"/>
            <x-input_field label="City" name="city " type="text"/>
            <x-input_field label="State" name="state " type="select"/>

            <!--
        <div class="col-md-6">
            <label for="inputState" class="form-label">State</label>
            <select id="inputState" name="state" class="form-select border-dark">
                <option value="">Choose...</option>
                @foreach($states as $abbr => $name)
                <option value="{{ $abbr }}" {{ old('state') == $abbr ? 'selected' : '' }}>
                        {{ $name }}
                </option>

            @endforeach
            </select>
            @error('state')
            <div class="text-danger small">{{ $message }}</div>
            @enderror
            </div>
-->

            <x-select_field
                label="State"
                name="state"
                :options="$states"/>




        <x-input_field label="Zip" name="zip " type="text" divclass="col-3"/>

        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input border-dark" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    <a href=""> agree to the terms and conditions</a>
                </label>
            </div>
        </div>

        <x-button_field name="signup" type="submit" placeholder="Sign Up" class="col-6"/>

        <div>

            <br><p> Have an account ?
                <a href="/login"> Sign In </a>
            </p>
        </div>
    </form>
    </div>


@endsection




