<?php

namespace App\Entities\Payments;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    const
        ON_DELIVERY  = 1,
        POST_PAYMENT = 2;
}
