<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MyCart;

class CustomUser extends Model
{

    protected $primaryKey = 'id';
    public function carts() {
        return $this->hasMany(MyCart::class, 'custom_users', 'id');
    }


    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'gender',
        'role',
        'address',
        'address2',
        'city',
        'country',
        'state',
        'zip',
        'status'
    ];
}
