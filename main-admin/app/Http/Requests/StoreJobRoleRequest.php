<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobRoleRequest extends FormRequest
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
            'role_category_id' => [
                'required',
                'exists:role_categories,id',
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
            'name.required' => 'The job role name is required.',
            'name.max' => 'The job role name must not exceed 255 characters.',
            'role_category_id.required' => 'The role category is required.',
            'role_category_id.exists' => 'The selected role category does not exist.',
            'status.integer' => 'The status must be an integer.',
            'status.in' => 'The status must be either 0 (inactive) or 1 (active).',
        ];
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
