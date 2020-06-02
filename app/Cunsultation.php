<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Customer;

class Cunsultation extends Model
{
    //
    protected $fillable = ['customer_id','user_id','bmi','blood_type','weight','height','ct_munda','ct_ukuboko','diagnosis','associated_deseases','reason','food_to_eat','food_to_reduce','foot_to_avoid','bad_nutritional_att','medication','taget'];
    use SoftDeletes;

     public function customer(){
    	return $this->belongsTo(Customer::class);
    }

}
