<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocenteSolicitud extends Model
{
    use HasFactory;
    
    protected $table = 'docente_solicitudes';

    protected $fillable = [
        'docente_id',
        'fecha_solicitud',
        'fecha_devolucion',
        'estado',
    ];
    protected $guarded = ['id'];
    // Relación con el modelo Docente
    public function docente()
    {
      return $this->belongsTo(Docente::class);
    }
    public function solicitudDetalle()
    {
        return $this->hasMany(DocenteSolicitudDetalle::class);
    }


}
