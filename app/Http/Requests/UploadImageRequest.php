<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadImageRequest extends FormRequest
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
            'file' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
            'additionalMetadata' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'The id field is required.',
            'file.required' => 'The file field is required.',
            'file.file' => 'The uploaded item must be a file.',
            'file.mimes' => 'The file must be in one of the following formats: jpeg, png, jpg, gif.',
            'file.max' => 'The file size must not exceed 2MB.',
        ];
    }
}
