<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePetRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string|max:100',
            'raza' => 'nullable|string|max:100',
            'edad' => 'required|integer|min:0',
            'sexo' => 'required|in:macho,hembra,desconocido',
            'peso' => 'nullable|numeric|min:0',
            'fecha_nacimiento' => 'nullable|date',
            'chip' => 'nullable|string|max:50',
            'esterilizado' => 'boolean',
            'vacunado' => 'boolean',
            'observaciones' => 'nullable|string',
        ];
    }
}
