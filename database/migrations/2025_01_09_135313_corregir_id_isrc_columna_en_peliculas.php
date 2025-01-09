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
        $table->dropForeign(['id_isrc']); // Elimina la clave foránea existente
        $table->dropColumn('id_isrc'); // Elimina la columna existente
        $table->string('id_isrc')->nullable(); // Vuelve a crearla como string
        $table->foreign('id_isrc')->references('isrc')->on('isrc')->onDelete('set null'); // Nueva clave foránea
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peliculas', function (Blueprint $table) {
            //
        });
    }
};
