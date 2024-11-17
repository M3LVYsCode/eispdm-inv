<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    

    protected $fillable = [
        'titulo_proyecto',
        'autor',
        'descripcion',
        'gestion',
        'id_tutor',
        'estado',
        'portada_imagen',
        'ruta_proyecto',
    ];
    protected $guarded = ['id'];
    // Relación con el modelo Docente
    public function tutor()
    {
        return $this->belongsTo(Docente::class);
    }
}
