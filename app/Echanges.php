<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Echanges extends Model
{
    protected $table = 'echanges';

    protected $fillable = ['id_client','id_vehicule','quantite','total'];

    public function user(){
        return $this->belongsTo('App\User','id_client','id');
    }

    public function vehicules(){
        return $this->belongsTo('App\Vehicules','id_vehicule','id');
    }
}
