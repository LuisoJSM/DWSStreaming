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
        Schema::table('peliculas', function (Blueprint $table) {
            // Añadir la columna id_isrc que será una clave foránea
            $table->unsignedBigInteger('id_isrc')->nullable();

            // Definir la relación de clave foránea con la tabla 'isrc'
            $table->foreign('id_isrc')->references('id')->on('isrc')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peliculas', function (Blueprint $table) {
            // Eliminar la clave foránea
            $table->dropForeign(['id_isrc']);
            // Eliminar la columna id_isrc
            $table->dropColumn('id_isrc');
        });
    }
};
