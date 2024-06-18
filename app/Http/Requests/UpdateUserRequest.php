<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:250',
            'email' => 'required|string|email:rfc,dns|max:250|unique:users,email,'.$this->user->id,
            'password' => 'nullable|string|min:8|confirmed',
             'roles' => 'required'  //update name from roles to roles_name 
            // 'roles_name' => 'required'
        ];
    }
}