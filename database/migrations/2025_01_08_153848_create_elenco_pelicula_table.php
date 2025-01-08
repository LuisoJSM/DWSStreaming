<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('elenco_pelicula', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_elenco');
            $table->unsignedBigInteger('id_pelicula');
            $table->timestamps();

            $table->foreign('id_pelicula')->references('id')->on('peliculas');
            $table->foreign('id_elenco')->references('id')->on('elenco');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elenco_pelicula');
    }
};
