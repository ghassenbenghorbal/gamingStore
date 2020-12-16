<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = [
        'type',
        'amount',
        'code',
        'deposit_id',
    ];
}
