<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicules extends Model
{
    //
    protected $table = 'vehicules';

    protected $fillable = ['filename','marque','modele','annee','energie','bdv','ce','ci','puissancedin','puissancefiscale','portes','places','prix','description','option1','option2','option3','option4'];

}
