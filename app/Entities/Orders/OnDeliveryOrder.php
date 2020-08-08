<?php

namespace App\Entities\Orders;

use App\Entities\Payments\PaymentMethod;
use App\Order;

class OnDeliveryOrder extends Order
{
    protected $idPaymentMethodType = PaymentMethod::ON_DELIVERY;

    public function createOrder(array $data)
    {
        $data['idPaymentMethod'] = $this->idPaymentMethodType;
        return self::create($data);
    }
}
