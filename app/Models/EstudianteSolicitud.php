<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstudianteSolicitud extends Model
{
    use HasFactory;
    protected $table = 'estudiante_solicitudes';

    protected $fillable =[
        'nombre_estudiante',
        'ci_estudiante',
        'fecha_solicitud',
        'fecha_devolucion',
        'estado'
    ];
    
    protected $guarded = [
        'id',
    ];

    public function solicitudDetalles(){
        return $this->hasMany(EstudianteSolicitudDetalle::class);
    }


}
