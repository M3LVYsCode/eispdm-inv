<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocenteRequest extends FormRequest
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
            'nombre' => 'required|string|max:35|unique:docentes,nombre',
			'apellido_paterno' => 'required|string|max:35',
			'apellido_materno'=>'mullable|string|max:35',
			'ci'=>'required|numeric|unique',
			'domicilio' =>'string|max:150',
			'telefono' => 'required|numeric|max:12',
			'email' =>'required|email|unique',
            'password'=>[
                'required',                // La contraseña es obligatoria
                'string',                  // Debe ser una cadena de texto
                'min:8',                   // Mínimo 8 caracteres
                'regex:/[A-Z]/',           // Debe contener al menos una letra mayúscula
                'regex:/[a-z]/',           // Debe contener al menos una letra minúscula
                'regex:/[0-9]/',           // Debe contener al menos un número
                'regex:/[@$!%*?&]/',       // Debe contener al menos un carácter especial
                'confirmed'
            ],
        ];
    }
    public function messages(){
        return [
            // Mensaje global para todos los campos requeridos
           'required' => 'Este campo es obligatorio y no puede quedar vacío.',
           'numeric' =>'Este campo debe ser solamente numerico',
           'email'=>'Inserte un correo valido',
           'unique' => 'Ya existe un registro con este campo',
        // Mensajes específicos para reglas adicionales
           'nombre.max' => 'El nombre de usuario no puede tener más de 35 caracteres.',
           'apellido_paterno.max' => 'El nombre de usuario no puede tener más de 35 caracteres.',
           'apellido_materno.max' => 'El nombre de usuario no puede tener más de 35 caracteres.',
           'password.required' => 'La contraseña es obligatoria.',
           'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
           'password.regex' => 'La contraseña debe contener al menos una letra mayúscula,
                             \n una letra minúscula,
                             \n un número 
                             \n un carácter especial (@$!%*?&).', 
        ];
    }
}
