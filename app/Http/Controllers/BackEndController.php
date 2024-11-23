<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackEndController extends Controller
{
    public function mostrarAdmin()
    {
        // Leer los datos del archivo JSON
        $filePath = storage_path('app/catalogos.json');
        $catalogos = file_exists($filePath) ? json_decode(file_get_contents($filePath), true) : [];

        return view('admin', compact('catalogos'));
    }

    public function agregarEventoCatalogo(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'Titulo' => 'required|string|max:255',
            'estreno' => 'required|integer',
            'director' => 'required|string|max:255',
        ]);

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


    //Funcion para procesar los datos de inicio de sesión del admin

    public function procesarDatos(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'usuario' => 'required|string|max:255',
            'clave' => 'required|string|max:255',
        ]);

        // Comprobar si el usuario y la clave son correctos
        if ($validated['usuario'] === 'admin' && $validated['clave'] === '1234') {
            // Redirigir a la página de administración usando el nombre de la ruta
            return redirect()->route('mostrarAdmin')->with('mensaje', 'Bienvenido, administrador');
        }

        // Si no son correctos, redirigir de vuelta a la página principal con un mensaje de error
        return redirect('/')->withErrors(['error' => 'Clave o usuario incorrecto']);
    }
}
