<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgregarEventoRequest;
use App\Http\Requests\ProcesarDatosRequest;
use Illuminate\Http\Request;

class BackEndController extends Controller
{
    /**
     * Muestra la página de administración con los catálogos cargados desde un archivo JSON.
     */
    public function mostrarAdmin()
    {
        // Leer los datos del archivo JSON
        $filePath = storage_path('app/catalogos.json');
        $catalogos = file_exists($filePath) ? json_decode(file_get_contents($filePath), true) : [];

        return view('admin', compact('catalogos'));
    }

    /**
     * Agrega un evento al catálogo, validando los datos a través de la clase AgregarEventoRequest.
     */
    public function agregarEventoCatalogo(AgregarEventoRequest $request)
    {
        // Laravel ya ha validado los datos con AgregarEventoRequest
        $validatedData = $request->validated();

        // Ruta del archivo JSON
        $filePath = storage_path('app/catalogos.json');

        // Leer el contenido actual del JSON
        $catalogos = file_exists($filePath) ? json_decode(file_get_contents($filePath), true) : [];

        // Añadir el nuevo evento al array
        $catalogos[] = $validatedData;

        // Guardar el array actualizado en el archivo JSON
        file_put_contents($filePath, json_encode($catalogos, JSON_PRETTY_PRINT));

        // Redirigir a la página de admin con un mensaje de éxito
        return redirect()->route('mostrarAdmin')->with('success', 'Evento añadido con éxito.');
    }

    /**
     * Procesa los datos del formulario de inicio de sesión del administrador, validándolos con ProcesarDatosRequest.
     */
    public function procesarDatos(ProcesarDatosRequest $request)
    {
        // Laravel ya ha validado los datos con ProcesarDatosRequest
        $validated = $request->validated();

        // Comprobar si el usuario y la clave son correctos
        if ($validated['usuario'] === 'admin' && $validated['clave'] === '1234') {
            // Redirigir a la página de administración usando el nombre de la ruta
            return redirect()->route('mostrarAdmin')->with('mensaje', 'Bienvenido, administrador');
        }

        // Si no son correctos, redirigir de vuelta a la página principal con un mensaje de error
        return redirect('/')->withErrors(['error' => 'Clave o usuario incorrecto']);
    }
}
