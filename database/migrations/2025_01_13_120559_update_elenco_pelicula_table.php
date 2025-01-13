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
        Schema::table('elenco_pelicula', function (Blueprint $table) {
            // Añadir un índice único para evitar duplicados
            $table->unique(['id_elenco', 'id_pelicula']);

            // Actualizar claves foráneas (si es necesario)
            $table->dropForeign(['id_elenco']);
            $table->dropForeign(['id_pelicula']);

            $table->foreign('id_elenco')
                ->references('id')
                ->on('elenco')
                ->onDelete('cascade');

            $table->foreign('id_pelicula')
                ->references('id')
                ->on('peliculas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('elenco_pelicula', function (Blueprint $table) {
            // Revertir los cambios si es necesario
            $table->dropUnique(['id_elenco', 'id_pelicula']);
            $table->dropForeign(['id_elenco']);
            $table->dropForeign(['id_pelicula']);
        });
    }
};
