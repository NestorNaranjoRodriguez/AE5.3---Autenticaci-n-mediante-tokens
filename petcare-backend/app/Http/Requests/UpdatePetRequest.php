<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePetRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'sometimes|required|string|max:255',
            'especie' => 'sometimes|required|string|max:100',
            'raza' => 'nullable|string|max:100',
            'edad' => 'sometimes|required|integer|min:0',
            'sexo' => 'sometimes|required|in:Macho,Hembra',
            'peso' => 'nullable|numeric|min:0',
            'fecha_nacimiento' => 'nullable|date',
            'chip' => 'nullable|string|max:50',
            'esterilizado' => 'boolean',
            'vacunado' => 'boolean',
            'observaciones' => 'nullable|string',
        ];
    }
}
