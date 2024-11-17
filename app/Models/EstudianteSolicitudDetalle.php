<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstudianteSolicitudDetalle extends Model
{
    use HasFactory;

    protected $table = 'estudiante_detsolicitudes';

    protected $fillable =[
        'id_solicitud',
        'equipo_item_id',
        'fecha_prestamo',
        'fecha_devolucion'
    ];
    
    protected $guarded = [
        'id'
    ];

    public function equipoItem()
    {
      return $this->belongsTo(ItemEquipo::class);
    }
    
		public function solicitud()
    {
			return $this->belongsTo(EstudianteSolicitud::class);
		}

}
