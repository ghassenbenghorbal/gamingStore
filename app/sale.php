<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'price'
    ];

    public function commands()
    {
    	return $this->hasMany('App\Command', 'sale_id', 'id')->orderBy('created_at','DESC');
    }
}
