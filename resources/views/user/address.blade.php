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

    $addresstype= array(
        'shipping' => 'shipping',
        'Billing'=> 'Billing',
    );

    $states = array(
         '' => 'Select State',
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

@section('title', 'shipping')

@section('content')

    <div class=" col-md-6 mycontainer mt-3">

        <h1 class="text-center">
            {{ isset($address) ? 'Edit Address' : 'Add Address' }}
        </h1>
        <hr>
        <form class="row g-3" method="POST"
              action="{{ isset($address) ? route('address.update', $address->id) : route('address.save') }}">
            @csrf
            @if(isset($address))
                @method('PUT')
            @endif
            <x-select_field class="clo-6" label="Address Type" name="type"
                            :options="[''=>'Select Type','billing'=>'Billing','shipping'=>'Shipping']"
                            value="{{ old('type', $address->type ?? '') }}"/>

            <x-input_field label="Street Address" name="street_address" type="text" divclass="col-12"
                           placeholder="123 s man st"
                           value="{{ old('street_address', $address->street_address ?? '') }}"/>
            <x-input_field label="Address 2" name="address2" type="text" divclass="col-6"
                           placeholder="Apartment, studio, or floor"
                           value="{{ old('address2', $address->address_2 ?? '') }}"/>
            <x-input_field label="City" name="city" type="text" placeholder="city"
                           value="{{old('city',$address->city ??'')}}"/>
            <x-select_field label="State" name="state" :options=" $states"
                            value="{{old('state',$address->state??'')}}"/>
            <x-input_field label="Zip Code" name="zip" type="text" placeholder="Zip Code" value="{{old('zip',$address->zip??'')}}"/>
            <x-input_field label="Country" name="country" type="text" value="{{old('country',$address->country??'')}}"/>
            <x-button_field name="save_address" type="submit" placeholder="{{ isset($address) ? 'Update' : 'Save' }}"/>

        </form>
    </div>

@endsection




