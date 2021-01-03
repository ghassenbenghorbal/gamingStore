<?php

namespace App;
use app\Deposit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{
    use SoftDeletes, AuthenticableTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

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
        return $this->hasMany('App\Deposit', 'user_id', 'id');
    }
}
