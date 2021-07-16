<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    protected $table = 'reservation';

    protected $fillable = ['account_id','name','email','motif','date','timeslot'];
}
