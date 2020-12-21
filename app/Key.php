<?php

namespace App;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    protected $fillable = [
        'code',
        'product_id',
        'command_id',
        'buying_price',
        'selling_price'
    ];

}
