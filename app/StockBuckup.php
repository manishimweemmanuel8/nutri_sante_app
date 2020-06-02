<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;


class StockBuckup extends Model
{
    //
    protected $fillable = ['after_production_id','quantity','user_id','stock'];

     public function product(){
    	return $this->belongsTo(product::class);
    } 

}
