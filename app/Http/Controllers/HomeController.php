<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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



}
