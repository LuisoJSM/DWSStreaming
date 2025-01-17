<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Elenco;
use Illuminate\Support\Facades\DB;
use App\Models\Pelicula;



class ElencoController extends Controller
{




    public function adminElenco()
    {
        
        //Mando todas las peliculas a la vista
        $peliculas = Pelicula::all();

        //Devuelvo vista de elenco, formulario9, con todas las peliculas mandadas con compact
        return view('elenco.elenco', compact('peliculas'));

    }




    public function agregarElenco(Request $request)
    {
        // Validar los datos enviados desde el formulario
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'pelicula' => 'required|exists:peliculas,id',
        ]);
    
        // Buscar si ya existe el actor/actriz en la base de datos
        $elenco = Elenco::where('nombre', $validated['nombre'])
            ->where('apellido', $validated['apellido'])
            ->where('fecha_nacimiento', $validated['fecha_nacimiento'])
            ->first();
    
        if (!$elenco) {
            // Si no existe, creamos un nuevo registro en la tabla elenco
            $elenco = Elenco::create([
                'nombre' => $validated['nombre'],
                'apellido' => $validated['apellido'],
                'fecha_nacimiento' => $validated['fecha_nacimiento'],
            ]);
        }
    
        // Registrar la relación en la tabla intermedia elenco_pelicula
        DB::table('elenco_pelicula')->updateOrInsert(
            [
                'id_elenco' => $elenco->id,
                'id_pelicula' => $validated['pelicula'],
            ]
        );
    
        // Redirigir con un mensaje de éxito
        return redirect()->route('adminElenco')->with('success', 'El actor/actriz y su relación con la película se han guardado correctamente.');
    }
    


    //ESTO ES NUEVO

    public function listaElenco()
    {
        // Recupero todos los directores con paginación
        $elenco = Elenco::paginate(10);

        // Devuelvo la vista 'lista-directores' con los directores
        return view('elenco.lista-elenco', [
            'elenco' => $elenco
        ]);
    }






    public function mostrarAgregarElencoFormulario()
    {
        // Obtener todas las películas de la base de datos
        $peliculas = Pelicula::all();
    
        // Pasar las películas a la vista
        return view('admin.agregar_elenco', compact('peliculas'));
    }
    


    public function mostrarPeliculasElenco($id)
    {
        // Buscar al elenco por su ID
        $elenco = Elenco::findOrFail($id);
        // dd($elenco);
        // dd($elenco->peliculas()->toSql());

        // Obtener las películas asociadas con paginación
        $peliculas = $elenco->peliculas()->paginate(5);
        // dd(vars: $peliculas);
        // dd($elenco->peliculas()->toSql());

        // Retornar la vista con el elenco y las películas
        return view('elenco.lista-elenco-peliculas', [
            'elenco' => $elenco,
            'peliculas' => $peliculas
        ]);
    }
    

   


}
