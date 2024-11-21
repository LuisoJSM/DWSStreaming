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



    public function indexTopMenu() {
        return view('index');
    }


    // public function catalogoTopMenu() {
    //     return view('top_menu/catalogo');
    // }



    public function catalogoTopMenu() {
        $catalogo = array(
            array(
            'evento_nombre' => 'Carrera popular de San Silvestre',
            'evento_distancia' => 1000,
            'evento_fecha' => '31/12/2024',
            'evento_hora' => '10:00',
        ),
        $catalogo = array(
            'evento_nombre' => 'Barbudico Trail',
            'evento_distancia' => 1000,
            'evento_fecha' => '23/11/2024',
            'evento_hora' => '10:00',
        ),
        $catalogo = array(
            'evento_nombre' => 'Barbudo sky trail',
            'evento_distancia' => 20000,
            'evento_fecha' => '24/11/2024',
            'evento_hora' => '8:00',
        ));
        return view('top_menu/catalogo', compact('catalogo'));
    }




}
