<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\product;
use App\AfterProduction;


class Production_store extends Model
{
    //
    protected $fillable = ['after_production_id','quantity','user_id','stock'];
    use SoftDeletes;

    public function product(){
    	return $this->belongsTo(product::class);
    } 

     public function afterProduction(){
    	return $this->belongsTo(AfterProduction::class);
    } 

}
