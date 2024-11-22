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



   


    public function escribirCatalogo() {
        $catalogos = array(
            array(
                'Titulo' => 'Carrera popular de San Silvestre',
                'estreno' => 1000,
                'director' => '31/12/2024',
                
            ),
            array(
                'Titulo' => 'Carrera pop77765g Silvestre',
                'estreno' => 2233,
                'director' => '31/12/2024',
            ),
            array(
                'Titulo' => 'Carrezxczxzcn Silvestre',
                'estreno' => 34,
                'director' => 'xzc4',
            ),
        );
    
        return view('catalogo', compact('catalogos')); // Asegúrate de que la vista se llame correctamente
    }
    



}
