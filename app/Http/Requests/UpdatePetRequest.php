<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|integer',
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'photoUrls' => 'required|string',
            'tags' => 'required|string',
            'status' => 'required|string|in:available,pending,sold',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'category.required' => 'The category field is required.',
            'photoUrls.required' => 'Please provide at least one photo URL.',
            'tags.required' => 'Please provide at least one tag.',
            'status.in' => 'The status must be one of the following: available, pending, or sold.',
        ];
    }
}
