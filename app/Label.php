<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    const
        TYPE_BESTSELLER = 1,
        TYPE_FREE_DELIVERY = 2;
}
