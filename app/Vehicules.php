<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicules extends Model
{
    //
    protected $fillable = ['marque','modele','annee','energie','finition','bdv','ce','ci','puissancedin','puissancefiscale','portes','places'];

}
