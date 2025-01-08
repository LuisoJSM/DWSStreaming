<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Elenco;


class ElencoController extends Controller
{




    public function adminElenco()
    {
        return view('elenco.elenco');
    }




    public function agregarElenco(Request $request)
    {

        // Primero, valido los datos enviados desde el formulario.
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_nacimiento' => 'required',
        ]);

        // Creo la película en la base de datos.
        $pelicula = Elenco::create([
            'nombre' => $validated['nombre'],
            'apellido' => $validated['apellido'],
            'fecha_nacimiento' => $validated['fecha_nacimiento'],
        ]);

        return redirect()->route('adminElenco')->with('success', 'Has añadido a la tabla Elenco.');
    }





}
