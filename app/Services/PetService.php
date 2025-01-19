<?php

namespace App\Services;

use App\Models\Pet;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Support\Facades\Http;

class PetService
{
    protected $baseUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->baseUrl = config('services.petstore.url');
        $this->apiKey = env('API_KEY');
    }

    public function getPetById(string $petId)
    {
        $response = Http::get("{$this->baseUrl}/pet/{$petId}");

        $responseData = $response->json();

        if ($response->successful()) {
            return $responseData;
        }

        return response()->json([
            'success' => false,
            'message' => $response->status() === 404 ? 'Pet not found' : 'Error fetching pet data',
            'error_code' => $response->status(),
            'error_details' => $responseData ?? null,
        ], $response->status());
    }

    public function createPet(array $petData)
    {
        $pet = $this->processPetData($petData);
        $response = Http::post("{$this->baseUrl}/pet", $pet);

        $responseData = $response->json();

        if ($response->successful()) {
            return $responseData;
        }

        return response()->json([
            'success' => false,
            'message' => $response->status() === 404 ? 'Pet not found' : 'Error fetching pet data',
            'error_code' => $response->status(),
            'error_details' => $responseData ?? null,
        ], $response->status());
    }

    public function deletePet(string $petId)
    {
        $response = Http::withHeaders([
            'api_key' => $this->apiKey,
        ])->delete("https://petstore.swagger.io/v2/pet/{$petId}");

        $responseData = $response->json();

        if ($response->successful()) {
            $responseData['message'] = "Pet deleted: ID - {$petId}";

            return response()->json($responseData, 200);
        }

        return response()->json([
            'success' => false,
            'message' => $response->status() === 404 ? 'Pet not found' : 'Error fetching pet data',
            'error_code' => $response->status(),
            'error_details' => $responseData ?? null,
        ], $response->status());
    }

    public function updatePetData(array $petData)
    {
        $pet = $this->processPetData($petData);

        $response = Http::put("https://petstore.swagger.io/v2/pet", $pet);

        $responseData = $response->json();

        if ($response->successful()) {
            $responseData['message'] = "Pet Data changed: ID - {$pet['id']}";

            return response()->json($responseData, 200);
        }

        return response()->json([
            'success' => false,
            'message' => $response->status() === 404 ? 'Pet not found' : 'Error fetching pet data',
            'error_code' => $response->status(),
            'error_details' => $responseData ?? null,
        ], $response->status());
    }

    public function uploadImage(array $data)
    {
        $petId = $data['id'];
        $file = $data['file'];
        $additionalMetadata = $data['additionalMetadata'] ?? '';
        $filePath = $file->getRealPath();
        $fileName = $file->getClientOriginalName();

        $petResponse = $this->getPetById($petId);


        if ($petResponse instanceof \Illuminate\Http\JsonResponse) {
            $petResponseData = $petResponse->getData(true);
            if (isset($petResponseData['success']) && !$petResponseData['success']) {
                return response()->json([
                    'success' => false,
                    'message' => 'Pet not found. Cannot add image.',
                    'error_code' => 404,
                ], 404);
            }
        }

        $response = Http::attach(
            'file',
            file_get_contents($filePath),
            $fileName
        )->post("https://petstore.swagger.io/v2/pet/{$petId}/uploadImage", [
            'additionalMetadata' => $additionalMetadata,
        ]);

        $responseData = $response->json();

        if ($response->successful()) {
            $responseData['message'] = "Image has been added: ID - {$petId}";

            return response()->json($responseData, 200);
        }

        return response()->json([
            'success' => false,
            'message' => $response->status() === 404 ? 'Pet not found' : 'Error fetching pet data',
            'error_code' => $response->status(),
            'error_details' => $responseData ?? null,
        ], $response->status());
    }

    private function processPetData(array $data)
    {
        $name = $data['name'];
        $categoryName = $data['category'];
        $photoUrls = $data['photoUrls'];
        $tags = $data['tags'];
        $status = $data['status'];

        $category = new Category([
            'id' => 1,
            'name' => $categoryName,
        ]);

        $photoUrlsArray = explode(';', $photoUrls);
        $photoUrlsArray = array_map('trim', $photoUrlsArray);


        $tagsArray = explode(';', $tags);
        $tagsArray = array_map('trim', $tagsArray);

        $tagObjects = [];
        $index = 1;
        foreach ($tagsArray as $tag) {
            $tagObjects[] = new Tag([
                'id' => $index++,
                'name' => $tag,
            ]);
        }
        $pet = new Pet([
            'name' => $name,
            'status' => $status,
            'photoUrls' => $photoUrlsArray,  // Zakładając, że `photoUrls` to pole w tabeli `pets`
            'category' => $category,
            'tags' => $tagObjects,
        ]);

        if (isset($data['id']) && !empty($data['id'])) {
            $pet['id'] = $data['id'];
        }

        return $pet;
    }
}
