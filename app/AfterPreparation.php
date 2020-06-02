<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Preparation;
use App\Production;

class AfterPreparation extends Model
{
    //
     protected $fillable = ['preparation_id','user_id','quantity','employee_name','missing'];
    use SoftDeletes;

      public function preparation(){
    	return $this->belongsTo(Preparation::class);
    } 

        public function production(){
    	return $this->hasOne(Production::class);
    } 
}
