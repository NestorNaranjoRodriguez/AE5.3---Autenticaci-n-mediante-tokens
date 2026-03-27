<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
   
    public function mostrarFormulario()
    {
        return view('form_contact');
    }

   
    public function enviar(Request $request)
    {
        $validacion = $request->validate([
            'nombre' => [
                'required',
                'string',
                'max:50',
                'regex:/^[^0-9]+$/',
            ],
            'apellidos' => [
                'required',
                'string',
                'max:50',
                'regex:/^[^0-9]+$/',
            ],
            'correo' => ['required', 'email'],
            'direccion' => [
                'required',
                'string',
                'max:50',
            ],
            'direccion_secundaria' => ['nullable', 'string', 'max:50'],
            'sexo' => ['required', 'in:hombre,mujer'],
            'telefono' => ['required', 'regex:/^[0-9]{9}$/'],
            'mensaje' => ['required', 'string'],
        ], [
            'nombre.regex' => 'El nombre no puede contener números.',
            'nombre.required' => 'Escriba un nombre, por favor.',
            'nombre.max' => 'No escriba más de 50 caracteres en el nombre.',

            'apellidos.regex' => 'Los apellidos no pueden contener números.',
            'apellidos.required' => 'Escriba los apellidos, por favor.',
            'apellidos.max' => 'No escriba más de 50 caracteres en los apellidos.',

            'correo.required' => 'Escriba un correo electrónico, por favor.',
            'correo.email' => 'Escriba un correo válido, por favor.',

            'direccion.required' => 'Escriba una dirección, por favor.',
            'direccion.max' => 'La dirección no puede tener más de 50 caracteres.',

            'sexo.required' => 'Seleccione un sexo, por favor.',
            'sexo.in' => 'El valor del campo sexo no es válido.',

            'telefono.required' => 'Escriba un número de teléfono, por favor.',
            'telefono.regex' => 'El teléfono debe tener exactamente 9 dígitos.',

            'mensaje.required' => 'Escriba un mensaje, por favor.',
        ]);

        // Prepare data and include optional secondary address if present
        $data = $validacion;
        $data['direccion_secundaria'] = $request->input('direccion_secundaria');

        // Persist the contact
        Contact::create($data);

        return back()->with('mensaje', '¡Gracias por contactarnos! Te responderemos pronto.');
    }

    
     public function mostrardatosContact()
    {
        $registros = Contact::all()->toArray();

        // Use the existing `listado_contactos` view which expects a
        // `$registros` array to render the contacts list.
        return view('listado_contactos', ['registros' => $registros]);
    }
}
