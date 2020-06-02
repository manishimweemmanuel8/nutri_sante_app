<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\AfterPreparation;

class Production extends Model
{
    //

    protected $fillable = ['after_preparation_id','user_id','quantity','employee_name'];
    use SoftDeletes;

      public function afterPreparation(){
    	return $this->belongsTo(AfterPreparation::class);
    } 

      public function afterProduction(){
    	return $this->hasOne(AfterProduction::class);
    } 
}
