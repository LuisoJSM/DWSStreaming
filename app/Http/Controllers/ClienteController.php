<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function listaClientes()
    {
        // Consultar los clientes desde la tabla "cliente"
        $clientes = DB::table('clientes')->get();

        // Retornar la vista 'lista-clientes' con los datos de los clientes
        return view('lista-clientes', ['clientes' => $clientes]);
    }







}
