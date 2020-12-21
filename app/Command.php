<?php

namespace App;
use app\sale;
use app\Key;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    protected $fillable = [
        'sale_id',
        'subtotal',
        'product_id',
        'order_status',
        'quantity',
        'order_id'
    ];
    public function sale()
    {
        return $this->belongsTo(sale::class);
    }
    public function keys()
    {
        return $this->hasMany(Key::class);
    }
}
