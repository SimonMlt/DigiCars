<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('filename');
            $table->string('marque');
            $table->string('modele');
            $table->integer('annee');
            $table->string('energie');
            $table->string('bdv');
            $table->string('ce');
            $table->string('ci');
            $table->integer('puissancedin');
            $table->integer('puissancefiscale');
            $table->integer('portes');
            $table->integer('places');
            $table->integer('prix');
            $table->text('description');
            $table->string('option1')->nullable();
            $table->string('option2')->nullable();
            $table->string('option3')->nullable();
            $table->string('option4')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicules');
    }
}
