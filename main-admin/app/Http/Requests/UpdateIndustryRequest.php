<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateIndustryRequest extends FormRequest
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
            'code' => [
                'required',
                'string',
                'max:50',
                Rule::unique('industries', 'code')->ignore($this->route('industry')),
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
            'name.required' => 'The industry name is required.',
            'name.max' => 'The industry name must not exceed 255 characters.',
            'code.required' => 'The industry code is required.',
            'code.max' => 'The industry code must not exceed 50 characters.',
            'code.unique' => 'This industry code already exists.',
            'status.required' => 'The status is required.',
            'status.integer' => 'The status must be an integer.',
            'status.in' => 'The status must be either 0 (inactive) or 1 (active).',
        ];
    }
}
