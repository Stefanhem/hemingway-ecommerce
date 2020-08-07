<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    const CONFIG_ANNOUNCEMENT = 'announcement';
    protected $table = 'config';
    protected $fillable = ['key', 'value'];
}
