<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pelicula;

class PeliculasController extends Controller
{


    // Muestro paginad e iniciio
    public function adminPeliculas()
    {
        return view('peliculas.peliculas');
    }





    //Función para listar las películas
    public function listaPeliculas()
    {
        // Consultar las peliculas desde la tabla "cliente"
        $peliculas = DB::table('peliculas')->get();

        // Retornar la vista 'lista-peliculas' con los datos de las peliculas
        return view('peliculas.lista-peliculas', ['peliculas' => $peliculas]);
    }



    //Esta función me devuelve una lista de películas almacenadas en mi base de datos en la vista /admin/gestion-peliculas
    public function admin()
    {
        // Aquí recupero todas las películas que haya almacenadas
        $peliculas = Pelicula::all();
        return view('peliculas.peliculas', compact('peliculas'));
    }

    public function agregarPelicula(Request $request)
    {
        // Validar los datos enviados desde el formulario
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'nombre_director' => 'required|string|max:255',
            'apellido_director' => 'required|string|max:255',
            'anio_estreno' => 'required|integer|min:1800|max:' . date('Y'),
        ]);

        // Buscar o crear el director
        $director = \App\Models\Director::firstOrCreate(
            [
                'nombre' => $validated['nombre_director'],
                'apellido' => $validated['apellido_director']
            ]
        );

        // Crear la película en la base de datos, asociándola al director
        $pelicula = Pelicula::create([
            'titulo' => $validated['titulo'],
            'director_id' => $director->id,
            'anio_estreno' => $validated['anio_estreno'],
        ]);

        // Ruta del archivo JSON donde se almacenarán las películas
        $rutaJSON = storage_path('app/peliculas.json');

        // Leer y decodificar el contenido del archivo JSON si existe
        $peliculas = file_exists($rutaJSON) ? json_decode(file_get_contents($rutaJSON), true) : [];

        // Añadir la nueva película al array
        $peliculas[] = [
            'titulo' => $pelicula->titulo,
            'director' => $director->nombre . ' ' . $director->apellido,
            'anio_estreno' => $pelicula->anio_estreno,
            'fecha_ingreso' => now()->toDateTimeString(),
        ];

        // Escribir el array actualizado en el archivo JSON
        file_put_contents($rutaJSON, json_encode($peliculas, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        // Redirigir a la vista de admin con un mensaje de éxito
        return redirect()->route('adminPeliculas')->with('success', 'Has añadido una película.');
    }



    // //Función para añadir nuevas películas
    // public function agregarPelicula(Request $request)
    // {
    //     // Primero, valido los datos enviados desde el formulario.
    //     $validated = $request->validate([
    //         'titulo' => 'required|string|max:255',
    //         'director' => 'required|string|max:255',
    //         'anio_estreno' => 'required|integer|min:1800|max:' . date('Y'),
    //     ]);

    //     // Creo la película en la base de datos.
    //     $pelicula = Pelicula::create([
    //         'titulo' => $validated['titulo'],
    //         'director' => $validated['director'],
    //         'anio_estreno' => $validated['anio_estreno'],
    //     ]);

    //     // Ruta del archivo JSON donde se almacenarán las películas.
    //     $rutaJSON = storage_path('app/peliculas.json');

    //     // Si el archivo JSON existe, leo y decodifico su contenido.
    //     if (file_exists($rutaJSON)) {
    //         $peliculas = json_decode(file_get_contents($rutaJSON), true);
    //     } else {
    //         // Si no existe, inicializo un array vacío.
    //         $peliculas = [];
    //     }

    //     // Añadir la nueva película al array.
    //     $peliculas[] = [
    //         'titulo' => $pelicula->titulo,
    //         'director' => $pelicula->director,
    //         'anio_estreno' => $pelicula->anio_estreno,
    //         'fecha_ingreso' => now()->toDateTimeString(), // Añadir una fecha de ingreso si es necesario.
    //     ];

    //     // Escribo el array actualizado en el archivo JSON.
    //     file_put_contents($rutaJSON, json_encode($peliculas, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    //     // Redirijo a la vista de admin con un mensaje de éxito.
    //     return redirect()->route('adminPeliculas')->with('success', 'Has añadido una película.');
    // }
}
