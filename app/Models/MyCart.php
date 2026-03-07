<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyCart extends Model
{
    protected $primaryKey = 'id';
    public function users() {
        return $this->belongsTo(CustomUser::class, 'custom_users', 'id');
    }
    protected $fillable = [
        'product_id',
        'product_name',
        'product_image',
        'custom_user_id',
        'price',
        'qty',
        'total_price'
    ];
}
