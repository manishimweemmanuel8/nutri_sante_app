<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\product;
use App\Rowproduct;
use App\AfterPreparation;

class Preparation extends Model
{
    //

    protected $fillable = ['row_product_id','user_id','quantity','employee_name'];
    use SoftDeletes;

      public function rowProduct(){
    	return $this->belongsTo(Rowproduct::class);
    } 

      public function afterPreparation(){
    	return $this->hasOne(AfterPreparation::class);
    } 
}
