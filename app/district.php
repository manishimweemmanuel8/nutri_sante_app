<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customer;

class district extends Model
{
    //
    protected $fillable = ['name'];

     public function customer(){
    	return $this->hasOne(Customer::class);
    }
}
