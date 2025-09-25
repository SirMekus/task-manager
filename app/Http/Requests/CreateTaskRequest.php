<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'project_id' => ['nullable', 'exists:projects,id'],
        ];
    }
    
    // public function validated($key = null, $default = null)
    // {
    //     $validatedData = parent::validated();

    //     unset($validatedData['password']);

    //     return $validatedData;
    // }
}
