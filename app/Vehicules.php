<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicules extends Model
{
    //
    protected $table = 'vehicules';

    protected $fillable = ['marque','modele','annee','energie','finition','bdv','ce','ci','puissancedin','puissancefiscale','portes','places'];

}
