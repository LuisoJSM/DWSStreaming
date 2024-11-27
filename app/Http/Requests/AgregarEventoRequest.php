<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgregarEventoRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para hacer esta solicitud.
     */
    public function authorize()
    {
        return true; // Cambiar a false si quieres restringir el acceso.
    }

    /**
     * Define las reglas de validación.
     */
    public function rules()
    {
        return [
            'Titulo' => 'required|string|max:255',
            'estreno' => 'required|integer',
            'director' => 'required|string|max:255',
        ];
    }

    /**
     * Personaliza los mensajes de error.
     */
    public function messages()
    {
        return [
            'Titulo.required' => 'El título es obligatorio.',
            'estreno.required' => 'El año de estreno es obligatorio.',
            'director.required' => 'El nombre del director es obligatorio.',
        ];
    }
}
