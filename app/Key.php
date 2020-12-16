<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    protected $fillable = [
        'code',
        'product_id',
        'user_id',
    ];

}
