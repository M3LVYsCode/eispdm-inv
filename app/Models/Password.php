<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Password extends Model
{
    use HasFactory;


public function generateSecurePassword()
{
    // Definir los conjuntos de caracteres
    $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $lowercase = 'abcdefghijklmnopqrstuvwxyz';
    $numbers = '0123456789';
    $specialCharacters = '!@#$%^&*()-_=+[]{}|;:,.<>?';

    // Crear un string con todos los caracteres posibles
    $allCharacters = $uppercase . $lowercase . $numbers . $specialCharacters;

    // Asegurarse de incluir al menos un carácter de cada tipo
    $password = Str::random(1, $uppercase) . 
                Str::random(1, $lowercase) . 
                Str::random(1, $numbers) . 
                Str::random(1, $specialCharacters);

    // Rellenar el resto de la contraseña con caracteres aleatorios
    $remainingLength = 12 - strlen($password);
    $password .= Str::random($remainingLength, $allCharacters);

    // Mezclar los caracteres para que el orden sea aleatorio
    $password = Str::shuffle($password);

    /*return response()->json([
        'password' => $password
    ]);*/
    return $password;
}

}
