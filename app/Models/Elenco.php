<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elenco extends Model
{

    use HasFactory;

    protected $table = 'elenco';

    // Modelo Elenco con sus correspondientes atributos
    protected $fillable = [
        'nombre',
        'apellido',
        'fecha_nacimiento',
    ];

public function peliculas()
{
    return $this->belongsToMany(Pelicula::class, 'elenco_pelicula', 'id_elenco', 'id_pelicula');
}




}
