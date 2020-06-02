<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use App\Customer;

class sector extends Model
{
    //
    protected $fillable = ['name','district_id'];
     public function customer(){
    	return $this->hasOne(Customer::class);
    }
}
