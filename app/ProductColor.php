<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    protected $fillable = ['idProduct', 'idColor', 'imagePath'];

    public function color()
    {
        return $this->belongsTo(Color::class, 'idColor');
    }
}
