<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCityRequest extends FormRequest
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
        return [
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'state_id' => [
                'required',
                'exists:states,id',
            ],
            'country_id' => [
                'required',
                'exists:countries,id',
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
            'name.required' => 'The city name is required.',
            'name.max' => 'The city name must not exceed 255 characters.',
            'state_id.required' => 'The state is required.',
            'state_id.exists' => 'The selected state does not exist.',
            'country_id.required' => 'The country is required.',
            'country_id.exists' => 'The selected country does not exist.',
            'status.required' => 'The status is required.',
            'status.integer' => 'The status must be an integer.',
            'status.in' => 'The status must be either 0 (inactive) or 1 (active).',
        ];
    }
}
