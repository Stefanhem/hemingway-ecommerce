<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductLabel extends Model
{
    protected $fillable = ['idProduct', 'idLabel'];

    public function label()
    {
        return $this->belongsTo(Label::class, 'idLabel');
    }
}
