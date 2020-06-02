<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\product;

class Nutrition extends Model
{
    //
    protected $fillable = ['cunsultation_id','product_id','quantity','user_id','customer_id'];
    use SoftDeletes;

     public function product(){
    	return $this->belongsTo(product::class);
    }

    
}
