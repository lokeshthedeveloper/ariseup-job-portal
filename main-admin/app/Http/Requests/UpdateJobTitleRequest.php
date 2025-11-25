<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobTitleRequest extends FormRequest
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
            'industry_id' => [
                'required',
                'exists:industries,id',
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
            'name.required' => 'The job title name is required.',
            'name.max' => 'The job title name must not exceed 255 characters.',
            'industry_id.required' => 'The industry is required.',
            'industry_id.exists' => 'The selected industry does not exist.',
            'status.required' => 'The status is required.',
            'status.integer' => 'The status must be an integer.',
            'status.in' => 'The status must be either 0 (inactive) or 1 (active).',
        ];
    }
}
