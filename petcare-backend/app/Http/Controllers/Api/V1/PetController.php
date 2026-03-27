<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use App\Http\Resources\PetResource;
use App\Http\Requests\StorePetRequest;
use App\Http\Requests\UpdatePetRequest;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::all();
        return PetResource::collection($pets);
    }

    public function show(Pet $pet)
    {
        return new PetResource($pet);
    }

    public function store(StorePetRequest $request)
    {
        $pet = Pet::create($request->validated());

        return response()->json([
            'message' => 'Mascota creada correctamente',
            'data' => new PetResource($pet)
        ], 201);
    }

    public function update(UpdatePetRequest $request, Pet $pet)
    {
        $pet->update($request->validated());

        return response()->json([
            'message' => 'Mascota actualizada correctamente',
            'data' => new PetResource($pet)
        ], 200);
    }

    public function destroy(Pet $pet)
    {
        $pet->delete();

        return response()->json([
            'message' => 'Mascota eliminada correctamente'
        ], 200);
    }
}
