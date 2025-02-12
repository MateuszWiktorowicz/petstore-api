<?php

namespace App\Http\Controllers;

use App\Services\PetService;
use App\Http\Requests\{
    GetPetByIdRequest,
    CreatePetRequest,
    DeletePetRequest,
    UpdatePetRequest,
    UploadImageRequest
};

class PetController extends Controller
{
    public function getPetById(GetPetByIdRequest $request, PetService $petService)
    {
        $validatedData = $request->validated();

        $response = $petService->getPetById($validatedData['id']);

        return $response;
    }

    public function createPet(CreatePetRequest $request, PetService $petService)
    {
        $validatedData = $request->validated();

        $response = $petService->createPet($validatedData);

        return $response;
    }

    public function deletePet(DeletePetRequest $request, PetService $petService)
    {
        $validatedData = $request->validated();

        $response = $petService->deletePet($validatedData['id']);

        return $response;
    }

    public function updatePet(UpdatePetRequest $request, PetService $petService)
    {
        $validatedData = $request->validated();

        $response = $petService->updatePetData($validatedData);

        return $response;
    }

    public function uploadImage(UploadImageRequest $request, PetService $petService)
    {
        $validated = $request->validated();

        $response = $petService->uploadImage($validated);

        return $response;
    }
}
