<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{ /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'comp_image','comp_nom','comp_lieu','comp_date','nbr_participant','description',"product_id","nom_gagnant"];
   protected $casts=['nbr_participant'=>'integer','comp_date'=>'dateTime'];
  public function participants(){
      return $this->belongsToMany('App\User');
  }
  public function product()
  {
      return $this->belongsTo('App\Product','product_id','id');
  }
}
   


