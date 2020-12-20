<?php

namespace App;
use App\sale;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    protected $fillable = [
        'sale_id',
        'subtotal',
        'product_id',
        'order_status',
        'quantity',
    ];
    public function sale()
    {
        return $this->belongsTo(sale::class);
    }
}
