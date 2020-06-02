<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Payment;

class Payment extends Model
{
    //
    protected $fillable = ['customer_id','user_id','amount'];
    use SoftDeletes;

    public function customer(){
    	return $this->belongsTo(Customer::class);
    }
}

