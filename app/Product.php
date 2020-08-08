<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    const
        TYPE_NOVCANICI = 1,
        TYPE_TORBE = 2,
        TYPE_WELLNES = 3,
        TYPE_OFFICE = 4,
        TYPE_MOTO_OPREMA = 5,
        TYPE_OSTALO = 6,
        TYPE_KRAVATE_AKSESOARI = 7,
        TYPE_MUSKA_PECINA = 8,
        TYPE_SPECIAL_OFFER = 9;

    public static $SIMMILAR_PRODUCTS = [
        self::TYPE_NOVCANICI => [self::TYPE_TORBE, self::TYPE_WELLNES],
        self::TYPE_TORBE => [self::TYPE_NOVCANICI, self::TYPE_WELLNES],
        self::TYPE_WELLNES => [self::TYPE_TORBE, self::TYPE_NOVCANICI],
        self::TYPE_OFFICE => [self::TYPE_OFFICE, self::TYPE_MUSKA_PECINA],
        self::TYPE_MOTO_OPREMA => [self::TYPE_MOTO_OPREMA],
        self::TYPE_OSTALO => [self::TYPE_NOVCANICI, self::TYPE_MUSKA_PECINA],
        self::TYPE_KRAVATE_AKSESOARI => [self::TYPE_KRAVATE_AKSESOARI],
        self::TYPE_MUSKA_PECINA => [self::TYPE_MUSKA_PECINA],
        self::TYPE_SPECIAL_OFFER => [self::TYPE_SPECIAL_OFFER]
    ];

    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['name', 'idType', 'price', 'quantityInStock', 'mainImage', 'description', 'isOnSpecialOffer', 'priceOnSpecialOffer', 'dimensions', 'code'];

    public function labels()
    {
        return $this->hasMany(ProductLabel::class, 'idProduct');
    }
}
