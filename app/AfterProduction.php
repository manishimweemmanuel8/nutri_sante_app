<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Production_store;

class AfterProduction extends Model
{
    //

     //
     protected $fillable = ['production_id','user_id','quantity','employee_name','missing'];
    use SoftDeletes;

      public function production(){
    	return $this->belongsTo(Production::class);
    } 

      public function production_store(){
    	return $this->hasOne(Production_store::class);
    } 

   
}
