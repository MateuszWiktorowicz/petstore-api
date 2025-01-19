<?php

namespace App\Services;

class PetService
{
    protected $baseUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->baseUrl = config('services.petstore.url');
        $this->apiKey = env('API_KEY');
    }
}
