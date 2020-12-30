<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $fillable = [
        'type',
        'amount',
        'status',
        'code',
        'created_at',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
