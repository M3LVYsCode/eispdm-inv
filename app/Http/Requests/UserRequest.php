<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255',
            'apellido_paterno'=>'required|string|max:1000',
            'apellido_materno'=>'required|integer|min:1',
            'ci'=>'string|between:1,10',
            'domicilio'=>'nullable|string|max:1000',
            'telefono'=>'nullable|string|max:1000',
            'email'=>'nullable|string|max:1000',
        ];
    }
}
