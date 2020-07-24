<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['email', 'name', 'phoneNumber', 'address', 'country', 'city', 'zipCode', 'price'];
}
