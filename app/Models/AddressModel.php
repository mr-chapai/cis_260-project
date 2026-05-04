<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddressModel extends Model
{
    protected $table = 'address';
    protected $fillable = [
        'street_address',
        'address_2',
        'city',
        'state',
        'zip',
        'country',
        'type',
    ];
}
