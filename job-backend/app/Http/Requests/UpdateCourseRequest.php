<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCourseRequest extends FormRequest
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
            'education_level_id' => [
                'required',
                'exists:education_levels,id',
            ],
            'duration_value' => [
                'required',
                'integer',
                'min:1',
            ],
            'duration_unit' => [
                'required',
                Rule::in(['Years', 'Months']),
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
            'name.required' => 'The course name is required.',
            'name.max' => 'The course name must not exceed 255 characters.',
            'education_level_id.required' => 'The education level is required.',
            'education_level_id.exists' => 'The selected education level does not exist.',
            'duration_value.required' => 'The duration value is required.',
            'duration_value.integer' => 'The duration value must be an integer.',
            'duration_value.min' => 'The duration value must be at least 1.',
            'duration_unit.required' => 'The duration unit is required.',
            'duration_unit.in' => 'The duration unit must be either Years or Months.',
            'status.required' => 'The status is required.',
            'status.integer' => 'The status must be an integer.',
            'status.in' => 'The status must be either 0 (inactive) or 1 (active).',
        ];
    }
}
