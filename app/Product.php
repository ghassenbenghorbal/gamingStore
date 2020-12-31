<?php

namespace App;

use App\Key;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'image',
        'description',
        'price',
        'genre',
        'discount',
        'tag',
        'category_id'
    ];

    public function category()
    {
    	return $this->belongsTo('App\Category','category_id','id');
    }
    public function keys()
    {
        return $this->hasMany('App\Key', 'product_id', 'id');
    }

}
