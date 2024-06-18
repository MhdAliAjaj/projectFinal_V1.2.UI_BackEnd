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
            
            'title'=>'required|string|min:2|max:500',
            'details'=>'required|string|min:2|max:500',
            'price'=>'required|integer|min:1|max:500',
            'category_id'=>'integer|exists:categories,id',
            'user_id'=>'integer|exists:users,id',
         ];
    }
}
