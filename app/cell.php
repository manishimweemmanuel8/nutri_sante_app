<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customer;

class cell extends Model
{
    //
    protected $fillable = ['name','sector_id'];
     public function customer(){
    	return $this->hasOne(Customer::class);
    }
}
