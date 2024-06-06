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
            
            'title'=>'required|string|min:2|max:100',
            'details'=>'required|string|min:2|max:500',
            'price'=>'required|integer|min:2|max:500',
            'category_id'=>'required|integer|exists:categories,id',
            'user_id'=>'required|integer|exists:users,id',

         ];
    }
}
