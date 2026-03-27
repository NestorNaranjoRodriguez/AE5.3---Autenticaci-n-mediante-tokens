<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = [
        'nombre',
        'especie',
        'raza',
        'edad',
        'sexo',
        'peso',
        'fecha_nacimiento',
        'chip',
        'esterilizado',
        'vacunado',
        'observaciones',
    ];

    protected $casts = [
        'esterilizado' => 'boolean',
        'vacunado' => 'boolean',
        'fecha_nacimiento' => 'date',
    ];
}
