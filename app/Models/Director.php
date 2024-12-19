<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;


  // Especificamos el nombre correcto de la tabla en la base de datos
  protected $table = 'directores';  // Asegúrate de que esta es la tabla correcta en la base de datos.


    // Campos permitidos para asignación masiva
    protected $fillable = ['nombre', 'apellido'];

    // Relación: un director tiene muchas películas
    public function peliculas()
    {
        return $this->hasMany(Pelicula::class); // Relación uno a muchos
    }
}
