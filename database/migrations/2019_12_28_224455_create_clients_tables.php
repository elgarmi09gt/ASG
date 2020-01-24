<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Prenom');
            $table->string('Nom');
            $table->string('CNI');
            $table->string('NumCentre');
            $table->unsignedInteger('EtatDedomagement');
            $table->unsignedDecimal('MontantDemande',10,2);
            $table->unsignedDecimal('MontantRecu',10,2);
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
        Schema::dropIfExists('clients');
    }
}
