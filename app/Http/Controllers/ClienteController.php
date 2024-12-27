<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cliente;
class ClienteController extends Controller
{


//Función que devuelve la vista de administración de los CLIENTES
public function adminClientes(){

    return view ('clientes.clientes');
}



    public function listaClientes()
    {
        // Consultar los clientes desde la tabla "cliente"
        $clientes = DB::table('clientes')->get();

        // Retornar la vista 'lista-clientes' con los datos de los clientes
        return view('clientes.lista-clientes', ['clientes' => $clientes]);
    }





     //Función para añadir nuevos clientes
     public function agregarCliente(Request $request)
     {
         // Primero, valido los datos enviados desde el formulario.
         $validated = $request->validate([
             'nombre' => 'required|string|max:255',
             'apellidos' => 'required|string|max:255',
             'edad' => 'required|integer|max:110',
         ]);
 
         // Creo la película en la base de datos.
         $cliente = CLiente::create([
             'nombre' => $validated['nombre'],
             'apellidos' => $validated['apellidos'],
             'edad' => $validated['edad'],
         ]);
 
       
 
         // Redirijo a la vista de admin con un mensaje de éxito.
         return redirect()->route('adminClientes')->with('success', 'Has añadido un nuevo Cliente.');
     }
 }
 

