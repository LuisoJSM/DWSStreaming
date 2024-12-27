<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;

    // Atributos que pueden ser asignados masivamente
    protected $fillable = [
        'titulo',
        'director_id', // Ahora usamos director_id en lugar de director
        'anio_estreno',
    ];

    // Relación con el modelo Director
    public function director()
    {
        return $this->belongsTo(Director::class, 'director_id');
    }
}
