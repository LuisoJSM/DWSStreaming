<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgregarEventoRequest extends FormRequest
{
  
    /**
     * Reglas de validación del formulario
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
     * Mensajes de error en la validación del formulario del admin
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
