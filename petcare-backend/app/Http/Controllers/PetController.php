<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function mostrarFormulario()
    {
        return view('form_pet');
    }

    public function enviar(Request $request)
    {
   
        $validacion = $request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'especie' => ['required', 'in:perro,gato,conejo,ave,roedor,reptil,otro'],
            'raza' => ['nullable', 'string', 'max:100'],
            'edad' => ['required', 'integer', 'min:0', 'max:50'],
            'sexo' => ['required', 'in:macho,hembra,desconocido'],
            'peso' => ['required', 'numeric', 'min:0.1', 'max:200'],
            'fecha_nacimiento' => ['nullable', 'date', 'before_or_equal:today'],
            'chip' => ['nullable','string','max:50','unique:pets,chip'],
            'esterilizado' => ['required', 'boolean'],
            'vacunado' => ['required', 'boolean'],
            'observaciones' => ['nullable', 'string', 'max:1000'],
        ], [
            'nombre.required' => 'El nombre de la mascota es obligatorio.',
            'especie.required' => 'Debe seleccionar una especie.',
            'edad.required' => 'La edad es obligatoria.',
            'peso.required' => 'El peso es obligatorio.',
            'sexo.required' => 'El sexo es obligatorio.',
            'esterilizado.required' => 'Debe indicar si está esterilizado.',
            'vacunado.required' => 'Debe indicar si está al día con las vacunas.',
        ]);

        // Persist the validated pet data
        Pet::create($validacion);

        return back()->with('mensaje', '¡Mascota registrada correctamente!');
    }

    public function mostrardatosPet()
    {
        $registros = Pet::all()->toArray();

        // Return the existing pets listing view and provide the expected
        // `registros` variable used by the template.
        return view('listado_mascotas', ['registros' => $registros]);
    }
}