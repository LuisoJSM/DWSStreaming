<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;
use App\Models\Director;

class FrontEndController extends Controller
{
    // Muestro paginad e iniciio
    public function inicio()
    {
        return view('inicio');
    }




    // //Aquí voy a leer las películas desde el JSON. En la de admin, lo hago desde la BBDD
    // public function catalogo()
    // {
    //     // Ruta del archivo JSON
    //     $rutaJson = storage_path('app/peliculas.json');

    //     // Verifico si el archivo existe
    //     if (file_exists($rutaJson)) {
    //         // Leo el contenido del JSON
    //         $contenidoJson = file_get_contents($rutaJson);

    //         // Decodifico el JSON en un array
    //         $peliculas = json_decode($contenidoJson, true); // El segundo parámetro 'true' convierte el JSON a un array asociativo
    //     } else {
    //         // Si no se encuentra el archivo JSON, asignamos un array vacío
    //         $peliculas = [];
    //     }

    //     // Devolver la vista con las películas leídas desde el archivo JSON
    //     return view('catalogo', compact('peliculas'));
    // }


 
    
    public function catalogo()
    {
        // Aquí recupero todas las películas que haya almacenadas
        $peliculas = Pelicula::all();
        return view('catalogo', compact('peliculas'));
    }



}
