<?php

namespace App\Services;

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
}
