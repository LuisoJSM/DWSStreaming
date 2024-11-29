<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class  FrontEndController extends Controller
{

     //  vista 'index'
     public function index()
     {
         return view('index');
     }


    // vista 'catalogo'
    public function catalogo()
    {
        return view('catalogo');  // Esto cargará la vista resources/views/catalogo.blade.php
    }



// Función para leer los datos del JSON
    public function mostrarCatalogo()
{
    // Leer los datos del archivo JSON
    $filePath = storage_path('app/catalogos.json');
    $catalogos = file_exists($filePath) ? json_decode(file_get_contents($filePath), true) : [];

    //Se devuelve la vista
    return view('catalogo', compact('catalogos'));
}






}
