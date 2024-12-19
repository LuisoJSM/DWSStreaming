<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePeliculasTable extends Migration
{
    public function up()
    {
        Schema::table('peliculas', function (Blueprint $table) {
            // Elimina la columna 'director'
            $table->dropColumn('director');
            // Agrega la columna 'director_id' como clave foránea
            $table->unsignedBigInteger('director_id')->nullable();
            $table->foreign('director_id')->references('id')->on('directors')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('peliculas', function (Blueprint $table) {
            // Restaurar la columna 'director'
            $table->string('director')->nullable();
            // Elimina la clave foránea y la columna 'director_id'
            $table->dropForeign(['director_id']);
            $table->dropColumn('director_id');
        });
    }
}
