<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pet', [PetController::class, 'getPetById'])->name('petstore.getPet');
Route::post('/pet', [PetController::class, 'createPet'])->name('petstore.createPet');
Route::delete('/pet', [PetController::class, 'deletePet'])->name('petstore.deletePet');
Route::put('/pet', [PetController::class, 'updatePet'])->name('petstore.updatePet');
Route::post('/pet/upload', [PetController::class, 'uploadImage'])->name('petstore.uploadImage');
