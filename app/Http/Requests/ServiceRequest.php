<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'title' => 'required|string|min:2|max:255',
            'details' => 'required|string|min:2|max:500',
            'price' => 'required|integer|min:10|max:500000',
            'category_id' => 'required|integer|exists:categories,id',
            'user_id' => 'required|integer|exists:users,id',
        ];
    }

    /**
     * Get the custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function validationMessages(): array
    {
        return [
            'title.required' => 'The title field is required.',
            'title.string' => 'The title must be a string.',
            'title.min' => 'The title must be at least 2 characters.',
            'title.max' => 'The title must not exceed 255 characters.',

            'details.required' => 'The details field is required.',
            'details.string' => 'The details must be a string.',
            'details.min' => 'The details must be at least 2 characters.',
            'details.max' => 'The details must not exceed 500 characters.',

            'price.required' => 'The price field is required.',
            'price.integer' => 'The price must be an integer.',
            'price.min' => 'The price must be at least 10.',
            'price.max' => 'The price must not exceed 500000.',

        ];
    }
}
