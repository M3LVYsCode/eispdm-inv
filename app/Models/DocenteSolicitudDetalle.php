<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocenteSolicitudDetalle extends Model
{
    use HasFactory;

    protected $table = 'docente_detsolicitudes';

    protected $fillable = [
        'id_solicitud',
				'equipo_item_id',
        'fecha_prestamo',
        'fecha_devolucion'
    ];
		protected $guarded = ['id'];
    // Relación con el modelo Docente
    public function solicitud()
    {
        return $this->belongsTo(DocenteSolicitud::class);
    }

		public function equipoItem()
		{
      return $this->belongsTo(ItemEquipo::class);
    }
}
