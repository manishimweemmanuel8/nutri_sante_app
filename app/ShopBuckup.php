<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ShopBuckup extends Model
{
    //
     protected $fillable = ['product_id','quantity','user_id'];
    use SoftDeletes;
     public function product(){
    	return $this->belongsTo(product::class);
    } 
}
