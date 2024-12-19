<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula; // Importar el modelo Pelicula
use App\Models\Director; // Importar el modelo Director
use Illuminate\Support\Facades\DB;

class PeliculasController extends Controller
{
    /**
     * Mostrar el formulario para agregar una película.
     */
    public function mostrarFormularioAgregarPelicula()
    {
        // Obtener todos los directores para mostrarlos en un selector.
        $directores = Director::all();

        // Retornar la vista con el formulario y los datos de los directores.
        return view('agregar-pelicula', ['directores' => $directores]);
    }

    /**
     * Procesar el formulario para agregar una película.
     */
    public function agregarPelicula(Request $request)
    {
        // Validar los datos del formulario.
        $request->validate([
            'titulo' => 'required|string|max:255',
            'anio_estreno' => 'required|integer|min:1800|max:' . date('Y'),
            'director_nombre' => 'required|string|max:255',
            'director_apellido' => 'required|string|max:255',
        ]);

        // Buscar el director por nombre y apellido.
        $director = Director::where('nombre', $request->director_nombre)
            ->where('apellido', $request->director_apellido)
            ->first();

        // Si no existe el director, devolver un mensaje de error.
        if (!$director) {
            return redirect()
                ->back()
                ->withErrors(['director' => 'El director no existe en la base de datos.'])
                ->withInput();
        }

        // Crear una nueva película vinculada al director encontrado.
        Pelicula::create([
            'titulo' => $request->titulo,
            'anio_estreno' => $request->anio_estreno,
            'director_id' => $director->id, // Asignar la relación por ID.
        ]);

        // Redirigir con un mensaje de éxito.
        return redirect()
            ->route('listaPeliculas')
            ->with('success', 'Película agregada exitosamente.');
    }

    /**
     * Mostrar la lista de películas con sus directores.
     */
    public function listaPeliculas()
    {
        // Obtener todas las películas con sus directores usando Eloquent.
        $peliculas = Pelicula::with('director')->get();

        // Retornar la vista con las películas y sus directores.
        return view('lista-peliculas', ['peliculas' => $peliculas]);
    }
}
