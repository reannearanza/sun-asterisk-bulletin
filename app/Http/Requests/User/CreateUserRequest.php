<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'username' => [
                'required',
                'string',
                'max:60',
                'unique:users'
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:60'
            ]
        ];
    }
}
