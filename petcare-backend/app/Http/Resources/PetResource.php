<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'especie' => $this->especie,
            'raza' => $this->raza,
            'edad' => $this->edad,
            'sexo' => $this->sexo,
            'peso' => $this->peso,
            'fecha_nacimiento' => $this->fecha_nacimiento?->format('Y-m-d'),
            'chip' => $this->chip,
            'esterilizado' => $this->esterilizado,
            'vacunado' => $this->vacunado,
            'observaciones' => $this->observaciones,
        ];
    }
}
