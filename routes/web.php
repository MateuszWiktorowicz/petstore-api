<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pet', [PetController::class, 'getPetById'])->name('petstore.getPet');
Route::post('/pet', [PetController::class, 'createPet'])->name('petstore.createPet');
