<?php

namespace App\Http\Requests;

use App\Models\SkillCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSkillRequest extends FormRequest
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
                'nullable',
                'string',
                'max:100',
                'unique:skills,code,NULL,id,deleted_at,NULL',
            ],
            'skill_category_id' => [
                'required',
                'integer',
                'exists:skill_categories,id',
                function ($attribute, $value, $fail) {
                    $category = SkillCategory::find($value);
                    if ($category && !$category->isActive()) {
                        $fail('The selected skill category must be active.');
                    }
                },
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
            'name.required' => 'The skill name is required.',
            'name.max' => 'The skill name must not exceed 255 characters.',
            'code.unique' => 'A skill with this code already exists.',
            'code.max' => 'The skill code must not exceed 100 characters.',
            'skill_category_id.required' => 'Please select a skill category.',
            'skill_category_id.exists' => 'The selected skill category does not exist.',
            'status.integer' => 'The status must be an integer.',
            'status.in' => 'The status must be either 0 (inactive) or 1 (active).',
        ];
    }

    /**
     * Configure the validator instance.
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            // Check for duplicate name within the same category
            if ($this->filled('name') && $this->filled('skill_category_id')) {
                $exists = \App\Models\Skill::where('name', $this->name)
                    ->where('skill_category_id', $this->skill_category_id)
                    ->whereNull('deleted_at')
                    ->exists();

                if ($exists) {
                    $validator->errors()->add('name', 'A skill with this name already exists in the selected category.');
                }
            }
        });
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        if (!$this->has('status')) {
            $this->merge([
                'status' => 1, // Default to active
            ]);
        }
    }
}
