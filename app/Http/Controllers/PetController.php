<?php

namespace App\Http\Controllers;

use App\Services\PetService;
use App\Http\Requests\{GetPetByIdRequest};

class PetController extends Controller
{
    public function getPetById(GetPetByIdRequest $request, PetService $petApiService)
    {
        $validatedData = $request->validated();

        $response = $petApiService->getPetById($validatedData['id']);

        return $response;
    }
}
