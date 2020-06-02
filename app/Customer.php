<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Payment;
use App\Cunsultation;
use App\district;
use App\cell;
use App\sector;

class Customer extends Model
{
    //
    protected $fillable = ['names','sex','maritial_Status','occupation','district_id','sector_id','phone_no','dob'];
    use SoftDeletes;

     public function payment(){
    	return $this->belongsTo(Payment::class);
    } 

      public function district(){
    	return $this->belongsTo(district::class);
    } 

      public function sector(){
    	return $this->belongsTo(sector::class);
    } 

      public function cell(){
    	return $this->belongsTo(cell::class);
    } 

     public function cunsultation(){
    	return $this->belongsTo(Cunsultation::class);
    } 
}
