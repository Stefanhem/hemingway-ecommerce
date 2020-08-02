<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['name', 'idType', 'price', 'quantityInStock', 'mainImage', 'description', 'isOnSpecialOffer'];
}
