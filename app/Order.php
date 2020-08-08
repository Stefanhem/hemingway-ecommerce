<?php

namespace App;

use App\Entities\Payments\PaymentMethod;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $idPaymentMethodType;
    protected $table = 'orders';
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['email', 'name', 'phoneNumber', 'address', 'country', 'city', 'zipCode', 'price', 'idPaymentMethod'];

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
