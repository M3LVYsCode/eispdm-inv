<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipoRequest extends FormRequest
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
            'nombre' => 'required|string|max:255',
            'descripcion'=>'required|string|max:1000',
            'cantidad_disponible'=>'required|integer|min:1',
            'unidad'=>'string|between:1,10',
            'observaciones'=>'nullable|string|max:1000',
            'ruta_imagen'=>'nullable|string|max:1000',
        ];
    }

    
}
