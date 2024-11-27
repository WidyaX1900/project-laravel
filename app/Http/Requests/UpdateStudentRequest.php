<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'id_number' => 'required',
            'major' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The name cannot be empty',
            'id_number.required' => 'The ID number cannot be empty',
            'major.required' => 'Select one of the Majors'
        ];
    }
}
