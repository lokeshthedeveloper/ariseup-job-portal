<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSkillCategoryRequest extends FormRequest
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
        $categoryId = $this->route('skill_category') ?? $this->route('id');

        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('skill_categories', 'name')
                    ->ignore($categoryId)
                    ->whereNull('deleted_at'),
            ],
            'status' => [
                'nullable',
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
            'name.required' => 'The skill category name is required.',
            'name.unique' => 'A skill category with this name already exists.',
            'name.max' => 'The skill category name must not exceed 255 characters.',
            'status.integer' => 'The status must be an integer.',
            'status.in' => 'The status must be either 0 (inactive) or 1 (active).',
        ];
    }
}
