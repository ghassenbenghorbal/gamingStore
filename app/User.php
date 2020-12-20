<?php

namespace App;
use app\Deposit;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'full_name',
        'email',
        'password',
        'phone',
        'address_id',
        'balance',
        'deposit_id'
    ];

    public function competitions(){
        return $this->belongsToMany('App\Competition')
        ->withTimestamps();
    }
    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }
}
