<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;
use Illuminate\Support\Facades\Storage;
use App\Models\Cliente;


class AdminController extends Controller
{

    // Vista del formulario de Login en el nav login
    public function login()
    {
        return view('login');
    }



    public function adminLog()
    {
        return view('adminLog');
    }



    // Función para autenticar que als credenciales son correctas
    public function autenticar(Request $request)
    {
        // Recojo los datos del formulario de login en las variables
        $usuario = $request->input('usuario');
        $contrasena = $request->input('contrasena');

        //Si usuario y contrasena son correctas, entonces devuelve la vista de admin
        if ($usuario === 'admin' && $contrasena === '1234') {
            return redirect()->route('adminLog')->with('success', 'Inicio de sesión exitoso.');
        }

        //Si no son correctas, entonces redirige a la página de login con el mensaje de error
        return redirect()->route('login')->with('error', 'Credenciales incorrectas');
    }




   


    public function agregarCliente(Request $request)
    {

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
