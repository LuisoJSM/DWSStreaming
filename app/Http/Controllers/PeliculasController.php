<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PeliculasController extends Controller
{
    
//Función para listar las películas
 public function listaPeliculas()
    {
        // Consultar los clientes desde la tabla "cliente"
        $peliculas = DB::table('peliculas')->get();

        // Retornar la vista 'lista-clientes' con los datos de los clientes
        return view('lista-peliculas', ['peliculas' => $peliculas]);
    }



}
