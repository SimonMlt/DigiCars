<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Echanges extends Model
{
    protected $table = 'echanges';

    protected $fillable = ['id_client','id_vehicule','quantite','total'];
}
