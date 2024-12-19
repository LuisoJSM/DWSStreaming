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
        // Consultar los clientes desde la tabla "cliente"
        $peliculas = DB::table('peliculas')->get();

        // Retornar la vista 'lista-clientes' con los datos de los clientes
        return view('lista-peliculas', ['peliculas' => $peliculas]);
    }



    //Esta función me devuelve una lista de películas almacenadas en mi base de datos en la vista /admin/gestion-peliculas
    public function admin()
    {
        // Aquí recupero todas las películas que haya almacenadas
        $peliculas = Pelicula::all();
        return view('peliculas.peliculas', compact('peliculas'));
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
        return redirect()->route('adminPeliculas')->with('success', 'Has añadido una película.');
    }
}
