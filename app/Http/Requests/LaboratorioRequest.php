<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LaboratorioRequest extends FormRequest
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
          'nombre' => 'required|string|max:100|unique:laboratorios,nombre'
        ];
    }
    public function messages(){
        return [
            // Mensaje global para todos los campos requeridos
           'required' => 'Este campo es obligatorio y no puede quedar vacío.', 
        ];
    }
}
