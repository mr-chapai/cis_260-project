<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class UserModel extends Model
{

    protected $primaryKey = 'id';
    public function carts() {
        return $this->hasMany(CartModel::class, 'custom_users', 'id');
    }

    public function address() {
        return $this->hasMany(AddressModel::class, 'user_id', 'id');
    }

    public function orders() {
        return $this->hasMany(OrderModel::class, 'user_id', 'id');
    }





    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'gender',
        'role',
        'status'
    ];
}
