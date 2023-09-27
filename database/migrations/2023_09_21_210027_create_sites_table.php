<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('id_site');
            $table->string('nomdesite');
            $table->decimal('longitude');
            $table->decimal('latitude');
            $table->string('departement');
            $table->string('commune');
            $table->string('arrondissement');
            $table->string('quartier');
            $table->string('camouflage');
            $table->text('description');
            $table->string('numdossier');
            $table->date('date_soumission');
            $table->date('date_autorisation')->nullable();
            $table->string('proprietaire')->nullable();
            $table->string('autre_proprietaire')->nullable();
            $table->string('emplacement');
            $table->string('type');
            $table->string('statut');
            $table->string('ref_courrier')->nullable();
            $table->string('observation')->nullable();
            /* $table->string('valide'); */
            $table->string('sensible');
            $table->string('conforme');
            $table->string('autre_site');
            $table->string('dossier_camouflage')->nullable();
            $table->mediumText('image');
            $table->softDeletes();
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
        Schema::dropIfExists('sites');
    }
};
