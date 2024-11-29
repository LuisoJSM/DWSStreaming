<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcesarDatosRequest extends FormRequest
{
   
    /**
     * Reglas de validación del formulario
     */
    public function rules()
    {
        return [
            'usuario' => 'required|string|max:255',
            'clave' => 'required|string|max:255',
        ];
    }

    /**
     * Personaliza los mensajes de error si no validan bien
     * 
     */
    public function messages()
    {
        return [
            'usuario.required' => 'El usuario es obligatorio.',
            'clave.required' => 'La clave es obligatoria.',
        ];
    }
}
