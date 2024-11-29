<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgregarEventoRequest;
use App\Http\Requests\ProcesarDatosRequest;
use Illuminate\Http\Request;

class BackEndController extends Controller
{
    /**
     * Muestro la página de administración con los catálogos cargados desde un  JSON.
     */
    public function mostrarAdmin()
    {
        // Lee los datos del archivo JSON
        $filePath = storage_path('app/catalogos.json');
        $catalogos = file_exists($filePath) ? json_decode(file_get_contents($filePath), true) : [];

        return view('admin', compact('catalogos'));
    }

    /**
     * Agrega una peli al catálogo, validando los datos a través de la clase AgregarEventoRequest.
     */
    public function agregarEventoCatalogo(AgregarEventoRequest $request)
    {
       
        $validatedData = $request->validated();

        // Esta es la ruta del archivo JSON
        $filePath = storage_path('app/catalogos.json');

        // Lee el contenido que tiene dentro el JSON
        $catalogos = file_exists($filePath) ? json_decode(file_get_contents($filePath), true) : [];

        // Añadimos la nueva película al array
        $catalogos[] = $validatedData;

        // Guardamos el array ya actualizado en el archivo JSON
        file_put_contents($filePath, json_encode($catalogos, JSON_PRETTY_PRINT));

        // Redirige a la página de admin con un mensaje de éxito
        return redirect()->route('mostrarAdmin')->with('success', 'Película añadido con éxito.');
    }

    /**
     * Función para procesar datos formulario de inicio de sesión del administrador, validándolos con ProcesarDatosRequest.
     */
    public function procesarDatos(ProcesarDatosRequest $request)
    {
      
        $validated = $request->validated();

        // Compruebo si el usuario y la clave son correctos
        if ($validated['usuario'] === 'admin' && $validated['clave'] === '1234') {
            // De ser así, se redirige a la página de administración usando el nombre de la ruta
            return redirect()->route('mostrarAdmin')->with('mensaje', 'Bienvenido, administrador');
        }

        // Si no son correctos, redirige de vuelta a la página principal con un mensaje de error
        return redirect('/')->withErrors(['error' => 'Clave o usuario incorrecto']);
    }
}
