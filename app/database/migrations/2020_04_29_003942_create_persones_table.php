<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persones', function (Blueprint $table) {
            /*$table->id();
            $table->timestamps();
            
            */
            $table->string('FIC');
            $table->boolean('CIVILITE');
            $table->string('NOM');
            $table->string('PRENOM');
            $table->string('ADRESSE_1')->nullable();
            $table->string('ADRESSE_2')->nullable();
            $table->string('ADRESSE_3')->nullable();
            $table->string('CODE_POSTAL');
            $table->string('VILLE')->nullable();
            $table->string('NO_TEL')->nullable();
            $table->string('INDIC')->nullable();
            $table->string('EMAIL')->nullable();
            $table->string('DATE_NAISSANCE')->nullable();
            $table->string('PROVENANCE')->nullable();
            $table->boolean('STATUS')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persones');
    }
}
