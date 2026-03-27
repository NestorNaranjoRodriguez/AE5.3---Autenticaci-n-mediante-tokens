<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * Explicit table name because migration created `contact` (singular).
     *
     * @var string
     */
    protected $table = 'contact';

    protected $fillable = [
        'nombre',
        'apellidos',
        'correo',
        'direccion',
        'direccion_secundaria',
        'sexo',
        'telefono',
        'mensaje'
    ];
}