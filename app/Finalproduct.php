<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Finalproduct extends Model
{
    //
      protected $fillable = ['product_id','category','user_id','quantity','amount','supply_name','supply_phone'];
    use SoftDeletes;

      public function product(){
    	return $this->belongsTo(product::class);
    } 
}
