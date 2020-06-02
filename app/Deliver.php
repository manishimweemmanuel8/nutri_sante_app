<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\product;


class Deliver extends Model
{
    //
   protected $fillable = ['product_id','quantity','shop_user','status','storage_user','shop','comment'];
    use SoftDeletes;

     public function product(){
    	return $this->belongsTo(product::class);
    } 
}
