<?php
namespace App\Entities\Orders;

use App\Entities\Payments\PaymentMethod;
use App\Order;

class PostPaymentOrder extends Order
{
    protected $idPaymentMethodType = PaymentMethod::POST_PAYMENT;
}
