<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUniversityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Update with your authorization logic
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $currentYear = date('Y');

        return [
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'state' => [
                'required',
                'string',
                'max:255',
            ],
            'country' => [
                'required',
                'string',
                'max:255',
            ],
            'type' => [
                'required',
                'string',
                Rule::in(['Government', 'Private', 'Other']),
            ],
            'established_year' => [
                'required',
                'integer',
                'min:1000',
                'max:' . ($currentYear + 1),
            ],
            'status' => [
                'required',
                'integer',
                'in:0,1',
            ],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The university name is required.',
            'name.max' => 'The university name must not exceed 255 characters.',
            'state.required' => 'The state is required.',
            'state.max' => 'The state must not exceed 255 characters.',
            'country.required' => 'The country is required.',
            'country.max' => 'The country must not exceed 255 characters.',
            'type.required' => 'The university type is required.',
            'type.in' => 'The university type must be Government, Private, or Other.',
            'established_year.required' => 'The established year is required.',
            'established_year.integer' => 'The established year must be a valid year.',
            'established_year.min' => 'The established year must be a valid year (minimum 1000).',
            'established_year.max' => 'The established year cannot be in the future.',
            'status.required' => 'The status is required.',
            'status.integer' => 'The status must be an integer.',
            'status.in' => 'The status must be either 0 (inactive) or 1 (active).',
        ];
    }
}
