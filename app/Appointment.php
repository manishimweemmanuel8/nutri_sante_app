<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    //
    protected $fillable = ['customer','user_id','date','phone','time'];
    use SoftDeletes;
}
