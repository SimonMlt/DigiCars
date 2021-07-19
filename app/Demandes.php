<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demandes extends Model
{
    protected $table = 'demandes';

    protected $fillable = ['id_client','name','email','object','message','status','answer'];

}
