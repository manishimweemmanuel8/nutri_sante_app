<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product_Request extends Model
{
    //
     protected $fillable = ['product_id','quantity','shop_user','status','storage_user','shop'];
    use SoftDeletes;

     public function product(){
    	return $this->belongsTo(product::class);
    } 
}
