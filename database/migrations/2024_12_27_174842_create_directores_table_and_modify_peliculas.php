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
        // Crear la tabla `directores`
        Schema::create('directores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->timestamps();
        });

        // Modificar la tabla `peliculas`
        Schema::table('peliculas', function (Blueprint $table) {
            // Eliminar la columna `director`
            $table->dropColumn('director');

            // Añadir la columna `director_id` como clave foránea
            $table->unsignedBigInteger('director_id')->nullable()->after('titulo');
            $table->foreign('director_id')->references('id')->on('directores')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revertir los cambios en la tabla `peliculas`
        Schema::table('peliculas', function (Blueprint $table) {
            $table->dropForeign(['director_id']);
            $table->dropColumn('director_id');
            $table->string('director')->after('titulo'); // Restaurar la columna `director`
        });

        // Eliminar la tabla `directores`
        Schema::dropIfExists('directores');
    }
};
