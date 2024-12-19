<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;

    // Campos permitidos para asignación masiva
    protected $fillable = ['titulo', 'anio_estreno', 'director_id'];

    // Relación: una película pertenece a un director
    public function director()
    {
        return $this->belongsTo(Director::class); // Relación inversa (muchas películas pertenecen a un director)
    }
}
