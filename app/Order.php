<?php

namespace App;

use App\Entities\Payments\PaymentMethod;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $idPaymentMethodType;
    protected $table = 'orders';
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['email', 'name', 'phoneNumber', 'address', 'country', 'city', 'zipCode', 'price', 'idPaymentMethod', 'deliveryName', 'deliveryPhone'];

    const
        STATUS_PENDING = 1,
        STATUS_CONFIRMED = 2,
        STATUS_DENIED = 3;

    public function products()
    {
        return $this->hasMany(OrderProduct::class, 'idOrder');
    }

    public function createOrder(array $data)
    {
        $data['idPaymentMethod'] = $this->idPaymentMethodType;
        return self::create($data);
    }
}
