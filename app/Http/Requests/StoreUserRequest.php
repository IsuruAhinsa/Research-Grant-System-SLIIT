<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'faculty' => ['required', 'string'],
            'designation' => ['required', 'string'],
            'title' => ['required', 'string', 'max:100', 'min:2'],
            'first_name' => ['required', 'string', 'max:100', 'min:2'],
            'last_name' => ['required', 'string', 'max:100', 'min:2'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users,email', 'ends_with:sliit.lk'],
            'index' => ['required', 'string', 'digits:4', 'unique:users,index'],
            'password' => ['nullable', 'confirmed'],
            'roles' => ['required'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'email.ends_with' => 'Please enter the valid email domain. (sliit.lk)',
        ];
    }

    public function attributes()
    {
        return [
            'index' => 'sliit id'
        ];
    }
}
