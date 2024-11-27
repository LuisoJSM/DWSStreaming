<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class  FrontEndController extends Controller
{

     // Método para la vista 'index'
     public function index()
     {
         return view('index');  // Esto cargará la vista resources/views/index.blade.php
     }


    // Método para la vista 'catalogo'
    public function catalogo()
    {
        return view('catalogo');  // Esto cargará la vista resources/views/catalogo.blade.php
    }




    public function mostrarCatalogo()
{
    // Leer los datos del archivo JSON
    $filePath = storage_path('app/catalogos.json');
    $catalogos = file_exists($filePath) ? json_decode(file_get_contents($filePath), true) : [];

    return view('catalogo', compact('catalogos'));
}






}
