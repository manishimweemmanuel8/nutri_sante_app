<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product_store extends Model
{
    //
    protected $fillable = ['product_id','quantity','user_id','shop'];
    use SoftDeletes;
    
     public function product(){
    	return $this->belongsTo(product::class);
    } 
}

