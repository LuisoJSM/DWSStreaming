<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcesarDatosRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para hacer esta solicitud.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Define las reglas de validación.
     */
    public function rules()
    {
        return [
            'usuario' => 'required|string|max:255',
            'clave' => 'required|string|max:255',
        ];
    }

    /**
     * Personaliza los mensajes de error.
     */
    public function messages()
    {
        return [
            'usuario.required' => 'El usuario es obligatorio.',
            'clave.required' => 'La clave es obligatoria.',
        ];
    }
}
