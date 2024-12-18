<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;
use Illuminate\Support\Facades\Storage;
use App\Models\Cliente;


class AdminController extends Controller
{

    // Vista del formulario de Login en el navlogin
    public function login()
    {
        return view('login');
    }

    // Función para autenticar que als credenciales son correctas
    public function autenticar(Request $request)
    {
        // Recojo los datos del formulario de login en las variables
        $usuario = $request->input('usuario');
        $contrasena = $request->input('contrasena');

        //Si usuario y contrasena son correctas, entonces devuelve la vista de admin
        if ($usuario === 'admin' && $contrasena === '1234') {
            return redirect()->route('admin');
        }

        //Si no son correctas, entonces redirige a la página de login con el mensaje de error
        return redirect()->route('login')->with('error', 'Credenciales incorrectas');
    }

    // Vista de la página de admin
    public function admin()
    {
        // Aquí recupero todas las películas que haya almacenadas
        $peliculas = Pelicula::all();
        return view('admin', compact('peliculas'));
    }


    //Función para añadir nuevas películas
    public function agregarPelicula(Request $request)
    {
        // Primero, valido los datos enviados desde el formulario.
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'anio_estreno' => 'required|integer|min:1800|max:' . date('Y'),
        ]);

        // Creo la película en la base de datos.
        $pelicula = Pelicula::create([
            'titulo' => $validated['titulo'],
            'director' => $validated['director'],
            'anio_estreno' => $validated['anio_estreno'],
        ]);

        // Ruta del archivo JSON donde se almacenarán las películas.
        $rutaJSON = storage_path('app/peliculas.json');

        // Si el archivo JSON existe, leo y decodifico su contenido.
        if (file_exists($rutaJSON)) {
            $peliculas = json_decode(file_get_contents($rutaJSON), true);
        } else {
            // Si no existe, inicializo un array vacío.
            $peliculas = [];
        }

        // Añadir la nueva película al array.
        $peliculas[] = [
            'titulo' => $pelicula->titulo,
            'director' => $pelicula->director,
            'anio_estreno' => $pelicula->anio_estreno,
            'fecha_ingreso' => now()->toDateTimeString(), // Añadir una fecha de ingreso si es necesario.
        ];

        // Escribo el array actualizado en el archivo JSON.
        file_put_contents($rutaJSON, json_encode($peliculas, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        // Redirijo a la vista de admin con un mensaje de éxito.
        return redirect()->route('admin')->with('success', 'Has añadido una película.');
    }


    public function agregarCliente (Request $request){

        // Primero, valido los datos enviados desde el formulario.
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'edad' => 'required|integer|min:0|max:100',
        ]);

        // Creo la película en la base de datos.
        $pelicula = Cliente::create([
            'nombre' => $validated['nombre'],
            'apellido' => $validated['apellido'],
            'edad' => $validated['edad'],
        ]);

        return redirect()->route('admin')->with('success', 'Has añadido un cliente.');


    }




}
