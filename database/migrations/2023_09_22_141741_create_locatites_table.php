<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Site;
use App\Models\Localite;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localites', function (Blueprint $table) {
            $table->id();
            $table->string('departement');
            $table->string('commune');
            $table->string('arrondissement');
            $table->string('quartier');
            $table->decimal('lat_dd');
            $table->decimal('long_dd');
            $table->timestamps();
        });

        Schema::table('sites',function (Blueprint $table){
            $table->foreignIdFor(Localite::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locatites');
        Schema::table('sites',function (Blueprint $table){
            $table->dropForeignIdFor(Localite::class);
        });
    }
};
