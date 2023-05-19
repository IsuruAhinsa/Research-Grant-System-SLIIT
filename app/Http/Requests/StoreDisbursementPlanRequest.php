<?php

namespace App\Http\Requests;

use App\Rules\DisbursementAmount;
use Illuminate\Foundation\Http\FormRequest;

class StoreDisbursementPlanRequest extends FormRequest
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
            'month' => ['required', 'string', 'min:3'],
            'category' => ['required', 'string', 'min:3'],
            'activity' => ['required', 'string', 'min:3'],
            'amount' => ['required', 'numeric', 'decimal:2'],
        ];
    }
}
