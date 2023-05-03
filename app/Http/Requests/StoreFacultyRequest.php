<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFacultyRequest extends FormRequest
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
            'name' => ['required', 'string', 'unique:faculties,name'],
            'code' => ['required', 'string', 'unique:faculties,code'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Faculty Name',
            'code' => 'Faculty Code',
        ];
    }
}
