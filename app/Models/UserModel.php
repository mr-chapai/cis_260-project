<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CartModel;

class UserModel extends Model
{

    protected $primaryKey = 'id';
    public function carts() {
        return $this->hasMany(CartModel::class, 'custom_users', 'id');
    }


    protected $fillable = [
        'first_name',
        'last_name',
        'email',
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
